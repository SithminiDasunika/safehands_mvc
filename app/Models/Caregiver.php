<?php 
 
class Caregiver extends Model 
{ 
    public function getAll(): array 
    { 
        $sql = "
            SELECT 
                u.id as user_id,
                cp.caregiver_id as id,
                u.full_name as name, 
                u.email,
                u.phone,
                cp.highest_qualification as education,
                cp.certifications as specialization,
                cp.district, 
                cp.years_experience as experience, 
                cp.languages, 
                cp.biography as description, 
                cp.profile_photo as image
            FROM users u
            JOIN caregiver_profiles cp ON u.id = cp.user_id
            WHERE u.role = 'caregiver' AND u.status = 'active'
        ";

        $result = $this->db->query($sql);

        if (!$result) {
            error_log("Failed to fetch caregivers: " . $this->db->error);
            return [];
        }

        $caregivers = [];
        while ($row = $result->fetch_assoc()) {
            $row['languages'] = !empty($row['languages']) ? explode(',', $row['languages']) : ['English'];
            $row['rating'] = '4.8';
            $caregivers[] = $row;
        }

        return $caregivers;
    }

    public function getById(int $id): ?array
    {
        $sql = "
            SELECT 
                u.id as user_id,
                cp.caregiver_id as id,
                u.full_name as name, 
                u.email,
                u.phone,
                cp.highest_qualification as education,
                cp.certifications as specialization,
                cp.district, 
                cp.years_experience as experience, 
                cp.languages, 
                cp.biography as description, 
                cp.profile_photo as image
            FROM users u
            JOIN caregiver_profiles cp ON u.id = cp.user_id
            WHERE u.role = 'caregiver' AND cp.caregiver_id = ?
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            error_log("Failed to prepare caregiver query: " . $this->db->error);
            return null;
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $caregiver = $result->fetch_assoc();
        $stmt->close();

        if ($caregiver) {
            $caregiver['languages'] = !empty($caregiver['languages']) ? explode(',', $caregiver['languages']) : ['English'];
            $caregiver['rating'] = '4.8';
            return $caregiver;
        }

        return null;
    }

    public function getByUserId(int $user_id): ?array
    {
        $sql = "
            SELECT 
                u.id as user_id,
                cp.caregiver_id as id,
                u.full_name as name, 
                u.email,
                u.phone,
                cp.highest_qualification as education,
                cp.certifications as specialization,
                cp.district, 
                cp.years_experience as experience, 
                cp.languages, 
                cp.biography as description, 
                cp.profile_photo as image
            FROM users u
            JOIN caregiver_profiles cp ON u.id = cp.user_id
            WHERE u.role = 'caregiver' AND u.id = ?
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            return null;
        }

        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $caregiver = $result->fetch_assoc();
        $stmt->close();

        if ($caregiver) {
            $caregiver['languages'] = !empty($caregiver['languages']) ? explode(',', $caregiver['languages']) : ['English'];
            $caregiver['rating'] = '4.8';
            return $caregiver;
        }

        return null;
    }
}
