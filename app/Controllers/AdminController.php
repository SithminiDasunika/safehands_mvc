<?php

class AdminController extends Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if admin is logged in
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header('Location: /safehands_mvc/login');
            exit;
        }
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Admin Dashboard',
            'user_name' => $_SESSION['user_name'] ?? 'Admin',
            'css' => 'admin.css',
        ];

        $this->view('admin/dashboard', $data, 'admin'); // Assuming 'admin' layout or default layout
    }
}
