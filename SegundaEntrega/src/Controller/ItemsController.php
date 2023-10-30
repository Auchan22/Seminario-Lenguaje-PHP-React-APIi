<?php
namespace App\Controller;
use App\Repository\ItemsRepository;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\utils\Response as ResponseStatus;

class ItemsController
{
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

    public function update(Request $request, Response $response, $args): Response
    {
        var_dump($args);
        return $response;
    }
}
