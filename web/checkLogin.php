<?php
session_start();
require 'function.php';

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($link, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");

$check = mysqli_num_rows($result);

if ($check > 0) {
    $data = mysqli_fetch_assoc($result);

    // check admin
    if ($data['roleId'] == "4001") {
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $data['name'];
        $_SESSION['roleId'] = $data['roleId'];
        header("location:admin/index-admin.php");
        // Check doctor
    } else if ($data['roleId'] == "4002") {

        $_SESSION['username'] = $username;
        $_SESSION['name'] = $data['name'];
        $_SESSION['roleId'] = $data['roleId'];
        header("location:doctor/index-doctor.php");
    } else {
        echo '
            <script>
                alert("Peran pengguna tidak valid!");
                window.location.href="login.php"; 
            </script>
        ';
    }
} else {
    echo '
        <script>
            alert("Username dan Password belum dimasukan atau Salah!!!");
            window.location.href="login.php"; 
        </script>
    ';
};
