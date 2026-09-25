<?php

/*
|--------------------------------------------------------------------------
| PatientModel
|--------------------------------------------------------------------------
| Handles all database access for a single patient record (the `patients`
| table). Talks to mysqli directly via Database::getConnection() — your
| Database class is a thin mysqli wrapper with no query()/bind()/execute()
| helpers, so this model doesn't assume any.
*/

class PatientModel
{
    private mysqli $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    /*
    |--------------------------------------------------------------------------
    | Create a new patient
    |--------------------------------------------------------------------------
    | $data is an associative array keyed by column name. Returns the new
    | patient_id on success, or false on failure.
    */
    public function createPatient(array $data): int
    {
        $sql = 'INSERT INTO patients (
                family_user_id, full_name, date_of_birth, gender, relationship,
                nic, phone, address, profile_photo, blood_group,
                mobility_status, weight, blood_pressure, medical_conditions,
                allergies, dietary_restrictions, current_medications,
                special_care_requirements, doctors_notes,
                emergency_contact_name, emergency_contact_relationship,
                emergency_contact_phone, emergency_alternative_phone,
                medical_document
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            return 0;
        }

        $weight = ($data['weight'] ?? null) !== null && $data['weight'] !== ''
            ? (float) $data['weight']
            : null;

        $values = [
            (int) ($data['family_user_id'] ?? 0),
            $data['full_name'] ?? null,
            $data['date_of_birth'] ?? null,
            $data['gender'] ?? null,
            $data['relationship'] ?? null,
            $data['nic'] ?? null,
            $data['phone'] ?? null,
            $data['address'] ?? null,
            $data['profile_photo'] ?? null,
            $data['blood_group'] ?? null,
            $data['mobility_status'] ?? null,
            $weight,
            $data['blood_pressure'] ?? null,
            $data['medical_conditions'] ?? null,
            $data['allergies'] ?? null,
            $data['dietary_restrictions'] ?? null,
            $data['current_medications'] ?? null,
            $data['special_care_requirements'] ?? null,
            $data['doctors_notes'] ?? null,
            $data['emergency_contact_name'] ?? null,
            $data['emergency_contact_relationship'] ?? null,
            $data['emergency_contact_phone'] ?? null,
            $data['emergency_alternative_phone'] ?? null,
            $data['medical_document'] ?? null
        ];

        // i = family_user_id, then 10 strings (full_name..mobility_status),
        // 1 double (weight), then 12 strings (blood_pressure..medical_document)
        $types = 'i' . str_repeat('s', 10) . 'd' . str_repeat('s', 12);

        $this->bindParams($stmt, $types, $values);

        $success = $stmt->execute();
        $newId = $success ? (int) $this->conn->insert_id : 0;
        $stmt->close();

        return $newId;
    }

    /*
    |--------------------------------------------------------------------------
    | Get a single patient by id
    |--------------------------------------------------------------------------
    */
    public function getPatientById(int $patientId): ?array
    {
        $stmt = $this->conn->prepare('SELECT * FROM patients WHERE patient_id = ?');
        $stmt->bind_param('i', $patientId);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        return $row ?: null;
    }

    /*
    |--------------------------------------------------------------------------
    | Get a single patient by id, scoped to the logged-in family member
    |--------------------------------------------------------------------------
    | Prevents one family account from viewing/editing another family's
    | patient by guessing the id in the URL.
    */
    public function getPatientForFamily(int $patientId, int $familyUserId): ?array
    {
        $stmt = $this->conn->prepare(
            'SELECT * FROM patients WHERE patient_id = ? AND family_user_id = ?'
        );
        $stmt->bind_param('ii', $patientId, $familyUserId);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        return $row ?: null;
    }

    /*
    |--------------------------------------------------------------------------
    | Get all patients belonging to a family member
    |--------------------------------------------------------------------------
    */
    public function getPatientsByFamilyUserId(int $familyUserId): array
    {
        $stmt = $this->conn->prepare(
            'SELECT * FROM patients WHERE family_user_id = ? ORDER BY full_name ASC'
        );
        $stmt->bind_param('i', $familyUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $rows;
    }

    /*
    |--------------------------------------------------------------------------
    | Update an existing patient
    |--------------------------------------------------------------------------
    */
    public function update(int $patientId, array $data): bool
    {
        $sql = 'UPDATE patients SET
                full_name = ?,
                date_of_birth = ?,
                gender = ?,
                relationship = ?,
                nic = ?,
                phone = ?,
                address = ?,
                profile_photo = ?,
                blood_group = ?,
                mobility_status = ?,
                weight = ?,
                blood_pressure = ?,
                medical_conditions = ?,
                allergies = ?,
                dietary_restrictions = ?,
                current_medications = ?,
                special_care_requirements = ?,
                doctors_notes = ?,
                emergency_contact_name = ?,
                emergency_contact_relationship = ?,
                emergency_contact_phone = ?,
                emergency_alternative_phone = ?,
                medical_document = ?
            WHERE patient_id = ?';

        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $weight = ($data['weight'] ?? null) !== null && $data['weight'] !== ''
            ? (float) $data['weight']
            : null;

        $values = [
            $data['full_name'] ?? null,
            $data['date_of_birth'] ?? null,
            $data['gender'] ?? null,
            $data['relationship'] ?? null,
            $data['nic'] ?? null,
            $data['phone'] ?? null,
            $data['address'] ?? null,
            $data['profile_photo'] ?? null,
            $data['blood_group'] ?? null,
            $data['mobility_status'] ?? null,
            $weight,
            $data['blood_pressure'] ?? null,
            $data['medical_conditions'] ?? null,
            $data['allergies'] ?? null,
            $data['dietary_restrictions'] ?? null,
            $data['current_medications'] ?? null,
            $data['special_care_requirements'] ?? null,
            $data['doctors_notes'] ?? null,
            $data['emergency_contact_name'] ?? null,
            $data['emergency_contact_relationship'] ?? null,
            $data['emergency_contact_phone'] ?? null,
            $data['emergency_alternative_phone'] ?? null,
            $data['medical_document'] ?? null,
            $patientId
        ];

        // 10 strings (full_name..mobility_status), 1 double (weight),
        // 12 strings (blood_pressure..medical_document), then i = patient_id
        $types = str_repeat('s', 10) . 'd' . str_repeat('s', 12) . 'i';

        $this->bindParams($stmt, $types, $values);

        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    /*
    |--------------------------------------------------------------------------
    | Update only the profile photo path (used after an in-place photo swap)
    |--------------------------------------------------------------------------
    */
    public function updatePhoto(int $patientId, string $profilePhotoPath): bool
    {
        $stmt = $this->conn->prepare(
            'UPDATE patients SET profile_photo = ? WHERE patient_id = ?'
        );
        $stmt->bind_param('si', $profilePhotoPath, $patientId);
        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    /*
    |--------------------------------------------------------------------------
    | Delete a patient, scoped to the family that owns it
    |--------------------------------------------------------------------------
    */
    public function deletePatient(int $patientId, int $familyUserId): bool
    {
        $stmt = $this->conn->prepare(
            'DELETE FROM patients WHERE patient_id = ? AND family_user_id = ?'
        );
        $stmt->bind_param('ii', $patientId, $familyUserId);
        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    /*
    |--------------------------------------------------------------------------
    | Bind a dynamic list of values onto a prepared statement.
    |--------------------------------------------------------------------------
    | mysqli_stmt::bind_param() takes its values by reference, so a plain
    | array of values can't be splatted straight in — this builds a
    | reference array first, the standard workaround for a variable
    | number of bound parameters.
    */
    private function bindParams(mysqli_stmt $stmt, string $types, array $values): void
    {
        $refs = [$types];

        foreach ($values as $key => $value) {
            $refs[] = &$values[$key];
        }

        call_user_func_array([$stmt, 'bind_param'], $refs);
    }
}
