<?php
require_once 'functions/data/diagnoses.php';

use FastRoute\RouteCollector;

function diagnosesRoutes(RouteCollector $r) {
    $r->get('/', 'getAllDiagnose');
    $r->post('/','createDiagnose');
    $r->get('/{id:\d+}/', 'getDiagnoseById');
}

?>
