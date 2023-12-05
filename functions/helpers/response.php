<?php

class Response {
    /**
     * Send a JSON response with a success message.
     *
     * @param mixed $data The data to be included in the response.
     * @param int $statusCode The HTTP status code (default: 200 OK).
     */
    public static function success($data = null, $statusCode = 200) {
        self::sendResponse([
            'status' => $statusCode,
            'message' => "Success.",
            'result' => $data,
        ], $statusCode);
    }

    /**
     * Send a JSON response with an error message.
     *
     * @param string $message The error message.
     * @param int $statusCode The HTTP status code (default: 500 Internal Server Error).
     */
    public static function error($message, $statusCode = 500) {
        self::sendResponse([
            'status' => $statusCode,
            'message' => $message,
        ], $statusCode);
    }

    /**
     * Send a JSON response with a custom payload.
     *
     * @param array $payload The custom payload.
     * @param int $statusCode The HTTP status code (default: 200 OK).
     */
    public static function custom($payload, $statusCode = 200) {
        self::sendResponse($payload, $statusCode);
    }

    /**
     * Send the JSON response.
     *
     * @param array $data The data to be included in the response.
     * @param int $statusCode The HTTP status code.
     */
    private static function sendResponse($data, $statusCode) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
    }
}

?>
