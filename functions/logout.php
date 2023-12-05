<?php
function logout() {
    session_start();
    session_destroy();

    return Response::success("Logout Berhasil.", 200);
}

?>
