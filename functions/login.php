<?php
use Firebase\JWT\JWT;

function login() {
    $rawPostData = file_get_contents("php://input");
    $postData = json_decode($rawPostData, true);

    if (!isset($postData['username']) || !isset($postData['password'])) {
        return Response::error("Harap masukkan username dan password.", 400);
    }

    $username = $postData['username'];
    $password = $postData['password'];

    $sql = "SELECT userId, name, username, email, password, roleId
            FROM users WHERE username = '$username'";
    $query = mysqli_query(Config::$link, $sql);
    $data = mysqli_fetch_assoc($query);

    if (empty($data)) {
        return Response::error("Username belum terdaftar, silahkan lakukan Registrasi.", 401);
    }

    if ($data['password'] != $password) {
        return Response::error("Username atau Password salah.", 401);
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

    return Response::custom([
        'status' => 200,
        'message' => "Login Berhasil.",
        'result' => $payload,
        'token' => $jwt
    ], 200);
}

?>
