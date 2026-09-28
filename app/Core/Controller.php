<?php

class Controller
{
    /*
    |--------------------------------------------------------------------------
    | Load Model
    |--------------------------------------------------------------------------
    */

    protected function model(string $model)
    {
        $modelFile =
            __DIR__ .
            '/../Models/' .
            $model .
            '.php';

        if (file_exists($modelFile)) {

            require_once $modelFile;

            return new $model;
        }

        die("Model {$model} not found.");
    }

    /*
    |--------------------------------------------------------------------------
    | Load View
    |--------------------------------------------------------------------------
    */

    protected function view(
        string $view,
        array $data = [],
        string $layout = 'main'
    ): void {

        // Upload paths are stored relative to public/ in the database. Make
        // them root-relative here so they work from every nested route/view.
        $data = $this->normalizeUploadedPhotoPaths($data);

        extract($data);

        /*
        |--------------------------------------------------------------------------
        | View Path
        |--------------------------------------------------------------------------
        */

        $viewFile =
            __DIR__ .
            '/../Views/' .
            $view .
            '.php';

        if (!file_exists($viewFile)) {

            die("View {$view} not found.");
        }

        /*
        |--------------------------------------------------------------------------
        | Capture View
        |--------------------------------------------------------------------------
        */

        ob_start();

        require $viewFile;

        $content = ob_get_clean();

        // Apply the same phone and date-of-birth checks to every rendered form.
        $validationScript = '<script src="/safehands_mvc/public/assets/js/form-validation.js" defer></script>';
        $bodyClose = strripos($content, '</body>');
        if ($bodyClose !== false) {
            $content = substr($content, 0, $bodyClose) . $validationScript . substr($content, $bodyClose);
        } else {
            $content .= $validationScript;
        }

        /*
        |--------------------------------------------------------------------------
        | Load Layout
        |--------------------------------------------------------------------------
        */

        if (empty($layout)) {
            echo $content;
            return;
        }

        $layoutFile =
            __DIR__ .
            '/../Views/layouts/' .
            $layout .
            '.php';

        if (!file_exists($layoutFile)) {

            die("Layout {$layout} not found.");
        }

        require $layoutFile;
    }

    /**
     * Normalize uploaded image paths anywhere in view data. Older rows may
     * contain either `uploads/...` or a filesystem path ending in
     * `/public/uploads/...`; new patient uploads may already be web paths.
     */
    private function normalizeUploadedPhotoPaths(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->normalizeUploadedPhotoPaths($value);
                continue;
            }

            if (!is_string($value) || $value === '') {
                continue;
            }

            $path = str_replace('\\', '/', trim($value));
            if (preg_match('~^https?://~i', $path)) {
                continue;
            }

            $uploadsPosition = strpos($path, 'uploads/');
            if ($uploadsPosition !== false) {
                $relativePath = substr($path, $uploadsPosition);
                $basePath = defined('URLROOT') ? rtrim(URLROOT, '/') : '/safehands_mvc';
                $data[$key] = $basePath . '/public/' . $relativePath;
            }
        }

        return $data;
    }

    protected function isValidTenDigitPhone(string $phone, bool $allowEmpty = false): bool
    {
        return ($allowEmpty && $phone === '') || preg_match('/^[0-9]{10}$/', $phone) === 1;
    }

    protected function isValidPastDateOfBirth(string $date): bool
    {
        $parsed = DateTime::createFromFormat('!Y-m-d', $date);
        $errors = DateTime::getLastErrors();

        return $parsed !== false
            && $parsed->format('Y-m-d') === $date
            && ($errors === false || ($errors['warning_count'] === 0 && $errors['error_count'] === 0))
            && $parsed <= new DateTime('today');
    }
}
