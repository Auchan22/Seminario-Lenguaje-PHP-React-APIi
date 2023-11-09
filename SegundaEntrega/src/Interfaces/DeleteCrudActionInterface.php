<?php
namespace App\Interfaces;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

interface DeleteCrudActionInterface {
    public function delete(Request $request, Response $response, ?array $args): Response;
}