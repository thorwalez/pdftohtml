<?php
if (\file_exists(dirname(__DIR__).'/vendor/autoload.php') == false){
    echo '<html>
            <head>
                <title>App Error</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            </head>
            <body>
                <div class="alert alert-danger" role="alert">
                    <h1>Application Error</h1>
                    <p>
                        Application is not configure!<br />
                        Please execute the following lines on the console.<br /><br />
                        <code>
                            composer install
                        </code>
                    </p>
                </div>
            </body>
        </html>';
    return 0;
}
use ThorWalez\WaybillCreator\Kernel;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__).'/vendor/autoload.php';

(new Dotenv())->bootEnv(dirname(__DIR__).'/.env');

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
