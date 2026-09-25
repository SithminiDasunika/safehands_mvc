<?php

class LoginController extends Controller
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
    | Login
    |--------------------------------------------------------------------------
    */

    public function index(): void
    {
        $this->startSession();

        $errors = [];

        /*
        |--------------------------------------------------------------------------
        | LOGIN FORM SUBMITTED
        |--------------------------------------------------------------------------
        */

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            /*
            |--------------------------------------------------------------------------
            | Get Login Details
            |--------------------------------------------------------------------------
            */

            $email = trim(
                $_POST['email'] ?? ''
            );

            $password =
                $_POST['password'] ?? '';


            /*
            |--------------------------------------------------------------------------
            | Validate Input
            |--------------------------------------------------------------------------
            */

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


            if ($password === '') {

                $errors[] =
                    'Password is required.';
            }


            /*
            |--------------------------------------------------------------------------
            | If Validation Failed
            |--------------------------------------------------------------------------
            */

            if (!empty($errors)) {

                $this->showLogin(
                    $errors,
                    $email
                );

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | Find User
            |--------------------------------------------------------------------------
            */

            try {

                /*
                |--------------------------------------------------------------------------
                | Hardcoded Admin Login
                |--------------------------------------------------------------------------
                */
                if ($email === 'admin@safehands.com' && $password === 'admin123') {
                    $user = [
                        'id' => 0,
                        'full_name' => 'System Administrator',
                        'email' => 'admin@safehands.com',
                        'role' => 'admin',
                        'status' => 'active',
                        'password' => password_hash('admin123', PASSWORD_DEFAULT) // Just for the verify below
                    ];
                } else {
                    $loginModel =
                        $this->model('LoginModel');

                    $user =
                        $loginModel->findUserByEmail(
                            $email
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | Account Does Not Exist
                    |--------------------------------------------------------------------------
                    */

                    if (!$user) {

                        $errors[] =
                            'No account found with this email address. Please register first.';

                        $this->showLogin(
                            $errors,
                            $email
                        );

                        return;
                    }
                }


                /*
                |--------------------------------------------------------------------------
                | Verify Password
                |--------------------------------------------------------------------------
                */

                if (
                    !password_verify(
                        $password,
                        $user['password']
                    )
                ) {

                    $errors[] =
                        'Incorrect password.';

                    $this->showLogin(
                        $errors,
                        $email
                    );

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | Check Account Status
                |--------------------------------------------------------------------------
                */

                if ($user['status'] === 'pending') {

                    if ($user['role'] === 'caregiver') {
                        $errors[] =
                            'Your account is pending admin approval. You cannot access the dashboard yet.';
                    } else {
                        $errors[] =
                            'Your account is still pending. Please complete the registration process.';
                    }

                    $this->showLogin(
                        $errors,
                        $email
                    );

                    return;
                }


                if ($user['status'] === 'suspended') {

                    $errors[] =
                        'Your account has been suspended. Please contact SafeHands support.';

                    $this->showLogin(
                        $errors,
                        $email
                    );

                    return;
                }


                if ($user['status'] === 'inactive') {

                    $errors[] =
                        'Your account is inactive. Please contact SafeHands support.';

                    $this->showLogin(
                        $errors,
                        $email
                    );

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | Only Active Accounts Can Login
                |--------------------------------------------------------------------------
                */

                if ($user['status'] !== 'active') {

                    $errors[] =
                        'Your account is not active.';

                    $this->showLogin(
                        $errors,
                        $email
                    );

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | Regenerate Session ID
                |--------------------------------------------------------------------------
                */

                session_regenerate_id(true);


                /*
                |--------------------------------------------------------------------------
                | Create Common Login Session
                |--------------------------------------------------------------------------
                */

                $_SESSION['logged_in'] = true;

                $_SESSION['user_id'] =
                    $user['id'];

                $_SESSION['user_name'] =
                    $user['full_name'];

                $_SESSION['user_email'] =
                    $user['email'];

                $_SESSION['user_role'] =
                    $user['role'];


                /*
                |--------------------------------------------------------------------------
                | Redirect According to Role
                |--------------------------------------------------------------------------
                */

                switch ($user['role']) {

                    /*
                    |--------------------------------------------------------------------------
                    | FAMILY MEMBER
                    |--------------------------------------------------------------------------
                    */

                    case 'family':

                        $_SESSION['family_logged_in'] = true;
                    
                        // Store the logged-in user's ID
                        $_SESSION['user_id'] = (int) $user['id'];
                    
                        // Store basic user information
                        $_SESSION['user_name'] = $user['full_name'];
                        $_SESSION['user_email'] = $user['email'];
                        $_SESSION['user_role'] = $user['role'];
                    
                        header(
                            'Location: /safehands_mvc/family/dashboard'
                        );
                    
                        exit;

                    /*
                    |--------------------------------------------------------------------------
                    | CAREGIVER
                    |--------------------------------------------------------------------------
                    */

                    case 'caregiver':

                        $_SESSION['caregiver_logged_in'] = true;

                        header(
                            'Location: /safehands_mvc/caregiver/dashboard'
                        );

                        exit;


                    /*
                    |--------------------------------------------------------------------------
                    | ADMIN
                    |--------------------------------------------------------------------------
                    */

                    case 'admin':

                        $_SESSION['admin_logged_in'] = true;

                        header(
                            'Location: /safehands_mvc/admin/dashboard'
                        );

                        exit;


                    /*
                    |--------------------------------------------------------------------------
                    | Unknown Role
                    |--------------------------------------------------------------------------
                    */

                    default:

                        $errors[] =
                            'Invalid account role. Please contact SafeHands support.';

                        $this->showLogin(
                            $errors,
                            $email
                        );

                        return;
                }

            } catch (Exception $e) {

                /*
                |--------------------------------------------------------------------------
                | Database Error
                |--------------------------------------------------------------------------
                */

                $errors[] =
                    'Unable to login right now. Please try again.';

                $this->showLogin(
                    $errors,
                    $email
                );

                return;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Display Login Page
        |--------------------------------------------------------------------------
        */

        $data = [
            'title' => 'SafeHands - Login',
            'css'   => 'login.css',
            'js'    => 'login.js',
            'errors' => [],
            'old' => []
        ];

        $this->view(
            'login/index',
            $data,
            'login'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Show Login With Errors
    |--------------------------------------------------------------------------
    */

    private function showLogin(
        array $errors,
        string $email = ''
    ): void {

        $data = [
            'title' => 'SafeHands - Login',
            'css'   => 'login.css',
            'js'    => 'login.js',

            'errors' => $errors,

            'old' => [
                'email' => $email
            ]
        ];

        $this->view(
            'login/index',
            $data,
            'login'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    public function logout(): void
    {
        $this->startSession();

        $_SESSION = [];


        /*
        |--------------------------------------------------------------------------
        | Delete Session Cookie
        |--------------------------------------------------------------------------
        */

        if (ini_get('session.use_cookies')) {

            $params =
                session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Destroy Session
        |--------------------------------------------------------------------------
        */

        session_destroy();


        /*
        |--------------------------------------------------------------------------
        | Redirect to Login
        |--------------------------------------------------------------------------
        */

        header(
            'Location: /safehands_mvc/login'
        );

        exit;
    }
}