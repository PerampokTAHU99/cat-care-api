<?php
require_once __DIR__ . '/vendor/autoload.php';

require_once 'functions/login.php';
require_once 'functions/logout.php';
require_once 'functions/data/diagnoses.php';
require_once 'functions/data/diseases.php';
require_once 'functions/data/symptoms.php';
require_once 'functions/data/users.php';

use FastRoute\RouteCollector;
use FastRoute\Dispatcher;
use function FastRoute\simpleDispatcher;

$dispatcher = simpleDispatcher(function(RouteCollector $route) {
    $route->addRoute(['GET', 'POST', 'PUT', 'PATCH'], '/', 'root');
    $route->post('/auth/login', 'login');
    $route->post('/auth/logout', 'logout');

    $route->addGroup('/data', function(RouteCollector $r) {
        $r->addGroup('/diagnoses', function(RouteCollector $diagnosesRoute) {
            $diagnosesRoute->get('/', 'getAllDiagnose');
            $diagnosesRoute->get('/{id:\d+}', 'getDiagnoseById');
        });

        $r->addGroup('/diseases', function(RouteCollector $diseasesRoute) {
            $diseasesRoute->get('/', 'getAllDisease');
            $diseasesRoute->get('/{id:\d+}', 'getDiseaseById');
        });

        $r->addGroup('/symptoms', function(RouteCollector $diseasesRoute) {
            $diseasesRoute->get('/', 'getAllSymptom');
            $diseasesRoute->get('/{id:\d+}', 'getSymptomById');
        });
    });
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        header('Content-Type: application/json', true, 404);
        echo json_encode(
            array(
                'status' => 404,
                'message' => 'Endpoint API tidak ditemukan.'
            )
        );
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        header('Content-Type: application/json', true, 405);
        echo json_encode(
            array(
                'status' => 405,
                'message' => "Method {$httpMethod} tidak diperbolehkan untuk Endpoint ini.",
                'allowed_method' => $allowedMethods
            )
        );
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $params = $routeInfo[2];

        call_user_func($handler, $params);
        break;
}

function root() {
    header('Content-Type: application/json', true, 200);
    echo json_encode(
        array(
            'status' => 200,
            'message' => "Cat Care API",
            'endpoints' => [
                '/auth' => [
                    '/auth/login' => [
                        'POST' => "Proses Login untuk mendapatkan Token"
                    ],
                    '/auth/logout' => [
                        'POST' => "Proses Logout untuk menghancurkan Session"
                    ],
                ],
                '/data' => [
                    '/diagnoses' => [
                        'GET' => "Mengambil semua data history Diagnoses",
                        'POST' => "WIP"
                    ],
                    '/diagnoses/{id}' => [
                        'GET' => "Mengambil satu data history Diagnoses",
                        'PATCH' => "WIP",
                    ],
                    '/symptoms' => [
                        'GET' => "Mengambil semua data Symptoms",
                        'POST' => "WIP"
                    ],
                    '/symptoms/{id}' => [
                        'GET' => "Mengambil satu data Symptoms",
                        'PATCH' => "WIP"
                    ],
                    '/diseases' => [
                        'GET' => "Mengambil semua data Diseases",
                        'POST' => "WIP"
                    ],
                    '/diseases/{id}' => [
                        'GET' => "Mengambil satu data Diseases",
                        'PATCH' => "WIP"
                    ]
                ]
            ]
        )
    );

    exit;
}

exit;

?>
