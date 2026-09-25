<?php

class CareReportController extends Controller
{
    public function index(): void
    {
        $careReportModel = $this->model('CareReport');

        $data = [
            'title' => 'Daily Care Report | SafeHands',
            'report' => $careReportModel->getReport()
        ];

        $this->view(
            'care-report/index',
            $data,
            'care-report'
        );
    }
}