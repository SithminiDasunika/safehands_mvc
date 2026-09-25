<?php

class PatientController extends Controller
{
    private $patientModel;

    public function __construct()
    {
        // Adjust this guard if your app already starts the session in
        // a front controller / index.php.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->patientModel = $this->model('PatientModel');
    }

    /*
    |--------------------------------------------------------------------------
    | Patient List (default action for /patient)
    |--------------------------------------------------------------------------
    | The router calls index() whenever the URL has no method segment
    | (e.g. just "/patient"), so PatientController needs one even though
    | most of this controller is about a single patient.
    */
    public function index(): void
    {
        $familyUserId = $_SESSION['user_id'] ?? null;

        if (!$familyUserId) {
            $this->redirect('/login');
        }

        $patients = $this->patientModel->getPatientsByFamilyUserId($familyUserId);

        $data = [
            'title' => 'My Patients | SafeHands',
            'stats' => [
                'total_patients' => count($patients)
            ],
            'patients' => $patients,
            // No reports table exists yet — pass an empty list so the
            // patient/index view's foreach over $reports doesn't error.
            'reports' => []
        ];

        $this->view(
            'patient/index',
            $data,
            'patients'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Add New Patient (show form)
    |--------------------------------------------------------------------------
    */
    public function create(): void
    {
        $data = [
            'title' => 'Add New Patient | SafeHands'
        ];

        $this->view(
            'patient/create',
            $data,
            'family'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Save a new patient (form target for create.php)
    |--------------------------------------------------------------------------
    */
    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/patient/create');
        }

        $familyUserId = $_SESSION['user_id'] ?? null;

        if (!$familyUserId) {
            $this->redirect('/login');
        }

        $profilePhoto = $this->handleUpload('profile_photo', 'uploads/patients/', ['jpg', 'jpeg', 'png']);
        $medicalDocument = $this->handleUpload('medical_document', 'uploads/patients/documents/', ['pdf', 'jpg', 'jpeg', 'png']);

        $data = [
            'family_user_id' => $familyUserId,
            'full_name' => trim($_POST['full_name'] ?? ''),
            'date_of_birth' => trim($_POST['date_of_birth'] ?? ''),
            'gender' => trim($_POST['gender'] ?? ''),
            'relationship' => trim($_POST['relationship'] ?? ''),
            'nic' => trim($_POST['nic'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
            'profile_photo' => $profilePhoto,
            'blood_group' => trim($_POST['blood_group'] ?? ''),
            'mobility_status' => trim($_POST['mobility_status'] ?? ''),
            'weight' => $_POST['weight'] !== '' ? $_POST['weight'] : null,
            'blood_pressure' => trim($_POST['blood_pressure'] ?? ''),
            'medical_conditions' => trim($_POST['medical_conditions'] ?? ''),
            'allergies' => trim($_POST['allergies'] ?? ''),
            'dietary_restrictions' => trim($_POST['dietary_restrictions'] ?? ''),
            'current_medications' => trim($_POST['current_medications'] ?? ''),
            'special_care_requirements' => trim($_POST['special_care_requirements'] ?? ''),
            'doctors_notes' => trim($_POST['doctors_notes'] ?? ''),
            'emergency_contact_name' => trim($_POST['emergency_contact_name'] ?? ''),
            'emergency_contact_relationship' => trim($_POST['emergency_contact_relationship'] ?? ''),
            'emergency_contact_phone' => trim($_POST['emergency_contact_phone'] ?? ''),
            'emergency_alternative_phone' => trim($_POST['emergency_alternative_phone'] ?? ''),
            'medical_document' => $medicalDocument
        ];

        // Minimal required-field check — expand as needed.
        if ($data['full_name'] === '' || $data['date_of_birth'] === '' || $data['gender'] === '' || $data['relationship'] === '') {
            $_SESSION['form_errors'] = ['Please fill in all required fields.'];
            $_SESSION['form_data'] = $data;
            $this->redirect('/patient/create');
        }

        $newPatientId = $this->patientModel->createPatient($data);

        if (!$newPatientId) {
            die('Failed to create patient.');
        }

        $this->redirect('/patient/profile/' . $newPatientId);
    }


    /*
    |--------------------------------------------------------------------------
    | Patient Profile
    |--------------------------------------------------------------------------
    */
    public function profile($id = null): void
    {
        if (!$id) {
            die('Patient ID is missing.');
        }

        $familyUserId = $_SESSION['user_id'] ?? null;

        if (!$familyUserId) {
            $this->redirect('/login');
        }

        $patient = $this->patientModel->getPatientForFamily((int) $id, (int) $familyUserId);

        if (!$patient) {
            die('Patient not found.');
        }

        $data = [
            'title' => 'Patient Profile | SafeHands',
            'patient' => $patient
        ];

        $this->view(
            'patient/profile',
            $data,
            'family'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Patient Profile (show form)
    |--------------------------------------------------------------------------
    */
    public function edit($id = null): void
    {
        $familyUserId = $_SESSION['user_id'] ?? null;

        if (!$id || !$familyUserId) {
            $this->redirect('/patient');
        }

        $patient = $this->patientModel->getPatientForFamily((int) $id, (int) $familyUserId);

        if (!$patient) {
            $this->redirect('/patient');
        }

        $data = [
            'title' => 'Edit Patient Profile | SafeHands',
            'patient' => $patient
        ];

        $this->view(
            'patient/edit',
            $data,
            'edit-patient'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Save changes made in the edit form
    |--------------------------------------------------------------------------
    */
    public function update($id = null): void
    {
        $familyUserId = $_SESSION['user_id'] ?? null;

        if (!$id || !$familyUserId || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/patient');
        }

        $existing = $this->patientModel->getPatientForFamily((int) $id, (int) $familyUserId);

        if (!$existing) {
            $this->redirect('/patient');
        }

        // Keep the existing file unless the family member chose a new one.
        $profilePhoto = $this->handleUpload('profile_photo', 'uploads/patients/', ['jpg', 'jpeg', 'png'])
            ?? $existing['profile_photo'];

        $medicalDocument = $this->handleUpload('medical_document', 'uploads/patients/documents/', ['pdf', 'jpg', 'jpeg', 'png'])
            ?? $existing['medical_document'];

        $data = [
            'full_name' => trim($_POST['full_name'] ?? ''),
            'date_of_birth' => trim($_POST['dob'] ?? $_POST['date_of_birth'] ?? ''),
            'gender' => trim($_POST['gender'] ?? ''),
            'relationship' => trim($_POST['relationship'] ?? ''),
            'nic' => trim($_POST['nic'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
            'profile_photo' => $profilePhoto,
            'blood_group' => trim($_POST['blood_group'] ?? ''),
            'mobility_status' => trim($_POST['mobility'] ?? $_POST['mobility_status'] ?? ''),
            'weight' => $_POST['weight'] !== '' ? ($_POST['weight'] ?? null) : null,
            'blood_pressure' => trim($_POST['blood_pressure'] ?? ''),
            'medical_conditions' => trim($_POST['medical_conditions'] ?? ''),
            'allergies' => trim($_POST['allergies'] ?? ''),
            'dietary_restrictions' => trim($_POST['dietary'] ?? $_POST['dietary_restrictions'] ?? ''),
            'current_medications' => trim($_POST['medications'] ?? $_POST['current_medications'] ?? ''),
            'special_care_requirements' => trim($_POST['special_care'] ?? $_POST['special_care_requirements'] ?? ''),
            'doctors_notes' => trim($_POST['doctor_notes'] ?? $_POST['doctors_notes'] ?? ''),
            'emergency_contact_name' => trim($_POST['emergency_name'] ?? $_POST['emergency_contact_name'] ?? ''),
            'emergency_contact_relationship' => trim($_POST['emergency_relationship'] ?? $_POST['emergency_contact_relationship'] ?? ''),
            'emergency_contact_phone' => trim($_POST['emergency_phone'] ?? $_POST['emergency_contact_phone'] ?? ''),
            'emergency_alternative_phone' => trim($_POST['emergency_alt_phone'] ?? $_POST['emergency_alternative_phone'] ?? ''),
            'medical_document' => $medicalDocument
        ];

        $this->patientModel->update((int) $id, $data);

        $_SESSION['flash_success'] = 'Patient profile updated successfully.';
        $this->redirect('/patient/profile/' . $id);
    }


    /*
    |--------------------------------------------------------------------------
    | Delete a patient
    |--------------------------------------------------------------------------
    */
    public function delete($id = null): void
    {
        $familyUserId = $_SESSION['user_id'] ?? null;

        if ($id && $familyUserId) {
            $this->patientModel->deletePatient((int) $id, (int) $familyUserId);
        }

        $this->redirect('/patient');
    }


    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Move an uploaded file into place and return the relative path to store
     * in the database, or null if no file was uploaded for this field.
     */
    private function handleUpload(string $field, string $destinationFolder, array $allowedExtensions): ?string
    {
        if (empty($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $originalName = $_FILES[$field]['name'];
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions, true)) {
            return null;
        }

        $baseDir = dirname(__DIR__, 2) . '/public/';
        $targetDir = $baseDir . ltrim(rtrim($destinationFolder, '/'), '/') . '/';

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileName = $field . '_' . bin2hex(random_bytes(8)) . '.' . $extension;
        $targetPath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetPath)) {
            $base = defined('URLROOT') ? URLROOT : '/safehands_mvc';
            return $base . '/public/' . ltrim(rtrim($destinationFolder, '/'), '/') . '/' . $fileName;
        }

        return null;
    }

    /**
     * Redirect helper. Uses URLROOT if your app defines it (common in this
     * style of framework); otherwise falls back to the base path used
     * throughout the existing views.
     */
    private function redirect(string $path): void
    {
        $base = defined('URLROOT') ? URLROOT : '/safehands_mvc';
        header('Location: ' . $base . $path);
        exit;
    }
}
