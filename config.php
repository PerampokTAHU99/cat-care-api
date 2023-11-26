<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$link = mysqli_connect(
    $_ENV['DB_HOSTNAME'],
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_DATABASE']
);

if (!$link) {
    die("Koneksi dengan Database Gagal : " . mysqli_connect_error());
}

?>
