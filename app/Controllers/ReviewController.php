<?php

class ReviewController extends Controller
{
    public function index(): void
    {
        $reviewModel = $this->model('Review');

        $data = [
            'title' => 'Rate Your Caregiver | SafeHands',
            'caregiver' => $reviewModel->getCaregiver(),
            'booking' => $reviewModel->getBooking()
        ];

        $this->view(
            'review/index',
            $data,
            'review'
        );
    }
}