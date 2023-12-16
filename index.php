<?php
require_once __DIR__ . '/vendor/autoload.php';

require_once 'functions/login.php';
require_once 'functions/logout.php';

require_once 'routes/diagnoses.routes.php';
require_once 'routes/diseases.routes.php';
require_once 'routes/symptoms.routes.php';
require_once 'routes/users.routes.php';

use FastRoute\RouteCollector;
use FastRoute\Dispatcher;
use function FastRoute\simpleDispatcher;

$dispatcher = simpleDispatcher(function(RouteCollector $route) {
    $route->addRoute(['GET', 'POST', 'PUT', 'PATCH', 'OPTIONS'], '/', 'root');
    $route->post('/auth/login/', 'login');
    $route->post('/auth/logout/', 'logout');

    $route->addGroup('/data', function(RouteCollector $r) {
        $r->addGroup('/diagnoses', 'diagnosesRoutes');

        $r->addGroup('/diseases', 'diseasesRoutes');

        $r->addGroup('/symptoms', 'symptomsRoutes');

        $r->addGroup('/users', 'usersRoutes');
    });
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        Response::error("Endpoint API tidak ditemukan.", 404);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];

        Response::custom([
            'status' => 405,
            'message' => "Method {$httpMethod} tidak diperbolehkan untuk Endpoint ini.",
            'allowed_method' => $allowedMethods
        ], 405);
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $params = $routeInfo[2];

        try {
            call_user_func($handler, $params);
        }
        catch (TypeError $e) {
            Response::custom(
                [
                    'status' => 500,
                    'message' => "Koneksi ke Database GAGAL (Configuration Error).",
                    'debug' => "{$e}"
                ],
                500
            );
        }
        catch (mysqli_sql_exception $e) {
            Response::custom(
                [
                    'status' => 500,
                    'message' => "SQL Query Gagal atau Kolom/Params tidak terisi (SQL Error).",
                    'debug' => "{$e}"
                ],
                500
            );
        }
        break;
}

function root() {
    return Response::custom(
        [
            'status' => 200,
            'message' => "Cat Care API",
            'endpoints' => [
                '/auth' => [
                    '/auth/login/' => [
                        'POST' => "Proses Login untuk mendapatkan Token"
                    ],
                    '/auth/logout/' => [
                        'POST' => "Proses Logout untuk menghancurkan Session"
                    ],
                ],
                '/data' => [
                    '/diagnoses/' => [
                        'GET' => "Mengambil semua data history Diagnoses",
                        'POST' => "WIP"
                    ],
                    '/diagnoses/{id}/' => [
                        'GET' => "Mengambil satu data history Diagnoses",
                        'PATCH' => "WIP",
                    ],
                    '/diseases/' => [
                        'GET' => "Mengambil semua data Diseases",
                        'POST' => "WIP"
                    ],
                    '/diseases/{id}/' => [
                        'GET' => "Mengambil satu data Diseases",
                        'PATCH' => "WIP"
                    ],
                    '/symptoms/' => [
                        'GET' => "Mengambil semua data Symptoms",
                        'POST' => "WIP"
                    ],
                    '/symptoms/{id}/' => [
                        'GET' => "Mengambil satu data Symptoms",
                        'PATCH' => "WIP"
                    ]
                ]
            ]
        ]
    );
}

exit;

?>
