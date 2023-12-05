<?php
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Config {
    public static $link;

    public static function initialize() {
        self::$link = mysqli_connect(
            $_ENV['DB_HOSTNAME'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_DATABASE']
        );
    }
}

Config::initialize();

?>
