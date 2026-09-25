<?php

class ForgotPasswordController extends Controller
{
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
}