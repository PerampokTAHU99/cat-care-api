<?php
require_once 'functions/data/diseases.php';

use FastRoute\RouteCollector;

function diseasesRoutes(RouteCollector $r) {
    $r->get('/', 'getAllDisease');
    $r->get('/{id:\d+}/', 'getDiseaseById');
}

?>
