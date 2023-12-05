<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function auth() {
    if (empty($_SERVER["HTTP_TOKEN"])) {
        header('Content-Type: application/json', true, 400);
        echo json_encode(
            array(
                'status' => 400,
                'message' => 'Tidak ada token yang dikirim, harap masukan token.'
            )
        );

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
        header('Content-Type: application/json', true, 401);
        echo json_encode(
            array(
                'status' => 401,
                'message' => 'Token tidak valid (atau expired). Harap login ulang.'
            )
        );

        session_abort();

        exit;
    }
}

?>
