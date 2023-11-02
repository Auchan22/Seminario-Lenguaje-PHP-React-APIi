<?php
namespace App\Controller;
use App\Interfaces\CRUDInterface;
use App\Repository\PedidosRepository;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\utils\Response as ResponseStatus;

class PedidosController
{
    public function index(Request $request, Response $response): Response
    {
        $pr = new PedidosRepository();
        $res = $pr->getPedidos()[0];

        if(count($res) == 0){
            $response->getBody()->write(json_encode(["msg" => "No hay pedidos disponibles"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        $response->getBody()->write(json_encode([$res]));
        return $response
            ->withHeader("Content-Type", "application/json")
            ->withStatus(ResponseStatus::HTTP_OK);
    }

    public function create(Request $request, Response $response): Response
    {
        $body = $request->getBody()->getContents();
    }

    public function delete(Request $request, Response $response, ?array $args): Response
    {
        $id = $args["id"];

        $pr = new PedidosRepository();
        $res = $pr->deletePedido($id);

        if($res != "ok"){
            $response
                ->getBody()->write(json_encode(["msg" => "Hubo un error", $res]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_SERVER_ERROR);
        }

        $response
            ->getBody()->write(json_encode(["msg" => "Se elimino el registro con id: ".$id]));
        return $response
            ->withHeader("Content-Type", "application/json")
            ->withStatus(ResponseStatus::HTTP_NO_CONTENT);
    }

    public function findById(Request $request, Response $response, $args): Response
    {
        $id = $args["id"];
    }
}