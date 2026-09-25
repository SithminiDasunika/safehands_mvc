<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ForgotPasswordController extends Controller
{
    private $forgotPasswordModel;
    private $loginModel;

    public function __construct()
    {
        $this->forgotPasswordModel = $this->model('ForgotPasswordModel');
        $this->loginModel = $this->model('LoginModel');
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index(): void
    {
        $data = [
            'title' => 'Reset Your Password | SafeHands',
            'css'   => 'forgot-password.css',
            'js'    => 'forgot-password.js'
        ];

        $this->view(
            'forgot-password/index',
            $data,
            'forgot-password'
        );
    }

    public function sendOtpAjax()
    {
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
            return;
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $email = isset($input['email']) ? filter_var($input['email'], FILTER_SANITIZE_EMAIL) : '';
        
        if (!$email) {
            echo json_encode(['success' => false, 'message' => 'Email is required.']);
            return;
        }

        // Check if email exists in users table
        $user = $this->loginModel->findUserByEmail($email);
        
        if ($user) {
            $otp = rand(100000, 999999);
            $expires_at = date('Y-m-d H:i:s', strtotime('+15 minutes'));
            
            if (!$this->forgotPasswordModel->storeOtp($email, $otp, $expires_at)) {
                echo json_encode(['success' => false, 'message' => 'Database error: Could not store OTP. Did you run db_setup.php?']);
                return;
            }
            
            // NOTE: Replace this path if PHPMailer is installed differently
            $phpmailerPath = __DIR__ . '/../../public/PHPMailer/src/';
            if (file_exists($phpmailerPath . 'PHPMailer.php')) {
                require_once $phpmailerPath . 'Exception.php';
                require_once $phpmailerPath . 'PHPMailer.php';
                require_once $phpmailerPath . 'SMTP.php';

                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com'; 
                    $mail->SMTPAuth   = true;
                    // TODO: Replace with your actual email and app password
                    $mail->Username   = 'safehandprojecte02@gmail.com'; 
                    $mail->Password   = 'jori auzj ajdp otlp';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;

                    $mail->setFrom('your_email@gmail.com', 'SafeHands Admin');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Your Password Reset OTP';
                    $mail->Body    = "Your OTP for password reset is: <b>$otp</b>. It is valid for 15 minutes.";

                    $mail->send();
                    echo json_encode(['success' => true, 'message' => 'OTP sent to your email.']);
                } catch (Exception $e) {
                    // Fallback if mailer fails
                    echo json_encode(['success' => false, 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
                }
            } else {
                // For development without PHPMailer installed, just return success and log it
                error_log("OTP for $email is $otp");
                echo json_encode(['success' => true, 'message' => 'OTP generated (check server logs/mail).']);
            }
        } else {
            // Do not reveal if email exists or not for security, but for UX let's say:
            echo json_encode(['success' => false, 'message' => 'Email address not found.']);
        }
    }

    public function verifyOtpAjax()
    {
        header('Content-Type: application/json');
        
        $input = json_decode(file_get_contents('php://input'), true);
        $email = $input['email'] ?? '';
        $otp = $input['otp'] ?? '';

        if ($this->forgotPasswordModel->verifyOtp($email, $otp)) {
            echo json_encode(['success' => true, 'message' => 'OTP verified.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid or expired OTP.']);
        }
    }

    public function resetPasswordAjax()
    {
        header('Content-Type: application/json');
        
        $input = json_decode(file_get_contents('php://input'), true);
        $email = $input['email'] ?? '';
        $otp = $input['otp'] ?? '';
        $new_password = $input['newPassword'] ?? '';
        $confirm_password = $input['confirmPassword'] ?? '';

        if ($new_password !== $confirm_password) {
            echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
            return;
        }

        if (strlen($new_password) < 8) {
            echo json_encode(['success' => false, 'message' => 'Password must be at least 8 characters.']);
            return;
        }

        if ($this->forgotPasswordModel->verifyOtp($email, $otp)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            if ($this->forgotPasswordModel->updatePassword($email, $hashed_password)) {
                $this->forgotPasswordModel->clearOtp($email);
                echo json_encode(['success' => true, 'message' => 'Password updated successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update password.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid or expired OTP.']);
        }
    }
}