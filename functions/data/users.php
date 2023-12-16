<?php

function getUserById($params) {
    $userId = $params['id'];

    $query = mysqli_query(
        Config::$link,
        "SELECT * FROM users WHERE userId = " . $userId
    );

    $result = $query->fetch_assoc();

    return Response::success($result);
}

function createUser() {
    $postData = Request::$body;

    if (
        !isset($postData['name'])
        || !isset($postData['username'])
        || !isset($postData['email'])
        || !isset($postData['password'])
        || !isset($postData['roleId'])
    ) { return Response::error("Harap isi semua kolom.", 400); }

    $name = $postData['name'];
    $username = $postData['username'];
    $email = $postData['email'];
    $password = $postData['password'];
    $roleId = $postData['roleId'];

    $usernameExist = mysqli_query(
        Config::$link,
        "SELECT * FROM users WHERE username = '{$username}'"
    )->fetch_assoc();

    $emailExist = mysqli_query(
        Config::$link,
        "SELECT * FROM users WHERE email = '{$email}'"
    )->fetch_assoc();

    if ($usernameExist || $emailExist) {
        return Response::error("Username atau Email sudah terdaftar.", 400);
    }

    $sql = "INSERT INTO users (name, username, email, password, roleId)
            VALUES('{$name}', '{$username}', '{$email}', '{$password}', {$roleId})";

    $query = mysqli_query(
        Config::$link,
        $sql
    );

    if ($query) {
        return Response::success(null, 201);
    }
    else {
        return Response::error("Gagal menyimpan data ke database.");
    }
}

?>
