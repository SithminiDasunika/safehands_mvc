<?php

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Start Session
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
    | Register Index
    |--------------------------------------------------------------------------
    */

    public function index(): void
    {
        $data = [
            'title' => 'Create Your Account',
            'css'   => 'register.css'
        ];

        // IMPORTANT:
        // This page allows the user to choose:
        // Family Member OR Caregiver
        $this->view(
            'register/index',
            $data,
            'register'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Family Member Registration
    |--------------------------------------------------------------------------
    |
    | Step 1 -> Personal Details
    | Step 2 -> Demo Payment
    | Step 3 -> Registration Complete
    |
    */

    public function family(): void
    {
        $this->startSession();

        $errors = [];

        $familyModel = $this->model('FamilyModel');


        /*
        |--------------------------------------------------------------------------
        | STEP 1 - PERSONAL DETAILS
        |--------------------------------------------------------------------------
        */

        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' &&
            ($_POST['action'] ?? '') === 'continue_payment'
        ) {

            /*
            |--------------------------------------------------------------------------
            | Get Form Data
            |--------------------------------------------------------------------------
            */

            $fullName = trim($_POST['full_name'] ?? '');
            $nic = trim($_POST['nic'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $address = trim($_POST['address'] ?? '');

            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            $terms = isset($_POST['terms']);


            /*
            |--------------------------------------------------------------------------
            | Validation
            |--------------------------------------------------------------------------
            */

            if ($fullName === '') {
                $errors[] = 'Full name is required.';
            }

            if ($nic === '') {
                $errors[] = 'National Identity Card (NIC) is required.';
            }

            if ($phone === '') {
                $errors[] = 'Phone number is required.';
            }

            if ($email === '') {

                $errors[] = 'Email address is required.';

            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $errors[] = 'Please enter a valid email address.';
            }

            if ($address === '') {
                $errors[] = 'Home address is required.';
            }

            if ($password === '') {

                $errors[] = 'Password is required.';

            } elseif (strlen($password) < 8) {

                $errors[] =
                    'Password must contain at least 8 characters.';
            }

            if ($password !== $confirmPassword) {
                $errors[] = 'Passwords do not match.';
            }

            if (!$terms) {
                $errors[] =
                    'You must agree to the Terms & Conditions and Privacy Policy.';
            }


            /*
            |--------------------------------------------------------------------------
            | Check Duplicate Email and NIC
            |--------------------------------------------------------------------------
            */

            if (empty($errors)) {

                if ($familyModel->emailExists($email)) {

                    $errors[] =
                        'An account with this email address already exists.';
                }

                if ($familyModel->nicExists($nic)) {

                    $errors[] =
                        'An account with this NIC already exists.';
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Validation Failed
            |--------------------------------------------------------------------------
            */

            if (!empty($errors)) {

                $data = [
                    'title' => 'Family Member Registration',
                    'css' => 'register-family.css',
                    'step' => 1,
                    'registrationFee' => 1000,
                    'registration' => [],
                    'payment' => [],
                    'errors' => $errors,
                    'old' => $_POST
                ];

                $this->view(
                    'register/family',
                    $data,
                    'register'
                );

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | CREATE FAMILY MEMBER ACCOUNT
            |--------------------------------------------------------------------------
            */

            try {

                /*
                |--------------------------------------------------------------------------
                | Create User + Family Member
                |--------------------------------------------------------------------------
                |
                | FamilyModel handles:
                |
                | 1. Password hashing
                | 2. users table
                | 3. family_members table
                |
                */

                $userId = $familyModel->createFamilyMember(
                    $fullName,
                    $nic,
                    $phone,
                    $email,
                    $address,
                    $password
                );


                /*
                |--------------------------------------------------------------------------
                | Save Registration Information in Session
                |--------------------------------------------------------------------------
                |
                | IMPORTANT:
                | Password is NOT stored in session.
                |
                */

                $_SESSION['family_registration'] = [
                    'user_id' => $userId,
                    'full_name' => $fullName,
                    'nic' => $nic,
                    'phone' => $phone,
                    'email' => $email,
                    'address' => $address
                ];


                /*
                |--------------------------------------------------------------------------
                | Registration Fee
                |--------------------------------------------------------------------------
                */

                $_SESSION['family_registration_fee'] = 1000;


                /*
                |--------------------------------------------------------------------------
                | Show STEP 2
                |--------------------------------------------------------------------------
                */

                $data = [
                    'title' => 'Family Member Registration',
                    'css' => 'register-family.css',
                    'step' => 2,
                    'registrationFee' => 1000,
                    'registration' =>
                        $_SESSION['family_registration'],
                    'payment' => [],
                    'errors' => [],
                    'old' => []
                ];

                $this->view(
                    'register/family',
                    $data,
                    'register'
                );

                return;

            } catch (Exception $e) {

                /*
                |--------------------------------------------------------------------------
                | Account Creation Failed
                |--------------------------------------------------------------------------
                */

                $errors[] =
                    'Registration could not be completed. Please try again.';

                $data = [
                    'title' => 'Family Member Registration',
                    'css' => 'register-family.css',
                    'step' => 1,
                    'registrationFee' => 1000,
                    'registration' => [],
                    'payment' => [],
                    'errors' => $errors,
                    'old' => $_POST
                ];

                $this->view(
                    'register/family',
                    $data,
                    'register'
                );

                return;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | STEP 2 - PROCESS PAYMENT
        |--------------------------------------------------------------------------
        */

        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' &&
            ($_POST['action'] ?? '') === 'process_payment'
        ) {

            /*
            |--------------------------------------------------------------------------
            | Check Registration Session
            |--------------------------------------------------------------------------
            */

            if (empty($_SESSION['family_registration'])) {

                $errors[] =
                    'Your registration session has expired. Please start again.';

                $data = [
                    'title' => 'Family Member Registration',
                    'css' => 'register-family.css',
                    'step' => 1,
                    'registrationFee' => 1000,
                    'registration' => [],
                    'payment' => [],
                    'errors' => $errors,
                    'old' => []
                ];

                $this->view(
                    'register/family',
                    $data,
                    'register'
                );

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | Get User ID
            |--------------------------------------------------------------------------
            */

            $userId =
                $_SESSION['family_registration']['user_id'] ?? 0;

            if (!$userId) {

                $errors[] =
                    'Invalid registration. Please start again.';

                $data = [
                    'title' => 'Family Member Registration',
                    'css' => 'register-family.css',
                    'step' => 1,
                    'registrationFee' => 1000,
                    'registration' => [],
                    'payment' => [],
                    'errors' => $errors,
                    'old' => []
                ];

                $this->view(
                    'register/family',
                    $data,
                    'register'
                );

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | Payment Inputs
            |--------------------------------------------------------------------------
            */

            $cardName =
                trim($_POST['card_name'] ?? '');

            $cardNumber =
                preg_replace(
                    '/\D/',
                    '',
                    $_POST['card_number'] ?? ''
                );

            $expiry =
                trim($_POST['expiry'] ?? '');

            $cvv =
                trim($_POST['cvv'] ?? '');


            /*
            |--------------------------------------------------------------------------
            | Payment Validation
            |--------------------------------------------------------------------------
            */

            if ($cardName === '') {

                $errors[] =
                    'Cardholder name is required.';
            }


            if ($cardNumber === '') {

                $errors[] =
                    'Card number is required.';

            } elseif (
                strlen($cardNumber) < 13 ||
                strlen($cardNumber) > 19
            ) {

                $errors[] =
                    'Please enter a valid card number.';
            }


            if (
                !preg_match(
                    '/^(0[1-9]|1[0-2])\/([0-9]{2})$/',
                    $expiry
                )
            ) {

                $errors[] =
                    'Please enter a valid expiry date in MM/YY format.';
            }


            if (
                !preg_match(
                    '/^[0-9]{3,4}$/',
                    $cvv
                )
            ) {

                $errors[] =
                    'Please enter a valid CVV.';
            }


            /*
            |--------------------------------------------------------------------------
            | Payment Validation Failed
            |--------------------------------------------------------------------------
            */

            if (!empty($errors)) {

                /*
                |--------------------------------------------------------------------------
                | IMPORTANT SECURITY
                |--------------------------------------------------------------------------
                |
                | Do NOT send card number or CVV back to the view.
                |
                */

                $safeOld = [
                    'card_name' => $cardName,
                    'expiry' => $expiry
                ];

                $data = [
                    'title' => 'Family Member Registration',
                    'css' => 'register-family.css',
                    'step' => 2,
                    'registrationFee' =>
                        $_SESSION['family_registration_fee'] ?? 1000,
                    'registration' =>
                        $_SESSION['family_registration'],
                    'payment' => [],
                    'errors' => $errors,
                    'old' => $safeOld
                ];

                $this->view(
                    'register/family',
                    $data,
                    'register'
                );

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | DEMO PAYMENT
            |--------------------------------------------------------------------------
            |
            | This is a simulated payment for the project.
            |
            | Card number and CVV are NEVER stored.
            |
            */

            $registrationFee =
                $_SESSION['family_registration_fee'] ?? 1000;


            /*
            |--------------------------------------------------------------------------
            | Generate Transaction ID
            |--------------------------------------------------------------------------
            */

            try {

                $transactionId =
                    'REG-' .
                    date('YmdHis') .
                    '-' .
                    random_int(1000, 9999);

            } catch (Exception $e) {

                $transactionId =
                    'REG-' .
                    date('YmdHis') .
                    '-' .
                    mt_rand(1000, 9999);
            }


            /*
            |--------------------------------------------------------------------------
            | Save Payment + Activate Account
            |--------------------------------------------------------------------------
            */

            try {

                /*
                |--------------------------------------------------------------------------
                | Create Payment Record
                |--------------------------------------------------------------------------
                */

                $familyModel->createRegistrationPayment(
                    $userId,
                    $registrationFee,
                    $transactionId
                );


                /*
                |--------------------------------------------------------------------------
                | Activate Family Account
                |--------------------------------------------------------------------------
                */

                $familyModel->activateFamilyMember(
                    $userId
                );


                /*
                |--------------------------------------------------------------------------
                | Save Payment Information in Session
                |--------------------------------------------------------------------------
                */

                $_SESSION['family_payment'] = [
                    'transaction_id' => $transactionId,
                    'amount' => $registrationFee,
                    'status' => 'Paid',
                    'date' => date('Y-m-d H:i:s')
                ];


                /*
                |--------------------------------------------------------------------------
                | Registration Completed
                |--------------------------------------------------------------------------
                */

                $_SESSION['family_registration_completed'] = true;


                /*
                |--------------------------------------------------------------------------
                | SHOW STEP 3
                |--------------------------------------------------------------------------
                */

                $data = [
                    'title' => 'Registration Successful',
                    'css' => 'register-family.css',
                    'step' => 3,
                    'registrationFee' => $registrationFee,
                    'registration' =>
                        $_SESSION['family_registration'],
                    'payment' =>
                        $_SESSION['family_payment'],
                    'errors' => [],
                    'old' => []
                ];

                $this->view(
                    'register/family',
                    $data,
                    'register'
                );

                return;

            } catch (Exception $e) {

                /*
                |--------------------------------------------------------------------------
                | Payment Failed
                |--------------------------------------------------------------------------
                */

                $errors[] =
                    'Payment could not be completed. Please try again.';

                /*
                |--------------------------------------------------------------------------
                | Do not return sensitive card details
                |--------------------------------------------------------------------------
                */

                $safeOld = [
                    'card_name' => $cardName,
                    'expiry' => $expiry
                ];

                $data = [
                    'title' => 'Family Member Registration',
                    'css' => 'register-family.css',
                    'step' => 2,
                    'registrationFee' => $registrationFee,
                    'registration' =>
                        $_SESSION['family_registration'],
                    'payment' => [],
                    'errors' => $errors,
                    'old' => $safeOld
                ];

                $this->view(
                    'register/family',
                    $data,
                    'register'
                );

                return;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | DEFAULT - STEP 1
        |--------------------------------------------------------------------------
        */

        $data = [
            'title' => 'Family Member Registration',
            'css' => 'register-family.css',
            'step' => 1,
            'registrationFee' => 1000,
            'registration' => [],
            'payment' => [],
            'errors' => [],
            'old' => []
        ];

        $this->view(
            'register/family',
            $data,
            'register'
        );
    }

/*
|--------------------------------------------------------------------------
| CAREGIVER REGISTRATION
|--------------------------------------------------------------------------
*/

public function caregiver(): void
{
    $this->startSession();

    $data = [
        'title' => 'Caregiver Registration',
        'css' => 'caregiver-register.css',
        'errors' => [],
        'old' => []
    ];

    $this->view(
        'register/caregiver',
        $data,
        'register'
    );
}


/*
|--------------------------------------------------------------------------
| CAREGIVER REGISTRATION - SINHALA
|--------------------------------------------------------------------------
*/

public function caregiverSi(): void
{
    $this->startSession();

    $data = [
        'title' => 'Caregiver Registration',
        'css' => 'caregiver-register.css',
        'errors' => [],
        'old' => []
    ];

    $this->view(
        'register/caregiver-si',
        $data,
        'register'
    );
}


/*
|--------------------------------------------------------------------------
| STEP 1 - SAVE PERSONAL INFORMATION
|--------------------------------------------------------------------------
*/

public function savePersonal(): void
{
    $this->startSession();

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

        header(
            'Location: /safehands_mvc/register/caregiver'
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | Get Form Data
    |--------------------------------------------------------------------------
    */

    $fullName =
        trim($_POST['full_name'] ?? '');

    $nic =
        trim($_POST['nic'] ?? '');

    $dateOfBirth =
        trim($_POST['date_of_birth'] ?? '');

    $gender =
        trim($_POST['gender'] ?? '');

    $phone =
        trim($_POST['phone'] ?? '');

    $email =
        trim($_POST['email'] ?? '');

    $address =
        trim($_POST['address'] ?? '');

    $district =
        trim($_POST['district'] ?? '');

    $password =
        $_POST['password'] ?? '';

    $confirmPassword =
        $_POST['confirm_password'] ?? '';


    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */

    $errors = [];


    if ($fullName === '') {
        $errors[] =
            'Full name is required.';
    }


    if ($nic === '') {
        $errors[] =
            'NIC number is required.';
    }


    if ($dateOfBirth === '') {
        $errors[] =
            'Date of birth is required.';
    }


    if ($gender === '') {
        $errors[] =
            'Gender is required.';
    }


    if ($phone === '') {
        $errors[] =
            'Phone number is required.';
    }


    if ($email === '') {

        $errors[] =
            'Email address is required.';

    } elseif (
        !filter_var(
            $email,
            FILTER_VALIDATE_EMAIL
        )
    ) {

        $errors[] =
            'Please enter a valid email address.';
    }


    if ($address === '') {
        $errors[] =
            'Home address is required.';
    }


    if ($district === '') {
        $errors[] =
            'District is required.';
    }


    if ($password === '') {

        $errors[] =
            'Password is required.';

    } elseif (
        strlen($password) < 8
    ) {

        $errors[] =
            'Password must contain at least 8 characters.';
    }


    if (
        $password !==
        $confirmPassword
    ) {

        $errors[] =
            'Passwords do not match.';
    }


    /*
    |--------------------------------------------------------------------------
    | Validate Date
    |--------------------------------------------------------------------------
    */

    if ($dateOfBirth !== '') {

        $dateObject =
            DateTime::createFromFormat(
                'Y-m-d',
                $dateOfBirth
            );

        if (
            !$dateObject ||
            $dateObject->format('Y-m-d')
                !== $dateOfBirth
        ) {

            $errors[] =
                'Please enter a valid date of birth.';
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Check Duplicate Email / NIC
    |--------------------------------------------------------------------------
    */

    if (empty($errors)) {

        try {

            $caregiverModel =
                $this->model(
                    'CaregiverModel'
                );


            if (
                $caregiverModel
                    ->emailExists($email)
            ) {

                $errors[] =
                    'An account with this email address already exists.';
            }


            if (
                $caregiverModel
                    ->nicExists($nic)
            ) {

                $errors[] =
                    'An account with this NIC already exists.';
            }


        } catch (Exception $e) {

            $errors[] =
                'Unable to validate your registration. Please try again.';
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Validation Failed
    |--------------------------------------------------------------------------
    */

    if (!empty($errors)) {

        $data = [

            'title' =>
                'Caregiver Registration',

            'css' =>
                'caregiver-register.css',

            'errors' =>
                $errors,

            'old' =>
                $_POST
        ];


        $this->view(
            'register/caregiver',
            $data,
            'register'
        );

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Save Personal Information In Session
    |--------------------------------------------------------------------------
    */

    $_SESSION[
        'caregiver_personal'
    ] = [

        'full_name' =>
            $fullName,

        'nic' =>
            $nic,

        'date_of_birth' =>
            $dateOfBirth,

        'gender' =>
            $gender,

        'phone' =>
            $phone,

        'email' =>
            $email,

        'address' =>
            $address,

        'district' =>
            $district,

        'password' =>
            $password
    ];


    /*
    |--------------------------------------------------------------------------
    | Go To Professional Step
    |--------------------------------------------------------------------------
    */

    header(
        'Location: /safehands_mvc/register/professional'
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| STEP 2 - PROFESSIONAL
|--------------------------------------------------------------------------
*/

public function professional(): void
{
    $this->startSession();


    if (
        empty(
            $_SESSION[
                'caregiver_personal'
            ]
        )
    ) {

        header(
            'Location: /safehands_mvc/register/caregiver'
        );

        exit;
    }


    $data = [

        'title' =>
            'Professional Caregiver Registration',

        'css' =>
            'caregiver-register.css',

        'errors' =>
            [],

        'old' =>
            $_SESSION[
                'caregiver_professional'
            ] ?? []
    ];


    $this->view(
        'register/professional',
        $data,
        'register'
    );
}


/*
|--------------------------------------------------------------------------
| PROFESSIONAL - SINHALA
|--------------------------------------------------------------------------
*/

public function professionalSi(): void
{
    $this->startSession();


    if (
        empty(
            $_SESSION[
                'caregiver_personal'
            ]
        )
    ) {

        header(
            'Location: /safehands_mvc/register/caregiver-si'
        );

        exit;
    }


    $data = [

        'title' =>
            'Professional Caregiver Registration',

        'css' =>
            'caregiver-register.css',

        'errors' =>
            [],

        'old' =>
            $_SESSION[
                'caregiver_professional'
            ] ?? []
    ];


    $this->view(
        'register/professional-si',
        $data,
        'register'
    );
}


/*
|--------------------------------------------------------------------------
| STEP 2 - SAVE PROFESSIONAL INFORMATION
|--------------------------------------------------------------------------
*/

public function saveProfessional(): void
{
    $this->startSession();


    if (
        $_SERVER['REQUEST_METHOD']
        !== 'POST'
    ) {

        header(
            'Location: /safehands_mvc/register/professional'
        );

        exit;
    }


    if (
        empty(
            $_SESSION[
                'caregiver_personal'
            ]
        )
    ) {

        header(
            'Location: /safehands_mvc/register/caregiver'
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | Get Form Data
    |--------------------------------------------------------------------------
    */

    $highestQualification =
        trim(
            $_POST[
                'highest_qualification'
            ] ?? ''
        );


    $yearsExperience =
        trim(
            $_POST[
                'years_experience'
            ] ?? ''
        );


    $professionalCertification =
        trim(
            $_POST[
                'professional_certification'
            ] ?? ''
        );


    $languages =
        trim(
            $_POST[
                'languages'
            ] ?? ''
        );


    $serviceAreas =
        trim(
            $_POST[
                'service_areas'
            ] ?? ''
        );


    $dailyRate =
        trim(
            $_POST[
                'daily_rate'
            ] ?? ''
        );


    $biography =
        trim(
            $_POST[
                'biography'
            ] ?? ''
        );


    $errors = [];


    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */

    if (
        $highestQualification === ''
    ) {

        $errors[] =
            'Highest qualification is required.';
    }


    if (
        $yearsExperience === '' ||
        !ctype_digit(
            $yearsExperience
        )
    ) {

        $errors[] =
            'Please enter a valid number of years of experience.';
    }


    if (
        $professionalCertification === ''
    ) {

        $errors[] =
            'Professional certification is required.';
    }


    if ($languages === '') {

        $errors[] =
            'Languages are required.';
    }


    if ($serviceAreas === '') {

        $errors[] =
            'Service areas are required.';
    }


    if ($dailyRate !== '') {

        if (
            !is_numeric($dailyRate) ||
            (float)$dailyRate < 0
        ) {

            $errors[] =
                'Please enter a valid daily rate.';
        }
    }


    if ($biography === '') {

        $errors[] =
            'Biography is required.';
    }


    /*
    |--------------------------------------------------------------------------
    | Profile Photo
    |--------------------------------------------------------------------------
    */

    $profilePhoto =
        $_SESSION[
            'caregiver_professional'
        ]['profile_photo'] ?? null;


    if (
        isset(
            $_FILES[
                'profile_photo'
            ]
        ) &&
        $_FILES[
            'profile_photo'
        ]['error']
        !== UPLOAD_ERR_NO_FILE
    ) {

        if (
            $_FILES[
                'profile_photo'
            ]['error']
            !== UPLOAD_ERR_OK
        ) {

            $errors[] =
                'Profile photo upload failed.';

        } else {

            $uploaded =
                $this->uploadCaregiverFile(
                    $_FILES[
                        'profile_photo'
                    ],
                    'caregivers',
                    [
                        'jpg',
                        'jpeg',
                        'png',
                        'webp'
                    ]
                );


            if (
                $uploaded === false
            ) {

                $errors[] =
                    'Profile photo must be JPG, JPEG, PNG or WEBP and maximum 5MB.';

            } else {

                $profilePhoto =
                    $uploaded;
            }
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Validation Failed
    |--------------------------------------------------------------------------
    */

    if (!empty($errors)) {

        $this->view(
            'register/professional',
            [
                'title' =>
                    'Professional Caregiver Registration',

                'css' =>
                    'caregiver-register.css.',

                'errors' =>
                    $errors,

                'old' =>
                    $_POST
            ],
            'register'
        );

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Save Professional Data
    |--------------------------------------------------------------------------
    */

    $_SESSION[
        'caregiver_professional'
    ] = [

        'highest_qualification' =>
            $highestQualification,

        'years_experience' =>
            (int)$yearsExperience,

        'professional_certification' =>
            $professionalCertification,

        'languages' =>
            $languages,

        'service_areas' =>
            $serviceAreas,

        'daily_rate' =>
            $dailyRate === ''
                ? null
                : (float)$dailyRate,

        'biography' =>
            $biography,

        'profile_photo' =>
            $profilePhoto
    ];


    /*
    |--------------------------------------------------------------------------
    | Go To Verification
    |--------------------------------------------------------------------------
    */

    header(
        'Location: /safehands_mvc/register/verification'
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| STEP 3 - VERIFICATION PAGE
|--------------------------------------------------------------------------
*/

public function verification(): void
{
    $this->startSession();


    if (
        empty(
            $_SESSION[
                'caregiver_personal'
            ]
        )
    ) {

        header(
            'Location: /safehands_mvc/register/caregiver'
        );

        exit;
    }


    if (
        empty(
            $_SESSION[
                'caregiver_professional'
            ]
        )
    ) {

        header(
            'Location: /safehands_mvc/register/professional'
        );

        exit;
    }


    $data = [

        'title' =>
            'Caregiver Verification',

        'css' =>
            'caregiver-register.css',

        'errors' =>
            []
    ];


    $this->view(
        'register/verification',
        $data,
        'register'
    );
}


/*
|--------------------------------------------------------------------------
| VERIFICATION - SINHALA
|--------------------------------------------------------------------------
*/

public function verificationSi(): void
{
    $this->startSession();


    if (
        empty(
            $_SESSION[
                'caregiver_personal'
            ]
        )
    ) {

        header(
            'Location: /safehands_mvc/register/caregiver-si'
        );

        exit;
    }


    if (
        empty(
            $_SESSION[
                'caregiver_professional'
            ]
        )
    ) {

        header(
            'Location: /safehands_mvc/register/professional-si'
        );

        exit;
    }


    $data = [

        'title' =>
            'Caregiver Verification',

        'css' =>
            'caregiver-register.css.',

        'errors' =>
            []
    ];


    $this->view(
        'register/verification-si',
        $data,
        'register'
    );
}


/*
|--------------------------------------------------------------------------
| STEP 3 - SUBMIT VERIFICATION
|--------------------------------------------------------------------------
*/

public function verificationSubmit(): void
{
    $this->startSession();


    if (
        $_SERVER['REQUEST_METHOD']
        !== 'POST'
    ) {

        header(
            'Location: /safehands_mvc/register/verification'
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | Check Previous Steps
    |--------------------------------------------------------------------------
    */

    if (
        empty(
            $_SESSION[
                'caregiver_personal'
            ]
        )
    ) {

        header(
            'Location: /safehands_mvc/register/caregiver'
        );

        exit;
    }


    if (
        empty(
            $_SESSION[
                'caregiver_professional'
            ]
        )
    ) {

        header(
            'Location: /safehands_mvc/register/professional'
        );

        exit;
    }


    $errors = [];


    /*
    |--------------------------------------------------------------------------
    | Confirmation
    |--------------------------------------------------------------------------
    */

    if (
        !isset(
            $_POST[
                'document_confirmation'
            ]
        )
    ) {

        $errors[] =
            'You must confirm that the submitted documents are genuine.';
    }


    /*
    |--------------------------------------------------------------------------
    | Required Documents
    |--------------------------------------------------------------------------
    */

    $requiredDocuments = [

        'nic_front' =>
            'NIC front',

        'nic_back' =>
            'NIC back',

        'qualification_certificate' =>
            'Qualification certificate',

        'police_clearance' =>
            'Police clearance'
    ];


    $documents = [];

    $uploadedFiles = [];


    /*
    |--------------------------------------------------------------------------
    | Profile Photo
    |--------------------------------------------------------------------------
    */

    $profilePhoto =
        $_SESSION[
            'caregiver_professional'
        ]['profile_photo'] ?? null;


    /*
     * If the verification page contains
     * another profile_photo field,
     * use it.
     */

    if (
        isset(
            $_FILES[
                'profile_photo'
            ]
        ) &&
        $_FILES[
            'profile_photo'
        ]['error']
        !== UPLOAD_ERR_NO_FILE
    ) {

        if (
            $_FILES[
                'profile_photo'
            ]['error']
            !== UPLOAD_ERR_OK
        ) {

            $errors[] =
                'Profile photo upload failed.';

        } else {

            $uploaded =
                $this->uploadCaregiverFile(
                    $_FILES[
                        'profile_photo'
                    ],
                    'caregivers',
                    [
                        'jpg',
                        'jpeg',
                        'png',
                        'webp'
                    ]
                );


            if (
                $uploaded === false
            ) {

                $errors[] =
                    'Profile photo must be JPG, JPEG, PNG or WEBP and maximum 5MB.';

            } else {

                $profilePhoto =
                    $uploaded;

                $uploadedFiles[] =
                    $uploaded;
            }
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Profile Photo Required
    |--------------------------------------------------------------------------
    */

    if (
        empty($profilePhoto)
    ) {

        $errors[] =
            'Profile photo is required.';
    }


    /*
    |--------------------------------------------------------------------------
    | Upload Required Documents
    |--------------------------------------------------------------------------
    */

    foreach (
        $requiredDocuments
        as $field => $label
    ) {

        if (
            !isset(
                $_FILES[$field]
            ) ||
            $_FILES[
                $field
            ]['error']
            === UPLOAD_ERR_NO_FILE
        ) {

            $errors[] =
                $label . ' is required.';

            continue;
        }


        if (
            $_FILES[
                $field
            ]['error']
            !== UPLOAD_ERR_OK
        ) {

            $errors[] =
                $label .
                ' upload failed.';

            continue;
        }


        $uploaded =
            $this->uploadCaregiverFile(
                $_FILES[
                    $field
                ],
                'caregiver-documents',
                [
                    'pdf',
                    'jpg',
                    'jpeg',
                    'png',
                    'webp'
                ]
            );


        if (
            $uploaded === false
        ) {

            $errors[] =
                $label .
                ' must be PDF, JPG, JPEG, PNG or WEBP and maximum 5MB.';

            continue;
        }


        $documents[$field] =
            $uploaded;

        $uploadedFiles[] =
            $uploaded;
    }


    /*
    |--------------------------------------------------------------------------
    | Optional Documents
    |--------------------------------------------------------------------------
    */

    $optionalDocuments = [

        'first_aid_certificate' =>
            'First_Aid',

        'experience_letter' =>
            'Experience_Letter',

        'medical_fitness_certificate' =>
            'Medical_Fitness'
    ];


    foreach (
        $optionalDocuments
        as $field => $type
    ) {

        if (
            !isset(
                $_FILES[$field]
            ) ||
            $_FILES[
                $field
            ]['error']
            === UPLOAD_ERR_NO_FILE
        ) {

            continue;
        }


        if (
            $_FILES[
                $field
            ]['error']
            !== UPLOAD_ERR_OK
        ) {

            $errors[] =
                $field .
                ' upload failed.';

            continue;
        }


        $uploaded =
            $this->uploadCaregiverFile(
                $_FILES[
                    $field
                ],
                'caregiver-documents',
                [
                    'pdf',
                    'jpg',
                    'jpeg',
                    'png',
                    'webp'
                ]
            );


        if (
            $uploaded === false
        ) {

            $errors[] =
                $field .
                ' must be PDF, JPG, JPEG, PNG or WEBP and maximum 5MB.';

            continue;
        }


        $documents[$field] =
            $uploaded;

        $uploadedFiles[] =
            $uploaded;
    }


    /*
    |--------------------------------------------------------------------------
    | Upload Validation Failed
    |--------------------------------------------------------------------------
    */

    if (!empty($errors)) {

        foreach (
            $uploadedFiles
            as $file
        ) {

            $this->deleteCaregiverFile(
                $file
            );
        }


        $this->view(
            'register/verification',
            [
                'title' =>
                    'Caregiver Verification',

                'css' =>
                    'caregiver-register.css',

                'errors' =>
                    $errors
            ],
            'register'
        );

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE DATABASE RECORDS
    |--------------------------------------------------------------------------
    */

    try {

        $caregiverModel =
            $this->model(
                'CaregiverModel'
            );


        $registration =
            $caregiverModel
                ->createFullCaregiverRegistration(
                    $_SESSION[
                        'caregiver_personal'
                    ],
                    $_SESSION[
                        'caregiver_professional'
                    ],
                    $profilePhoto,
                    $documents
                );


        /*
        |--------------------------------------------------------------------------
        | Save Safe Registration Information
        |--------------------------------------------------------------------------
        */

        $_SESSION[
            'caregiver_registration'
        ] = [

            'user_id' =>
                $registration[
                    'user_id'
                ],

            'caregiver_id' =>
                $registration[
                    'caregiver_id'
                ],

            'full_name' =>
                $_SESSION[
                    'caregiver_personal'
                ]['full_name'],

            'email' =>
                $_SESSION[
                    'caregiver_personal'
                ]['email'],

            'status' =>
                'pending'
        ];


        /*
        |--------------------------------------------------------------------------
        | Remove Temporary Session Data
        |--------------------------------------------------------------------------
        */

        unset(
            $_SESSION[
                'caregiver_personal'
            ]
        );

        unset(
            $_SESSION[
                'caregiver_professional'
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Success
        |--------------------------------------------------------------------------
        */

        header(
            'Location: /safehands_mvc/register/success'
        );

        exit;


    } catch (Exception $e) {

        /*
         * Remove uploaded files if
         * database creation fails.
         */

        foreach (
            $uploadedFiles
            as $file
        ) {

            $this->deleteCaregiverFile(
                $file
            );
        }


        $this->view(
            'register/verification',
            [
                'title' =>
                    'Caregiver Verification',

                'css' =>
                    'caregiver-register.css',

                'errors' => [
                    'Registration could not be completed: ' .
                    $e->getMessage()
                ]
            ],
            'register'
        );
    }
}


/*
|--------------------------------------------------------------------------
| OLD SUBMIT ROUTE
|--------------------------------------------------------------------------
|
| If your existing verification form uses:
|
| /register/submit
|
| it will still work.
|
*/

public function submit(): void
{
    $this->verificationSubmit();
}


/*
|--------------------------------------------------------------------------
| CAREGIVER SUCCESS
|--------------------------------------------------------------------------
*/

public function success(): void
{
    $this->startSession();


    if (
        empty(
            $_SESSION[
                'caregiver_registration'
            ]
        )
    ) {

        header(
            'Location: /safehands_mvc/register'
        );

        exit;
    }


    $data = [

        'title' =>
            'Registration Successful',

        'css' =>
            'caregiver-register.css',

        'registration' =>
            $_SESSION[
                'caregiver_registration'
            ]
    ];


    $this->view(
        'register/success',
        $data,
        'register'
    );
}


/*
|--------------------------------------------------------------------------
| CAREGIVER SUCCESS - SINHALA
|--------------------------------------------------------------------------
*/

public function successSi(): void
{
    $this->startSession();


    if (
        empty(
            $_SESSION[
                'caregiver_registration'
            ]
        )
    ) {

        header(
            'Location: /safehands_mvc/register'
        );

        exit;
    }


    $data = [

        'title' =>
            'Registration Successful',

        'css' =>
            'caregiver-register.css',

        'registration' =>
            $_SESSION[
                'caregiver_registration'
            ]
    ];


    $this->view(
        'register/success-si',
        $data,
        'register'
    );
}


/*
|--------------------------------------------------------------------------
| FILE UPLOAD HELPER
|--------------------------------------------------------------------------
*/

private function uploadCaregiverFile(
    array $file,
    string $folder,
    array $allowedExtensions
): string|false {

    if (
        !isset(
            $file['tmp_name'],
            $file['name'],
            $file['size']
        )
    ) {
        return false;
    }


    /*
     * Maximum 5 MB
     */

    if (
        $file['size']
        > 5 * 1024 * 1024
    ) {

        return false;
    }


    $extension =
        strtolower(
            pathinfo(
                basename(
                    $file['name']
                ),
                PATHINFO_EXTENSION
            )
        );


    if (
        !in_array(
            $extension,
            $allowedExtensions,
            true
        )
    ) {

        return false;
    }


    /*
    |--------------------------------------------------------------------------
    | Upload Directory
    |--------------------------------------------------------------------------
    */

    $uploadDirectory =
        __DIR__ .
        '/../../public/uploads/' .
        $folder .
        '/';


    if (
        !is_dir(
            $uploadDirectory
        )
    ) {

        if (
            !mkdir(
                $uploadDirectory,
                0775,
                true
            )
        ) {

            return false;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Safe File Name
    |--------------------------------------------------------------------------
    */

    try {

        $fileName =
            date('YmdHis') .
            '_' .
            bin2hex(
                random_bytes(8)
            ) .
            '.' .
            $extension;

    } catch (Exception $e) {

        $fileName =
            date('YmdHis') .
            '_' .
            uniqid() .
            '.' .
            $extension;
    }


    $destination =
        $uploadDirectory .
        $fileName;


    if (
        !move_uploaded_file(
            $file['tmp_name'],
            $destination
        )
    ) {

        return false;
    }


    /*
     * Path saved in database.
     */

    return
        'uploads/' .
        $folder .
        '/' .
        $fileName;
}


/*
|--------------------------------------------------------------------------
| DELETE UPLOADED FILE
|--------------------------------------------------------------------------
*/

private function deleteCaregiverFile(
    string $relativePath
): void {

    $absolutePath =
        __DIR__ .
        '/../../public/' .
        ltrim(
            $relativePath,
            '/'
        );


    if (
        is_file(
            $absolutePath
        )
    ) {

        @unlink(
            $absolutePath
        );
    }
}}