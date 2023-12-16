<?php
require_once 'functions/data/users.php';

use FastRoute\RouteCollector;

function usersRoutes(RouteCollector $r) {
    $r->get('/{id:\d+}/', 'getUserById');
    $r->post('/', 'createUser');
}

?>
