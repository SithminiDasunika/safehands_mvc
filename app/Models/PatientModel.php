<?php

class PatientModel extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Create Patient
    |--------------------------------------------------------------------------
    */

    public function createPatient(array $data)
    {
        $sql = "
            INSERT INTO patients (
                family_user_id,
                full_name,
                date_of_birth,
                gender,
                relationship,
                nic,
                phone,
                address,
                profile_photo,
                blood_group,
                mobility_status,
                weight,
                blood_pressure,
                medical_conditions,
                allergies,
                dietary_restrictions,
                current_medications,
                special_care_requirements,
                doctors_notes,
                emergency_contact_name,
                emergency_contact_relationship,
                emergency_contact_phone,
                emergency_alternative_phone,
                medical_document
            )
            VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?,
                ?, ?, ?, ?, ?, ?
            )
        ";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            die(
                'Prepare failed: ' .
                $this->db->error
            );
        }

        $familyUserId =
            (int) $data['family_user_id'];

        $fullName =
            $data['full_name'];

        $dateOfBirth =
            $data['date_of_birth'];

        $gender =
            $data['gender'];

        $relationship =
            $data['relationship'];

        $nic =
            $data['nic'];

        $phone =
            $data['phone'];

        $address =
            $data['address'];

        $profilePhoto =
            $data['profile_photo'];

        $bloodGroup =
            $data['blood_group'];

        $mobilityStatus =
            $data['mobility_status'];

        $weight =
            $data['weight'];

        $bloodPressure =
            $data['blood_pressure'];

        $medicalConditions =
            $data['medical_conditions'];

        $allergies =
            $data['allergies'];

        $dietaryRestrictions =
            $data['dietary_restrictions'];

        $currentMedications =
            $data['current_medications'];

        $specialCareRequirements =
            $data['special_care_requirements'];

        $doctorsNotes =
            $data['doctors_notes'];

        $emergencyContactName =
            $data['emergency_contact_name'];

        $emergencyContactRelationship =
            $data['emergency_contact_relationship'];

        $emergencyContactPhone =
            $data['emergency_contact_phone'];

        $emergencyAlternativePhone =
            $data['emergency_alternative_phone'];

        $medicalDocument =
            $data['medical_document'];


        $stmt->bind_param(
            'issssssssssdsssssssssssss',
            $familyUserId,
            $fullName,
            $dateOfBirth,
            $gender,
            $relationship,
            $nic,
            $phone,
            $address,
            $profilePhoto,
            $bloodGroup,
            $mobilityStatus,
            $weight,
            $bloodPressure,
            $medicalConditions,
            $allergies,
            $dietaryRestrictions,
            $currentMedications,
            $specialCareRequirements,
            $doctorsNotes,
            $emergencyContactName,
            $emergencyContactRelationship,
            $emergencyContactPhone,
            $emergencyAlternativePhone,
            $medicalDocument
        );


        if (!$stmt->execute()) {
            die(
                'Patient insert failed: ' .
                $stmt->error
            );
        }


        return $this->db->insert_id;
    }
}