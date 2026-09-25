<?php

class PatientsController extends Controller
{
    public function index(): void
    {
        $patientsModel = $this->model('Patients');

        $data = [
            'title' => 'My Patients | SafeHands',

            'stats' => $patientsModel->getStats(),

            'patients' => $patientsModel->getPatients(),

            'reports' => $patientsModel->getRecentReports()
        ];

        $this->view(
            'patient/index',
            $data,
            'patients'
        );
    }
}