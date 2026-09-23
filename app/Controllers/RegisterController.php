 <?php

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Role Selection
    |--------------------------------------------------------------------------
    */

    public function index(): void
    {
        $data = [
            'title' => 'Join SafeHands',
            'css'   => 'register.css'
        ];

        $this->view(
            'register/index',
            $data,
            'register'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Family Registration
    |--------------------------------------------------------------------------
    */

    public function family(): void
    {
        $data = [
            'title' => 'Family Member Registration',
            'css'   => 'register-family.css'
        ];

        $this->view(
            'register/family',
            $data,
            'register'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Caregiver - Personal Information
    |--------------------------------------------------------------------------
    */

    public function caregiver(): void
    {
        $data = [
            'title' => 'Caregiver Registration - Personal Information',
            'css'   => 'caregiver-register.css',
            'step'  => 1
        ];

        $this->view(
            'register/caregiver',
            $data,
            'register'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Caregiver - Personal Information - Sinhala
    |--------------------------------------------------------------------------
    */

    public function caregiverSi(): void
    {
        $data = [
            'title' => 'රැකබලා ගන්නා ලියාපදිංචිය - පුද්ගලික තොරතුරු',
            'css'   => 'caregiver-register.css',
            'step'  => 1
        ];

        $this->view(
            'register/caregiver-si',
            $data,
            'register'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Caregiver - Professional Information
    |--------------------------------------------------------------------------
    */

    public function professional(): void
    {
        $this->startSession();

        $data = [
            'title' => 'Caregiver Registration - Professional Information',
            'css'   => 'caregiver-register.css',
            'step'  => 2,
            'form'  => $_SESSION['caregiver']['personal'] ?? []
        ];

        $this->view(
            'register/professional',
            $data,
            'register'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Caregiver - Professional Information - Sinhala
    |--------------------------------------------------------------------------
    */

    public function professionalSi(): void
    {
        $this->startSession();

        $data = [
            'title' => 'රැකබලා ගන්නා ලියාපදිංචිය - වෘත්තීය තොරතුරු',
            'css'   => 'caregiver-register.css',
            'step'  => 2,
            'form'  => $_SESSION['caregiver']['personal'] ?? []
        ];

        $this->view(
            'register/professional-si',
            $data,
            'register'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Save Personal Information
    |--------------------------------------------------------------------------
    */

    public function savePersonal(): void
    {
        $this->startSession();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /safehands_mvc/register/caregiver');
            exit;
        }

        $_SESSION['caregiver']['personal'] = [
            'full_name'        => trim($_POST['full_name'] ?? ''),
            'nic'              => trim($_POST['nic'] ?? ''),
            'dob'              => $_POST['dob'] ?? '',
            'gender'           => $_POST['gender'] ?? '',
            'phone'            => trim($_POST['phone'] ?? ''),
            'email'            => trim($_POST['email'] ?? ''),
            'address'          => trim($_POST['address'] ?? ''),
            'district'         => trim($_POST['district'] ?? ''),
            'password'         => $_POST['password'] ?? ''
        ];

        header('Location: /safehands_mvc/register/professional');
        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | Save Professional Information
    |--------------------------------------------------------------------------
    */

    public function saveProfessional(): void
    {
        $this->startSession();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /safehands_mvc/register/professional');
            exit;
        }

        $_SESSION['caregiver']['professional'] = [
            'highest_qualification' => trim(
                $_POST['highest_qualification'] ?? ''
            ),

            'years_experience' => (int)(
                $_POST['years_experience'] ?? 0
            ),

            'professional_certification' => trim(
                $_POST['professional_certification'] ?? ''
            ),

            'languages' => trim(
                $_POST['languages'] ?? ''
            ),

            'service_areas' => trim(
                $_POST['service_areas'] ?? ''
            ),

            'description' => trim(
                $_POST['description'] ?? ''
            )
        ];

        /*
         * Profile photo
         */

        if (
            isset($_FILES['profile_photo']) &&
            $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK
        ) {

            $uploadDirectory =
                __DIR__ .
                '/../../public/uploads/caregivers/';

            if (!is_dir($uploadDirectory)) {
                mkdir(
                    $uploadDirectory,
                    0777,
                    true
                );
            }

            $extension =
                strtolower(
                    pathinfo(
                        $_FILES['profile_photo']['name'],
                        PATHINFO_EXTENSION
                    )
                );

            $allowedExtensions = [
                'jpg',
                'jpeg',
                'png',
                'webp'
            ];

            if (
                in_array(
                    $extension,
                    $allowedExtensions,
                    true
                )
            ) {

                $fileName =
                    uniqid(
                        'caregiver_',
                        true
                    ) .
                    '.' .
                    $extension;

                $destination =
                    $uploadDirectory .
                    $fileName;

                if (
                    move_uploaded_file(
                        $_FILES['profile_photo']['tmp_name'],
                        $destination
                    )
                ) {

                    $_SESSION['caregiver']['professional']
                        ['profile_photo'] =
                        $fileName;
                }
            }
        }

        header(
            'Location: /safehands_mvc/register/verification'
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | Verification Page
    |--------------------------------------------------------------------------
    */

    public function verification(): void
    {
        $this->startSession();

        $data = [
            'title' => 'Caregiver Registration - Verification',
            'css'   => 'caregiver-register.css',
            'step'  => 3
        ];

        $this->view(
            'register/verification',
            $data,
            'register'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Verification - Sinhala
    |--------------------------------------------------------------------------
    */

    public function verificationSi(): void
    {
        $this->startSession();

        $data = [
            'title' => 'රැකබලා ගන්නා ලියාපදිංචිය - සත්‍යාපනය',
            'css'   => 'caregiver-register.css',
            'step'  => 3
        ];

        $this->view(
            'register/verification-si',
            $data,
            'register'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Submit Application
    |--------------------------------------------------------------------------
    */

    public function submit(): void
    {
        $this->startSession();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header(
                'Location: /safehands_mvc/register/verification'
            );
            exit;
        }

        /*
         * Save uploaded NIC
         */

        $nicDocument = $this->uploadDocument(
            'nic_document'
        );

        /*
         * Save certificate
         */

        $certificate = $this->uploadDocument(
            'certificate'
        );

        $_SESSION['caregiver']['verification'] = [
            'nic_document' => $nicDocument,
            'certificate'  => $certificate
        ];

        /*
         * At this stage the application is ready.
         *
         * Database insertion can be connected here after
         * the exact database tables are confirmed.
         */

        header(
            'Location: /safehands_mvc/register/success'
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | Success
    |--------------------------------------------------------------------------
    */

    public function success(): void
    {
        $data = [
            'title' => 'Application Submitted',
            'css'   => 'caregiver-register.css'
        ];

        $this->view(
            'register/success',
            $data,
            'register'
        );
    }

public function successSi(): void
{
    $data = [
        'title' => 'අයදුම්පත සාර්ථකව ඉදිරිපත් කරන ලදී',
        'css'   => 'caregiver-register.css'
    ];

    $this->view(
        'register/success-si',
        $data,
        'register'
    );
}
    /*
    |--------------------------------------------------------------------------
    | Session
    |--------------------------------------------------------------------------
    */

    private function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Upload Document
    |--------------------------------------------------------------------------
    */

    private function uploadDocument(
        string $field
    ): ?string {

        if (
            !isset($_FILES[$field]) ||
            $_FILES[$field]['error'] !== UPLOAD_ERR_OK
        ) {
            return null;
        }

        $uploadDirectory =
            __DIR__ .
            '/../../public/uploads/caregivers/';

        if (!is_dir($uploadDirectory)) {
            mkdir(
                $uploadDirectory,
                0777,
                true
            );
        }

        $extension =
            strtolower(
                pathinfo(
                    $_FILES[$field]['name'],
                    PATHINFO_EXTENSION
                )
            );

        $allowedExtensions = [
            'jpg',
            'jpeg',
            'png',
            'pdf'
        ];

        if (
            !in_array(
                $extension,
                $allowedExtensions,
                true
            )
        ) {
            return null;
        }

        $fileName =
            uniqid(
                'document_',
                true
            ) .
            '.' .
            $extension;

        $destination =
            $uploadDirectory .
            $fileName;

        if (
            move_uploaded_file(
                $_FILES[$field]['tmp_name'],
                $destination
            )
        ) {
            return $fileName;
        }

        return null;
    }
}