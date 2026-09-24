<?php

class PatientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Add New Patient Page
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
    | Store New Patient
    |--------------------------------------------------------------------------
    */

    public function store(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Check Login
        |--------------------------------------------------------------------------
        */

        if (
            !isset($_SESSION['family_logged_in']) ||
            $_SESSION['family_logged_in'] !== true
        ) {
            header('Location: /safehands_mvc/login');
            exit;
        }


        /*
        |--------------------------------------------------------------------------
        | Get Logged-in Family Member
        |--------------------------------------------------------------------------
        */

        $familyUserId = $_SESSION['user_id'] ?? null;

        if (!$familyUserId) {
            die('Family user ID not found.');
        }


        /*
        |--------------------------------------------------------------------------
        | Get Form Data
        |--------------------------------------------------------------------------
        */

        $fullName = trim($_POST['full_name'] ?? '');
        $dateOfBirth = trim($_POST['date_of_birth'] ?? '');
        $gender = trim($_POST['gender'] ?? '');
        $relationship = trim($_POST['relationship'] ?? '');

        $nic = trim($_POST['nic'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $address = trim($_POST['address'] ?? '');

        $bloodGroup = trim($_POST['blood_group'] ?? '');
        $mobilityStatus = trim($_POST['mobility_status'] ?? '');
        $weight = $_POST['weight'] !== ''
            ? (float) $_POST['weight']
            : null;

        $bloodPressure = trim($_POST['blood_pressure'] ?? '');

        $medicalConditions = trim($_POST['medical_conditions'] ?? '');
        $allergies = trim($_POST['allergies'] ?? '');
        $dietaryRestrictions = trim($_POST['dietary_restrictions'] ?? '');
        $currentMedications = trim($_POST['current_medications'] ?? '');
        $specialCareRequirements = trim(
            $_POST['special_care_requirements'] ?? ''
        );
        $doctorsNotes = trim($_POST['doctors_notes'] ?? '');

        $emergencyContactName = trim(
            $_POST['emergency_contact_name'] ?? ''
        );

        $emergencyContactRelationship = trim(
            $_POST['emergency_contact_relationship'] ?? ''
        );

        $emergencyContactPhone = trim(
            $_POST['emergency_contact_phone'] ?? ''
        );

        $emergencyAlternativePhone = trim(
            $_POST['emergency_alternative_phone'] ?? ''
        );


        /*
        |--------------------------------------------------------------------------
        | Basic Validation
        |--------------------------------------------------------------------------
        */

        if ($fullName === '') {
            die('Full name is required.');
        }

        if ($dateOfBirth === '') {
            die('Date of birth is required.');
        }

        if ($gender === '') {
            die('Gender is required.');
        }

        if ($relationship === '') {
            die('Relationship is required.');
        }


        /*
        |--------------------------------------------------------------------------
        | Profile Photo
        |--------------------------------------------------------------------------
        */

        $profilePhoto = null;

        if (
            isset($_FILES['profile_photo']) &&
            $_FILES['profile_photo']['error'] !== UPLOAD_ERR_NO_FILE
        ) {
            if ($_FILES['profile_photo']['error'] !== UPLOAD_ERR_OK) {
                die('Profile photo upload failed.');
            }

            $allowedPhotoTypes = [
                'image/jpeg',
                'image/png'
            ];

            if (
                !in_array(
                    $_FILES['profile_photo']['type'],
                    $allowedPhotoTypes,
                    true
                )
            ) {
                die('Invalid profile photo format.');
            }

            if ($_FILES['profile_photo']['size'] > 2 * 1024 * 1024) {
                die('Profile photo must be less than 2MB.');
            }

            $uploadDirectory =
                __DIR__ .
                '/../../public/assets/uploads/patients/';

            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            $extension = strtolower(
                pathinfo(
                    $_FILES['profile_photo']['name'],
                    PATHINFO_EXTENSION
                )
            );

            $fileName =
                'patient_' .
                time() .
                '_' .
                bin2hex(random_bytes(4)) .
                '.' .
                $extension;

            $destination = $uploadDirectory . $fileName;

            if (
                !move_uploaded_file(
                    $_FILES['profile_photo']['tmp_name'],
                    $destination
                )
            ) {
                die('Could not save profile photo.');
            }

            $profilePhoto =
                'assets/uploads/patients/' . $fileName;
        }


        /*
        |--------------------------------------------------------------------------
        | Medical Document
        |--------------------------------------------------------------------------
        */

        $medicalDocument = null;

        if (
            isset($_FILES['medical_document']) &&
            $_FILES['medical_document']['error'] !== UPLOAD_ERR_NO_FILE
        ) {
            if ($_FILES['medical_document']['error'] !== UPLOAD_ERR_OK) {
                die('Medical document upload failed.');
            }

            $allowedDocumentTypes = [
                'application/pdf',
                'image/jpeg',
                'image/png'
            ];

            if (
                !in_array(
                    $_FILES['medical_document']['type'],
                    $allowedDocumentTypes,
                    true
                )
            ) {
                die('Invalid medical document format.');
            }

            if ($_FILES['medical_document']['size'] > 5 * 1024 * 1024) {
                die('Medical document must be less than 5MB.');
            }

            $uploadDirectory =
                __DIR__ .
                '/../../public/assets/uploads/medical_documents/';

            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            $extension = strtolower(
                pathinfo(
                    $_FILES['medical_document']['name'],
                    PATHINFO_EXTENSION
                )
            );

            $fileName =
                'medical_' .
                time() .
                '_' .
                bin2hex(random_bytes(4)) .
                '.' .
                $extension;

            $destination = $uploadDirectory . $fileName;

            if (
                !move_uploaded_file(
                    $_FILES['medical_document']['tmp_name'],
                    $destination
                )
            ) {
                die('Could not save medical document.');
            }

            $medicalDocument =
                'assets/uploads/medical_documents/' . $fileName;
        }


        /*
        |--------------------------------------------------------------------------
        | Create Patient
        |--------------------------------------------------------------------------
        */

        $patientModel = $this->model('PatientModel');

        $patientId = $patientModel->createPatient([
            'family_user_id' => $familyUserId,

            'full_name' => $fullName,
            'date_of_birth' => $dateOfBirth,
            'gender' => $gender,
            'relationship' => $relationship,

            'nic' => $nic ?: null,
            'phone' => $phone ?: null,
            'address' => $address ?: null,

            'profile_photo' => $profilePhoto,

            'blood_group' => $bloodGroup ?: null,
            'mobility_status' => $mobilityStatus ?: null,
            'weight' => $weight,
            'blood_pressure' => $bloodPressure ?: null,

            'medical_conditions' => $medicalConditions ?: null,
            'allergies' => $allergies ?: null,
            'dietary_restrictions' => $dietaryRestrictions ?: null,
            'current_medications' => $currentMedications ?: null,
            'special_care_requirements' =>
                $specialCareRequirements ?: null,
            'doctors_notes' => $doctorsNotes ?: null,

            'emergency_contact_name' =>
                $emergencyContactName ?: null,

            'emergency_contact_relationship' =>
                $emergencyContactRelationship ?: null,

            'emergency_contact_phone' =>
                $emergencyContactPhone ?: null,

            'emergency_alternative_phone' =>
                $emergencyAlternativePhone ?: null,

            'medical_document' => $medicalDocument
        ]);


        /*
        |--------------------------------------------------------------------------
        | Check Result
        |--------------------------------------------------------------------------
        */

        if ($patientId === false) {
            die('Failed to create patient.');
        }
        echo '<pre>';
        var_dump($patientId);
        echo '</pre>';
        exit;

        /*
        |--------------------------------------------------------------------------
        | Redirect to Patient Profile
        |--------------------------------------------------------------------------
        */

        header(
            'Location: /safehands_mvc/patient/profile/' .
            $patientId
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | Patient Profile
    |--------------------------------------------------------------------------
    */

    public function profile(?int $id = null): void
{
    if (!$id) {
        die('Patient ID is missing.');
    }

    $data = [
        'title' => 'Patient Profile | SafeHands',
        'patient_id' => $id
    ];

    $this->view(
        'patient/profile',
        $data,
        'family'
    );
}

    /*
    |--------------------------------------------------------------------------
    | Edit Patient Profile
    |--------------------------------------------------------------------------
    */

    public function edit(int $id): void
    {
        $data = [
            'title' => 'Edit Patient Profile | SafeHands'
        ];

        $this->view(
            'patient/edit',
            $data,
            'edit-patient'
        );
    }
}