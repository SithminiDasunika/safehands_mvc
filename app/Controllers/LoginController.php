<?php

class LoginController extends Controller
{
    public function index(): void
    {
        $data = [
            'title' => 'SafeHands - Login',
            'css'   => 'login.css',
            'js'    => 'login.js'
        ];

        $this->view('login/index', $data, 'login');
    }
}