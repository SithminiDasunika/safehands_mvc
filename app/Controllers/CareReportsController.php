<?php

class CareReportsController extends Controller
{
    public function index(): void
    {
        $careReportsModel = $this->model('CareReports');

        $data = [
            'title' => 'Daily Care Reports | SafeHands',
            'summary' => $careReportsModel->getSummary(),
            'reports' => $careReportsModel->getReports()
        ];

        $this->view(
            'care-reports/index',
            $data,
            'care-reports'
        );
    }
}