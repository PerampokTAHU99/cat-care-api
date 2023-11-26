<?php
function logout() {
    session_start();
    session_destroy();

    header('Content-Type: application/json', true, 200);
    echo json_encode(
        [
            'status' => 200,
            'message' => 'Logout Berhasil.'
        ]
    );

    exit;
}

?>
