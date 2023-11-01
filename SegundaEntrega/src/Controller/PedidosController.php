<?php
namespace App\Controller;
use App\Interfaces\CRUDInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PedidosController implements CRUDInterface
{
    public function index(Request $request, Response $response): Response
    {
        $response->getBody()->write("Obteniendo pedidos");
        return $response;
    }
}