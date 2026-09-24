<?php

class App
{
    protected string $controllerName = 'HomeController';

    protected object $controller;

    protected string $method = 'index';

    protected array $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        /*
        |--------------------------------------------------------------------------
        | CONTROLLER
        |--------------------------------------------------------------------------
        */

        if (!empty($url[0])) {

            $controllerPart = $url[0];

            /*
             * Convert URL controller names:
             *
             * caregiver
             *      ↓
             * CaregiverController
             *
             * care-reports
             *      ↓
             * CareReportsController
             *
             * payment-history
             *      ↓
             * PaymentHistoryController
             */

            $controllerName =
                str_replace(
                    ' ',
                    '',
                    ucwords(
                        str_replace(
                            '-',
                            ' ',
                            $controllerPart
                        )
                    )
                ) . 'Controller';

            $controllerFile =
                __DIR__ .
                '/../Controllers/' .
                $controllerName .
                '.php';

            if (file_exists($controllerFile)) {

                $this->controllerName = $controllerName;

                require_once $controllerFile;

            } else {

                /*
                 * Controller does not exist.
                 * Use HomeController.
                 */

                $this->controllerName = 'HomeController';

                require_once
                    __DIR__ .
                    '/../Controllers/HomeController.php';
            }

        } else {

            /*
             * No controller specified.
             * Use HomeController.
             */

            require_once
                __DIR__ .
                '/../Controllers/HomeController.php';
        }


        /*
        |--------------------------------------------------------------------------
        | CREATE CONTROLLER
        |--------------------------------------------------------------------------
        */

        $this->controller =
            new $this->controllerName;


        /*
        |--------------------------------------------------------------------------
        | METHOD
        |--------------------------------------------------------------------------
        */

        if (isset($url[1])) {

            $methodPart = $url[1];

            /*
             * Convert URL method names:
             *
             * family-payment
             *      ↓
             * familyPayment
             *
             * process-payment
             *      ↓
             * processPayment
             *
             * payment-success
             *      ↓
             * paymentSuccess
             */

            $method =
                lcfirst(
                    str_replace(
                        ' ',
                        '',
                        ucwords(
                            str_replace(
                                '-',
                                ' ',
                                $methodPart
                            )
                        )
                    )
                );

            if (
                method_exists(
                    $this->controller,
                    $method
                )
            ) {

                $this->method = $method;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | PARAMETERS
        |--------------------------------------------------------------------------
        */

        $this->params =
            array_slice(
                $url,
                2
            );


        /*
        |--------------------------------------------------------------------------
        | CALL CONTROLLER METHOD
        |--------------------------------------------------------------------------
        */

        call_user_func_array(
            [
                $this->controller,
                $this->method
            ],
            $this->params
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PARSE URL
    |--------------------------------------------------------------------------
    */

    private function parseUrl(): array
    {
        if (isset($_GET['url'])) {

            $url =
                trim(
                    $_GET['url'],
                    '/'
                );

            if ($url === '') {

                return [];
            }

            return explode(
                '/',
                filter_var(
                    $url,
                    FILTER_SANITIZE_URL
                )
            );
        }

        return [];
    }
}