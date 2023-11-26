<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use Firebase\JWT\JWT;

function login() {
    global $link;

    $rawPostData = file_get_contents("php://input");
    $postData = json_decode($rawPostData, true);

    if (!isset($postData['username']) || !isset($postData['password'])) {
        header('Content-Type: application/json', true, 400);
        echo json_encode(
            array(
                'status' => 400,
                'message' => "Harap masukkan username dan password."
            )
        );

        exit;
    }

    $username = $postData['username'];
    $password = $postData['password'];

    $sql = "SELECT userId, name, username, email, password, roleId
            FROM users WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($query);

    if (empty($data)) {
        header('Content-Type: application/json', true, 401);
        echo json_encode(
            array(
                'status' => 401,
                'message' => "Username atau Password salah.",
            )
        );

        exit;
    }

    $payload = [
        'userId' => $data['userId'],
        'name' => $data['name'],
        'username' => $data['username'],
        'email' => $data['email'],
        'roleId' => $data['roleId'],
        'exp' => time() + 7200,
    ];

    $jwt = JWT::encode($payload, $_ENV['SECRET_KEY'], 'HS256');

    session_start();
    $_SESSION['isLoggedIn'] = true;

    header('Content-Type: application/json', true, 200);
    echo json_encode(
        array(
            'status' => 200,
            'message' => "Login Berhasil.",
            'token' => $jwt
        )
    );

    exit;
}

?>
