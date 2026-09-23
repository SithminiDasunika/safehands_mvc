<?php

class HomeController extends Controller
{
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