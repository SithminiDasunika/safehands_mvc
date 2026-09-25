<?php

class CaregiverModel extends Model
{
    /*
    |--------------------------------------------------------------------------
    | CHECK EMAIL
    |--------------------------------------------------------------------------
    */

    public function emailExists(string $email): bool
    {
        $sql = "
            SELECT id
            FROM users
            WHERE email = ?
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            throw new Exception(
                'Unable to prepare email validation.'
            );
        }

        $stmt->bind_param("s", $email);

        if (!$stmt->execute()) {
            $stmt->close();

            throw new Exception(
                'Unable to check email.'
            );
        }

        $result = $stmt->get_result();

        $exists = $result->num_rows > 0;

        $stmt->close();

        return $exists;
    }


    /*
    |--------------------------------------------------------------------------
    | CHECK NIC
    |--------------------------------------------------------------------------
    */

    public function nicExists(string $nic): bool
    {
        $sql = "
            SELECT id
            FROM users
            WHERE nic = ?
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            throw new Exception(
                'Unable to prepare NIC validation.'
            );
        }

        $stmt->bind_param("s", $nic);

        if (!$stmt->execute()) {
            $stmt->close();

            throw new Exception(
                'Unable to check NIC.'
            );
        }

        $result = $stmt->get_result();

        $exists = $result->num_rows > 0;

        $stmt->close();

        return $exists;
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE COMPLETE CAREGIVER REGISTRATION
    |--------------------------------------------------------------------------
    |
    | Creates:
    |
    | 1. users
    | 2. caregiver_profiles
    | 3. caregiver_documents
    |
    */

    public function createFullCaregiverRegistration(
        array $personal,
        array $professional,
        ?string $profilePhoto,
        array $documents
    ): array {

        /*
         * Hash password
         */

        $hashedPassword = password_hash(
            $personal['password'],
            PASSWORD_DEFAULT
        );

        if ($hashedPassword === false) {
            throw new Exception(
                'Password hashing failed.'
            );
        }


        /*
         * Start transaction
         */

        $this->db->begin_transaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | 1. CREATE USER
            |--------------------------------------------------------------------------
            */

            $sql = "
                INSERT INTO users
                (
                    full_name,
                    nic,
                    phone,
                    email,
                    address,
                    password,
                    role,
                    status
                )
                VALUES
                (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    'caregiver',
                    'pending'
                )
            ";

            $stmt = $this->db->prepare($sql);

            if (!$stmt) {
                throw new Exception(
                    'Unable to prepare caregiver account creation.'
                );
            }

            $fullName = $personal['full_name'];
            $nic = $personal['nic'];
            $phone = $personal['phone'];
            $email = $personal['email'];
            $address = $personal['address'];

            $stmt->bind_param(
                "ssssss",
                $fullName,
                $nic,
                $phone,
                $email,
                $address,
                $hashedPassword
            );

            if (!$stmt->execute()) {

                $error = $stmt->error;

                $stmt->close();

                throw new Exception(
                    'Unable to create caregiver account: ' . $error
                );
            }

            $userId = (int) $this->db->insert_id;

            $stmt->close();


            /*
            |--------------------------------------------------------------------------
            | 2. CREATE CAREGIVER PROFILE
            |--------------------------------------------------------------------------
            */

            $sql = "
                INSERT INTO caregiver_profiles
                (
                    user_id,
                    gender,
                    date_of_birth,
                    district,
                    highest_qualification,
                    years_experience,
                    certifications,
                    languages,
                    service_areas,
                    daily_rate,
                    biography,
                    profile_photo,
                    verification_status
                )
                VALUES
                (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    'pending'
                )
            ";

            $stmt = $this->db->prepare($sql);

            if (!$stmt) {
                throw new Exception(
                    'Unable to prepare caregiver profile creation.'
                );
            }


            $gender =
                $personal['gender'];

            $dateOfBirth =
                $personal['date_of_birth'];

            $district =
                $personal['district'];

            $highestQualification =
                $professional['highest_qualification'];

            $yearsExperience =
                (int) $professional['years_experience'];

            $certifications =
                $professional['professional_certification'];

            $languages =
                $professional['languages'];

            $serviceAreas =
                $professional['service_areas'];

            $dailyRate = null;

            if (
                isset($professional['daily_rate']) &&
                $professional['daily_rate'] !== '' &&
                $professional['daily_rate'] !== null
            ) {
                $dailyRate =
                    (float) $professional['daily_rate'];
            }

            $biography =
                $professional['biography'];

            $photo =
                $profilePhoto;


            /*
             * IMPORTANT:
             *
             * i = integer
             * s = string
             * d = decimal
             *
             * i s s s s i s s s d s s
             */

            $stmt->bind_param(
                "issssisssdss",
                $userId,
                $gender,
                $dateOfBirth,
                $district,
                $highestQualification,
                $yearsExperience,
                $certifications,
                $languages,
                $serviceAreas,
                $dailyRate,
                $biography,
                $photo
            );


            if (!$stmt->execute()) {

                $error = $stmt->error;

                $stmt->close();

                throw new Exception(
                    'Unable to create caregiver profile: ' .
                    $error
                );
            }

            $caregiverId =
                (int) $this->db->insert_id;

            $stmt->close();


            /*
            |--------------------------------------------------------------------------
            | 3. SAVE DOCUMENTS
            |--------------------------------------------------------------------------
            */

            $documentMap = [

                'nic_front'
                    => 'NIC_Front',

                'nic_back'
                    => 'NIC_Back',

                'qualification_certificate'
                    => 'Qualification',

                'police_clearance'
                    => 'Police_Clearance',

                'first_aid_certificate'
                    => 'First_Aid',

                'experience_letter'
                    => 'Experience_Letter',

                'medical_fitness_certificate'
                    => 'Medical_Fitness'
            ];


            foreach (
                $documentMap as $field => $documentType
            ) {

                /*
                 * Optional documents may not exist.
                 */

                if (
                    !isset($documents[$field]) ||
                    $documents[$field] === ''
                ) {
                    continue;
                }

                $filePath =
                    $documents[$field];


                $sql = "
                    INSERT INTO caregiver_documents
                    (
                        caregiver_id,
                        document_type,
                        file_path
                    )
                    VALUES
                    (
                        ?,
                        ?,
                        ?
                    )
                ";

                $stmt =
                    $this->db->prepare($sql);

                if (!$stmt) {
                    throw new Exception(
                        'Unable to prepare caregiver document.'
                    );
                }


                $stmt->bind_param(
                    "iss",
                    $caregiverId,
                    $documentType,
                    $filePath
                );


                if (!$stmt->execute()) {

                    $error =
                        $stmt->error;

                    $stmt->close();

                    throw new Exception(
                        'Unable to save caregiver document: ' .
                        $error
                    );
                }

                $stmt->close();
            }


            /*
            |--------------------------------------------------------------------------
            | COMMIT
            |--------------------------------------------------------------------------
            */

            $this->db->commit();


            return [
                'user_id' => $userId,
                'caregiver_id' => $caregiverId
            ];


        } catch (Exception $e) {

            /*
             * If anything fails,
             * undo all database changes.
             */

            $this->db->rollback();

            throw $e;
        }
    }
}