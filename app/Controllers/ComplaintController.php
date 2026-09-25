<?php

class ComplaintController extends Controller
{
    public function index(): void
    {
        $complaintModel = $this->model('Complaint');

        $data = [
            'title' => 'Submit Complaint - SafeHands',
            'booking' => $complaintModel->getBooking(),
            'caregiver' => $complaintModel->getCaregiver()
        ];

        $this->view(
            'complaint/index',
            $data,
            'complaint'
        );
    }
}