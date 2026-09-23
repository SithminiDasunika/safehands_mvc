<?php

class RegisterController extends Controller
{
    // Role selection page
    public function index(): void
    {
        $data = [
            'title' => 'Join SafeHands',
            'css'   => 'register.css'
        ];

        $this->view('register/index', $data, 'register');
    }

    // Family registration page
    public function family(): void
    {
        $data = [
            'title' => 'Family Member Registration',
            'css'   => 'register-family.css'
        ];

        $this->view('register/family', $data, 'register');
    }

    // Caregiver registration page
    public function caregiver(): void
    {
        $data = [
            'title' => 'Caregiver Registration',
            'css'   => 'register-caregiver.css'
        ];

        $this->view('register/caregiver', $data, 'register');
    }
}