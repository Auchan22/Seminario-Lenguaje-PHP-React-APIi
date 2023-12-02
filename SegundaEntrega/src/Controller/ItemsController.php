<?php
namespace App\Controller;
use App\Interfaces\BasicCrudActionsInterface;
use App\Interfaces\DeleteCrudActionInterface;
use App\Interfaces\UpdateCrudActionInterface;
use App\Repository\ItemsRepository;
use App\Validator\ItemsValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\utils\Response as ResponseStatus;
class ItemsController implements BasicCrudActionsInterface, DeleteCrudActionInterface, UpdateCrudActionInterface
{
    use ItemsValidator;
    public function index(Request $request, Response $response): Response
    {
        $params = $request->getQueryParams();
        $ir = new ItemsRepository();
        $result = $ir->getItems($params);
        $res = [json_encode($result), count($result) == 0 ? ResponseStatus::HTTP_NOT_FOUND : ResponseStatus::HTTP_OK];
        $response->getBody()->write($res[0]);
        return $response
            ->withHeader("Content-Type", "application/json")
            ->withStatus($res[1]);
    }


    //En Insomnia, el tipo de body tiene que ser multipart.
    //Ademas, se utiliza getParsedBody y no getBody porque parsed se utiliza para acceder a datos codificados
    public function create(Request $request, Response $response): Response
    {
        $body = (array)json_decode($request->getBody()->getContents());

        if(count($body) < 5){
            $response
                ->getBody()->write(json_encode(["msg" => "Se deben enviar todos los campos: nombre, precio, tipo, imagen y tipo_imagen"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        if(!$this->validateNombre($body["nombre"])){
            $response
                ->getBody()->write(json_encode(["msg" => "El campo nombre no puede estar vacio y no debe contener numeros"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

            if( !$this->validatePrecio((int)$body["precio"])){
                $response
                    ->getBody()->write(json_encode(["msg" => "El campo precio no puede estar vacio y debe contener numeros"]));
                return $response
                    ->withHeader("Content-Type", "application/json")
                    ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
            }

                if(!$this->validateTipo($body["tipo"])){
                    $response
                        ->getBody()->write(json_encode(["msg" => "El campo tipo no puede estar vacio y debe ser: BEBIDA o COMIDA"]));
                    return $response
                        ->withHeader("Content-Type", "application/json")
                        ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
                }

        // Por medio de explode, podemos dividir un string en un array al encontrar el caracter separador
        // Como el getClientMediaType() devuelve "image/tipo", y a nosotros unicamente nos interesa el tipo (segunda pos del array), lo capturamos
        // Esto se basa en la interfaz UploadedFileInterface
        $tipo_imagen = $body["tipo_imagen"];
        $imagen = $body["imagen"];

        if( !isset($body["tipo_imagen"]) && !isset( $body["imagen"]) || $body["imagen"] == "" || $body["tipo_imagen"] == ""){
            $response
                ->getBody()->write(json_encode(["msg" => "El campo imagen y tipo_imagen no pueden estar vacios"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        $ir = new ItemsRepository();
        $body = array_merge($body, ["imagen" => $imagen, "tipo_imagen" => $tipo_imagen]);
        $res = $ir->createItem($body);

        if($res != "ok"){
            $response
                ->getBody()->write(json_encode(["msg" => "No se pudo crear el registro", $res]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        $response
            ->getBody()->write(json_encode(["msg" => "Se creo el item"]));
        return $response
            ->withHeader("Content-Type", "application/json")
            ->withStatus(ResponseStatus::HTTP_CREATED);
    }

    public function update(Request $request, Response $response,?array $args): Response
    {
        $body = (array)json_decode($request->getBody()->getContents());
        $id = $args["id"];

        if(count($body) == 0){
            $response
                ->getBody()->write(json_encode(["msg" => "Se debe enviar al menos un campo"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        if(isset($body["nombre"]) && !$this->validateNombre($body["nombre"])){
            $response
                ->getBody()->write(json_encode(["msg" => "El campo nombre no puede estar vacio y no debe contener numeros"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        if(isset($body["precio"]) && !$this->validatePrecio((int)$body["precio"])){
            $response
                ->getBody()->write(json_encode(["msg" => "El campo precio no puede estar vacio y debe contener numeros"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        if(isset($body["tipo"]) && !$this->validateTipo($body["tipo"])){
            $response
                ->getBody()->write(json_encode(["msg" => "El campo tipo no puede estar vacio y debe ser: BEBIDA o COMIDA"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        $ir = new ItemsRepository();
        $existItem = $ir->getItemById($id);

        if(count($existItem) == 0){
            $response
                ->getBody()->write(json_encode(["msg" => "No se puede actualizar el item con el id $id porque no esta creado"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_NOT_FOUND);
        }
        $res = $ir->updateItem($id, $body);

        if($res != "ok"){
            $response
                ->getBody()->write(json_encode(["msg" => "Hubo un error", $res]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_BAD_REQUEST);
        }

        $response
            ->getBody()->write(json_encode(["msg" => "Se actualizó el item"]));
        return $response
            ->withHeader("Content-Type", "application/json")
            ->withStatus(ResponseStatus::HTTP_OK);
    }

    public function delete(Request $request, Response $response, $args): Response
    {
        $id = $args["id"];

        $ir = new ItemsRepository();
        $existPedido = $ir->getItemById($id);

        if(count($existPedido) == 0){
            $response
                ->getBody()->write(json_encode(["msg" => "El item con id: ".$id." no se puede eliminar porque no existe"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_NOT_FOUND);
        }

        $hasPedidos = $ir->hasPedidos($id)["CUENTA"] > 0;

        if($hasPedidos){
            $response
                ->getBody()->write(json_encode(["msg" => "No se puede eliminar el item porque tiene pedidos asociados"]));
            return $response
                ->withHeader("Content-Type", "application/json")
                ->withStatus(ResponseStatus::HTTP_CONFLICT);
        }

        $res = $ir->deleteItem($id);

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
}
