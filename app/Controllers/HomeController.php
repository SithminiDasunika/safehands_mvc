<?php

class HomeController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index(): void
    {
        $data = [
            'title' => 'SafeHands | Trusted Care for Your Loved Ones'
        ];

        $this->view(
            'home/index',
            $data
        );
    }
}