<?php

class LoginModel extends Model
{
    public function findUserByEmail(
        string $email
    ): ?array {

        $sql = "
            SELECT
                id,
                full_name,
                nic,
                phone,
                email,
                address,
                password,
                role,
                status
            FROM users
            WHERE email = ?
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            throw new Exception(
                'Failed to prepare login query.'
            );
        }

        $stmt->bind_param(
            's',
            $email
        );

        if (!$stmt->execute()) {

            $stmt->close();

            throw new Exception(
                'Failed to execute login query.'
            );
        }

        $result =
            $stmt->get_result();

        $user =
            $result->fetch_assoc();

        $stmt->close();

        return $user ?: null;
    }
}