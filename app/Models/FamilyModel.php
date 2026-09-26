<?php

class FamilyModel extends Model
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
                "Failed to prepare email check."
            );
        }

        $stmt->bind_param(
            "s",
            $email
        );

        $stmt->execute();

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
                "Failed to prepare NIC check."
            );
        }

        $stmt->bind_param(
            "s",
            $nic
        );

        $stmt->execute();

        $result = $stmt->get_result();

        $exists = $result->num_rows > 0;

        $stmt->close();

        return $exists;
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE FAMILY MEMBER
    |--------------------------------------------------------------------------
    |
    | Creates:
    |
    | 1. users record
    | 2. family_members record
    |
    | Account initially has:
    |
    | status = pending
    |
    */

    public function createFamilyMember(
        string $fullName,
        string $nic,
        string $phone,
        string $email,
        string $address,
        string $password
    ): int {

        /*
        |--------------------------------------------------------------------------
        | Hash Password
        |--------------------------------------------------------------------------
        */

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        if ($hashedPassword === false) {
            throw new Exception(
                "Password hashing failed."
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Start Transaction
        |--------------------------------------------------------------------------
        */

        $this->db->begin_transaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | Insert into users
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
                    'family',
                    'pending'
                )
            ";

            $stmt = $this->db->prepare($sql);

            if (!$stmt) {
                throw new Exception(
                    "Failed to prepare family user registration."
                );
            }

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
                    "Failed to create family account: " . $error
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Get Newly Created User ID
            |--------------------------------------------------------------------------
            */

            $userId = $this->db->insert_id;

            $stmt->close();


            /*
            |--------------------------------------------------------------------------
            | Insert into family_members
            |--------------------------------------------------------------------------
            */

            $sql = "
                INSERT INTO family_members
                (
                    user_id
                )
                VALUES
                (?)
            ";

            $stmt = $this->db->prepare($sql);

            if (!$stmt) {
                throw new Exception(
                    "Failed to prepare family member record."
                );
            }

            $stmt->bind_param(
                "i",
                $userId
            );

            if (!$stmt->execute()) {

                $error = $stmt->error;

                $stmt->close();

                throw new Exception(
                    "Failed to create family member record: " . $error
                );
            }

            $stmt->close();


            /*
            |--------------------------------------------------------------------------
            | Commit Transaction
            |--------------------------------------------------------------------------
            */

            $this->db->commit();


            return $userId;

        } catch (Exception $e) {

            /*
            |--------------------------------------------------------------------------
            | Rollback if Something Goes Wrong
            |--------------------------------------------------------------------------
            */

            $this->db->rollback();

            throw $e;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE REGISTRATION PAYMENT
    |--------------------------------------------------------------------------
    |
    | Saves:
    |
    | user_id
    | amount
    | transaction_id
    | status
    | paid_at
    |
    | IMPORTANT:
    | Card number and CVV are NOT stored.
    |
    */

    public function createRegistrationPayment(
        int $userId,
        float $amount,
        string $transactionId
    ): bool {

        $sql = "
            INSERT INTO registration_payments
            (
                user_id,
                amount,
                transaction_id,
                status,
                paid_at
            )
            VALUES
            (
                ?,
                ?,
                ?,
                'paid',
                NOW()
            )
        ";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            throw new Exception(
                "Failed to prepare payment."
            );
        }

        $stmt->bind_param(
            "ids",
            $userId,
            $amount,
            $transactionId
        );

        if (!$stmt->execute()) {

            $error = $stmt->error;

            $stmt->close();

            throw new Exception(
                "Failed to save payment: " . $error
            );
        }

        $stmt->close();

        return true;
    }


    /*
    |--------------------------------------------------------------------------
    | ACTIVATE FAMILY MEMBER
    |--------------------------------------------------------------------------
    |
    | Changes:
    |
    | pending -> active
    |
    | This is called after successful demo payment.
    |
    */

    public function activateFamilyMember(
        int $userId
    ): bool {

        $sql = "
            UPDATE users
            SET status = 'active'
            WHERE id = ?
            AND role = 'family'
        ";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            throw new Exception(
                "Failed to prepare account activation."
            );
        }

        $stmt->bind_param(
            "i",
            $userId
        );

        if (!$stmt->execute()) {

            $error = $stmt->error;

            $stmt->close();

            throw new Exception(
                "Failed to activate account: " . $error
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Check Whether Account Was Actually Updated
        |--------------------------------------------------------------------------
        */

        if ($stmt->affected_rows === 0) {

            $stmt->close();

            throw new Exception(
                "Family account could not be activated."
            );
        }

        $stmt->close();

        return true;
    }
    public function getAllFamilies()
    {
        $sql = "
            SELECT u.id as user_id, u.full_name, u.email, u.phone, u.nic, u.address, u.status, u.created_at, f.id as family_id
            FROM users u
            JOIN family_members f ON u.id = f.user_id
            WHERE u.role = 'family'
            ORDER BY u.created_at DESC
        ";
        $result = $this->db->query($sql);
        $families = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                // Count patients
                $patientSql = "SELECT COUNT(*) as pc FROM patients WHERE family_user_id = " . (int)$row['user_id'];
                $pRes = $this->db->query($patientSql);
                $row['patient_count'] = ($pRes && $pRow = $pRes->fetch_assoc()) ? $pRow['pc'] : 0;
                $families[] = $row;
            }
        }
        return $families;
    }

    public function getFamilyDetails($familyId)
    {
        $sql = "
            SELECT u.id as user_id, u.full_name, u.email, u.phone, u.nic, u.address, u.status, u.created_at, f.id as family_id
            FROM users u
            JOIN family_members f ON u.id = f.user_id
            WHERE f.id = ?
        ";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) return null;
        $stmt->bind_param("i", $familyId);
        $stmt->execute();
        $res = $stmt->get_result();
        $family = $res->fetch_assoc();
        $stmt->close();

        if ($family) {
            $pSql = "SELECT * FROM patients WHERE family_user_id = ?";
            $pStmt = $this->db->prepare($pSql);
            if ($pStmt) {
                $pStmt->bind_param("i", $family['user_id']);
                $pStmt->execute();
                $pRes = $pStmt->get_result();
                $family['patients'] = [];
                while ($pRow = $pRes->fetch_assoc()) {
                    $family['patients'][] = $pRow;
                }
                $pStmt->close();
            }
        }
        return $family;
    }
}
