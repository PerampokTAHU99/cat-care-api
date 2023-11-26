<?php
require_once __DIR__ . '/../../config.php';

function getAllUser() {
    global $link;

    auth();

    $query = mysqli_query($link, "SELECT * FROM users");

    $result = array();
    while ($row = mysqli_fetch_array($query)) {
        array_push($result, array(
            'userId' => $row['userId'],
            'name' => $row['name'],
            'username ' => $row['username'],
            'email' => $row['email'],
            'password' => $row['password'],
            'roleId ' => $row['roleId']
        ));
    }

    header('Content-Type: application/json', true, 200);
    echo json_encode(
        array(
            'status' => 200,
            'message' => "Success",
            'result' => $result
        )
    );
}

function getUserByRoleId($params) {
    global $link;

    auth();

    $roleId = $params['roleId'];

    $query = mysqli_query($link, "SELECT * FROM users WHERE roleId = ". $roleId);

    $result = array();
    while ($row = $query -> fetch_assoc()) {
        $result = array (
            'userId' => $row['userId'],
            'name' => $row['name'],
            'username ' => $row['username'],
            'email' => $row['email'],
            'password' => $row['password'],
            'roleId ' => $row['roleId']
        );
    }

    header('Content-Type: application/json', true, 200);
    echo json_encode(
        array(
            'status' => 200,
            'message' => "Success",
            'result' => $result
        )
    );
}

?>
