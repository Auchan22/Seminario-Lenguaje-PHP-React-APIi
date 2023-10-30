<?php
namespace App\utils;
class Response {
    public const HTTP_OK = 200;
    public const HTTP_CREATED = 201;
    public const HTTP_BAD_REQUEST = 400;
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_CONFLICT = 409;
    public const HTTP_SERVER_ERROR = 500;

    public static $statusTexts = [
        200 => 'OK',
        201 => 'Created',
        400 => 'Bad Request',
        404 => 'Not Found',
        409 => 'Conflict',
        500 => 'Internal Server Error',
    ];
}