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
         * =========================================
         * CONTROLLER
         * =========================================
         */

        if (!empty($url[0])) {

            /*
             * Convert URL controller name
             *
             * forgot-password
             *        ↓
             * ForgotPasswordController
             *
             * register
             *        ↓
             * RegisterController
             */

            $controllerPart = $url[0];

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


            /*
             * Controller exists
             */

            if (file_exists($controllerFile)) {

                $this->controllerName =
                    $controllerName;

                require_once $controllerFile;

            } else {

                /*
                 * Controller doesn't exist
                 * Use HomeController
                 */

                $this->controllerName =
                    'HomeController';

                require_once
                    __DIR__ .
                    '/../Controllers/HomeController.php';
            }


        } else {

            /*
             * No URL
             * Load HomeController
             */

            require_once
                __DIR__ .
                '/../Controllers/HomeController.php';
        }


        /*
         * =========================================
         * CREATE CONTROLLER
         * =========================================
         */

        $this->controller =
            new $this->controllerName;


        /*
         * =========================================
         * METHOD
         * =========================================
         */

        if (isset($url[1])) {

            if (
                method_exists(
                    $this->controller,
                    $url[1]
                )
            ) {

                $this->method =
                    $url[1];
            }
        }


        /*
         * =========================================
         * PARAMETERS
         * =========================================
         */

        $this->params =
            array_slice($url, 2);


        /*
         * =========================================
         * CALL CONTROLLER METHOD
         * =========================================
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
     * =========================================
     * PARSE URL
     * =========================================
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