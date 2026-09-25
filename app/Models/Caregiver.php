 <?php 
 
class Caregiver extends Model 
{ 
    public function getAll(): array 
    { 
        /* 
         * Temporary data for UI development. 
         * 
         * Later this will come from the 
         * caregivers table in MySQL. 
         */ 
 
        return [ 
            [ 
                'id' => 1, 
                'name' => 'Sarah Jenkins', 
                'specialization' => 'Senior Elderly Care Specialist', 
                'district' => 'Central Business District', 
                'experience' => '12 Years', 
                'education' => 'Registered Nurse (RN)', 
                'rating' => '4.9', 
                'languages' => ['English', 'Spanish'], 
                'description' => 
                    'Compassionate care is my priority. I specialize in post-surgical recovery and dementia support for elderly patients.', 
                'image' => 
                    '/safehands_mvc/public/assets/images/caregiver-1.jpg' 
            ], 
 
            [ 
                'id' => 2, 
                'name' => 'Marcus Chen', 
                'specialization' => 'Physical Therapy Assistant', 
                'district' => 'West Coast District', 
                'experience' => '6 Years', 
                'education' => 'CNA Certified', 
                'rating' => '4.8', 
                'languages' => ['English', 'Mandarin'], 
                'description' => 
                    'I focus on physical well-being and mobility. Dedicated to helping clients maintain their independence at home.', 
                'image' => 
                    '/safehands_mvc/public/assets/images/caregiver-2.jpg' 
            ], 
 
            [ 
                'id' => 3, 
                'name' => 'Elena Rodriguez', 
                'specialization' => 'Pediatric Care Specialist', 
                'district' => 'Green Valley District', 
                'experience' => '20+ Years', 
                'education' => 'Registered Nurse (RN)', 
                'rating' => '5.0', 
                'languages' => ['English', 'French'], 
                'description' => 
                    'Specialized in pediatric and specialized needs care. I provide reliable, long-term support for families.', 
                'image' => 
                    '/safehands_mvc/public/assets/images/caregiver-3.jpg' 
            ], 
 
            [ 
                'id' => 4, 
                'name' => 'Aisha Al-Farsi', 
                'specialization' => 'Maternity Care Support', 
                'district' => 'North Ridge District', 
                'experience' => '4 Years', 
                'education' => 'Doula Certified', 
                'rating' => '4.7', 
                'languages' => ['English', 'Arabic'], 
                'description' => 
                    'Helping new mothers navigate the first weeks of parenthood with professional care and emotional support.', 
                'image' => 
                    '/safehands_mvc/public/assets/images/caregiver-4.jpg' 
            ] 
        ]; 
    }

    public function getById(int $id): ?array
    {
        foreach ($this->getAll() as $caregiver) {
            if ($caregiver['id'] === $id) {
                return $caregiver;
            }
        }

        return null;
    }
}