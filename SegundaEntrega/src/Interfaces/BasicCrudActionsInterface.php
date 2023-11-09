<?php
namespace App\Interfaces;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
interface BasicCrudActionsInterface {
    public function index(Request $request, Response $response): Response;
    public function create(Request $request, Response $response): Response;
}