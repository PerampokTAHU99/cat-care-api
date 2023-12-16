<?php
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Config {
    /**
     * Connection object data to be used for every query executions.
     * @var mysqli
     */
    public static $link;

    /**
     * Establish a connection to the database.
     * This method is autocalled by Composer.
     * @return void
     */
    public static function initialize() {
        $connect = mysqli_connect(
            $_ENV['DB_HOSTNAME'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_DATABASE']
        );

        if (!$connect) {
            echo mysqli_connect_error();
        }
        else {
            self::$link = $connect;
        }
    }
}

Config::initialize();

?>
