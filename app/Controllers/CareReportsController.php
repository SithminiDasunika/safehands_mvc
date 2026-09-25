<?php

class CareReportsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display all care reports
    |--------------------------------------------------------------------------
    */
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


    /*
    |--------------------------------------------------------------------------
    | Show create care report form
    |--------------------------------------------------------------------------
    */
    public function create(): void
    {
        $data = [
            'title' => 'Create Care Report | SafeHands'
        ];

        $this->view(
            'care-reports/create',
            $data,
            'care-reports'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store new care report
    |--------------------------------------------------------------------------
    */
    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /safehands_mvc/care-reports');
            exit;
        }

        $careReportsModel = $this->model('CareReports');

        $data = [
            'caregiver_id' => (int)($_POST['caregiver_id'] ?? 0),

            'patient_name' => trim(
                $_POST['patient_name'] ?? ''
            ),

            'booking_id' => trim(
                $_POST['booking_id'] ?? ''
            ),

            'report_date' => $_POST['report_date'] ?? '',

            'shift' => trim(
                $_POST['shift'] ?? ''
            ),

            'condition_status' => trim(
                $_POST['condition_status'] ?? ''
            ),

            'activities' => trim(
                $_POST['activities'] ?? ''
            ),

            'medication' => trim(
                $_POST['medication'] ?? ''
            ),

            'meal' => trim(
                $_POST['meal'] ?? ''
            ),

            'vitals' => trim(
                $_POST['vitals'] ?? ''
            ),

            'notes' => trim(
                $_POST['notes'] ?? ''
            )
        ];


        $success = $careReportsModel->createReport($data);


        if ($success) {

            header(
                'Location: /safehands_mvc/care-reports'
            );

            exit;
        }


        echo "Failed to create care report.";
    }


    /*
    |--------------------------------------------------------------------------
    | View one care report
    |--------------------------------------------------------------------------
    */
    public function show(int $id): void
    {
        $careReportsModel = $this->model('CareReports');

        $report = $careReportsModel->getReportById($id);


        if (!$report) {
            die('Care report not found.');
        }


        $data = [
            'title' => 'View Care Report | SafeHands',
            'report' => $report
        ];


        $this->view(
            'care-reports/view',
            $data,
            'care-reports'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Show edit form
    |--------------------------------------------------------------------------
    */
    public function edit(int $id): void
    {
        $careReportsModel = $this->model('CareReports');

        $report = $careReportsModel->getReportById($id);


        if (!$report) {
            die('Care report not found.');
        }


        $data = [
            'title' => 'Edit Care Report | SafeHands',
            'report' => $report
        ];


        $this->view(
            'care-reports/edit',
            $data,
            'care-reports'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update care report
    |--------------------------------------------------------------------------
    */
    public function update(int $id): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            header(
                'Location: /safehands_mvc/care-reports'
            );

            exit;
        }


        $careReportsModel = $this->model('CareReports');


        $data = [
            'caregiver_id' => (int)($_POST['caregiver_id'] ?? 0),

            'patient_name' => trim(
                $_POST['patient_name'] ?? ''
            ),

            'booking_id' => trim(
                $_POST['booking_id'] ?? ''
            ),

            'report_date' => $_POST['report_date'] ?? '',

            'shift' => trim(
                $_POST['shift'] ?? ''
            ),

            'condition_status' => trim(
                $_POST['condition_status'] ?? ''
            ),

            'activities' => trim(
                $_POST['activities'] ?? ''
            ),

            'medication' => trim(
                $_POST['medication'] ?? ''
            ),

            'meal' => trim(
                $_POST['meal'] ?? ''
            ),

            'vitals' => trim(
                $_POST['vitals'] ?? ''
            ),

            'notes' => trim(
                $_POST['notes'] ?? ''
            )
        ];


        $success = $careReportsModel->updateReport(
            $id,
            $data
        );


        if ($success) {

            header(
                'Location: /safehands_mvc/care-reports/show/' . $id
            );

            exit;
        }


        echo "Failed to update care report.";
    }


    /*
    |--------------------------------------------------------------------------
    | Delete care report
    |--------------------------------------------------------------------------
    */
    public function delete(int $id): void
    {
        $careReportsModel = $this->model('CareReports');

        $careReportsModel->deleteReport($id);


        header(
            'Location: /safehands_mvc/care-reports'
        );

        exit;
    }
}