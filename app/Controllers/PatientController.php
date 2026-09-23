<?php

class PatientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Add New Patient
    |--------------------------------------------------------------------------
    */

    public function create(): void
    {
        $data = [
            'title' => 'Add New Patient | SafeHands'
        ];

        $this->view(
            'patient/create',
            $data,
            'family'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Patient Profile
    |--------------------------------------------------------------------------
    */

    public function profile(): void
    {
        $data = [
            'title' => 'Patient Profile | SafeHands'
        ];

        $this->view(
            'patient/profile',
            $data,
            'family'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Patient Profile
    |--------------------------------------------------------------------------
    */

    public function edit(): void
    {
        $data = [
            'title' => 'Edit Patient Profile | SafeHands'
        ];

        $this->view(
            'patient/edit',
            $data,
            'edit-patient'
        );
    }
}