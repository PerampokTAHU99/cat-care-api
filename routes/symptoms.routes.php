<?php
require_once 'functions/data/symptoms.php';

use FastRoute\RouteCollector;

function symptomsRoutes(RouteCollector $r) {
    $r->get('/', 'getAllSymptom');
    $r->get('/{id:\d+}/', 'getSymptomById');
}

?>
