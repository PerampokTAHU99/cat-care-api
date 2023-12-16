<?php

class Request {
    /**
     * Get request body values from POST.
     * @var array
     */
    public static $body;

    /**
     * Get raw post data and deserializes it.
     * @return array
     */
    private static function getRawPostData() {
        $rawPostData = file_get_contents("php://input");
        $postData = json_decode($rawPostData, true);

        return $postData;
    }

    /**
     * Initialize request class to assign property values.
     * This method is autocalled by Composer.
     * @return void
     */
    public static function initialize() {
        self::$body = self::getRawPostData();
    }
}

Request::initialize();

?>
