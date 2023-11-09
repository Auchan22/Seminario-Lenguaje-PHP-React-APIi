<?php
namespace App\Interfaces;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

interface UpdateCrudActionInterface {
    public function update(Request $request, Response $response, ?array $args): Response;
}