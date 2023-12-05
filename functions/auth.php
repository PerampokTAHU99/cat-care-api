<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function auth() {
    if (empty($_SERVER["HTTP_TOKEN"])) {
        Response::error("Tidak ada token yang dikirim, harap masukan token.", 400);

        exit;
    }

    $jwt = $_SERVER['HTTP_TOKEN'];

    try {
        $decoded = JWT::decode($jwt, new Key($_ENV['SECRET_KEY'], 'HS256'));
        $decoded_array = (array) $decoded;
    
        session_start();
        $_SESSION['userId'] = $decoded_array['userId'];
        $_SESSION['roleId'] = $decoded_array['roleId'];
    }
    catch (Exception $e) {
        session_abort();

        Response::error("Token tidak valid (atau expired). Harap login ulang.", 401);

        exit;
    }
}

?>
