<?php

class ForgotPasswordModel extends Model
{
    /**
     * Store OTP in the database
     */
    public function storeOtp($email, $otp, $expires_at)
    {
        // First delete any existing OTP for this email
        $deleteSql = "DELETE FROM password_resets WHERE email = ?";
        $stmtDelete = $this->db->prepare($deleteSql);
        
        if ($stmtDelete === false) {
            error_log("Failed to prepare delete query: " . $this->db->error);
            return false;
        }

        $stmtDelete->bind_param('s', $email);
        $stmtDelete->execute();
        $stmtDelete->close();

        // Insert new OTP
        $sql = "INSERT INTO password_resets (email, otp, expires_at) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        
        if ($stmt === false) {
            error_log("Failed to prepare insert query: " . $this->db->error);
            return false;
        }

        $stmt->bind_param('sss', $email, $otp, $expires_at);
        $result = $stmt->execute();
        $stmt->close();
        
        return $result;
    }

    /**
     * Verify OTP
     */
    public function verifyOtp($email, $otp)
    {
        $sql = "SELECT id, expires_at FROM password_resets WHERE email = ? AND otp = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss', $email, $otp);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if ($row) {
            // Check if expired
            if (strtotime($row['expires_at']) > time()) {
                return true;
            }
        }
        return false;
    }

    /**
     * Update user password
     */
    public function updatePassword($email, $hashed_password)
    {
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss', $hashed_password, $email);
        $result = $stmt->execute();
        $stmt->close();
        
        return $result;
    }

    /**
     * Delete OTP after successful password reset
     */
    public function clearOtp($email)
    {
        $sql = "DELETE FROM password_resets WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->close();
    }
}
?>
