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

        /*
        |--------------------------------------------------------------------------
        | Load Layout
        |--------------------------------------------------------------------------
        */

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
}