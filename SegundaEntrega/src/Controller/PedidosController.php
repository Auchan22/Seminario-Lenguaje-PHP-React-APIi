<?php
namespace App\Controller;
use App\Interfaces\BasicCrudActionsInterface;
use App\Interfaces\DeleteCrudActionInterface;
use App\Repository\PedidosRepository;
use App\Validator\PedidosValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\utils\Response as ResponseStatus;

class PedidosController implements BasicCrudActionsInterface, DeleteCrudActionInterface
{
    use PedidosValidator;
    public function index(Request $request, Response $response): Response
    {
        $pr = new PedidosRepository();
        $res = $pr->getPedidos();

        if(count($res) == 0){
            $response->getBody()->write(json_encode(["msg" => "No hay pedidos disponibles"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        $response->getBody()->write(json_encode($res));
        return $response
            ->withHeader("Content-Type", "application/json")
            ->withStatus(ResponseStatus::HTTP_OK);
    }

    public function create(Request $request, Response $response): Response
    {
        $body = (array)json_decode($request->getBody()->getContents());

//        var_dump($body);
        if(count($body) < 2){
            $response->getBody()->write(json_encode(["msg" => "Se deben enviar los campos: nro_mesa y id_item"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        if(!$this->validateMesa((int)$body["nro_mesa"])){
            $response
                ->getBody()->write(json_encode(["msg" => "El campo nro_mesa no puede estar vacio y debe contener unicamente numeros"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        if(!$this->validateItem((int)$body["id_item"])){
            $response
                ->getBody()->write(json_encode(["msg" => "El campo id_item no puede estar vacio, debe ser solo numerico y existir"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        $pr = new PedidosRepository();
        $res = $pr->createPedido($body);

        if($res != "ok"){
            $response
                ->getBody()->write(json_encode(["msg" => "Hubo un error", $res]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }
        $response
            ->getBody()->write(json_encode(["msg" => "Se creo el pedido de manera correcta"]));
        return $response
            ->withHeader("Content-Type", "application/json")
            ->withStatus(ResponseStatus::HTTP_CREATED);
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

        $pr = new PedidosRepository();
        $res = $pr->getPedidoById($id);

        if(count($res) == 0){
            $response
                ->getBody()->write(json_encode(["msg" => "No se encontro ningún pedido con el id: {$id}"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_NOT_FOUND);
        }

        $response
            ->getBody()->write(json_encode($res[0]));
        return $response
            ->withHeader("Content-Type", "application/json")
            ->withStatus(ResponseStatus::HTTP_OK);
    }
}