<?php

class FamilyController extends Controller
{
    public function index(): void
    {
        $familyModel = $this->model('Family');

        $data = [
            'title' => 'Family Dashboard | SafeHands',
            'family' => $familyModel->getDashboardData()
        ];

        $this->view(
            'family/dashboard',
            $data,
            'family'
        );
    }
}