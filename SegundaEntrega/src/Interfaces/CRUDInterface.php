<?php
namespace App\Interfaces;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
interface CRUDInterface {
    public function index(Request $request, Response $response): Response;
    public function create(Request $request, Response $response): Response;
    public function update(Request $request, Response $response, ?array $args): Response;
    public function delete(Request $request, Response $response, ?array $args): Response;
}