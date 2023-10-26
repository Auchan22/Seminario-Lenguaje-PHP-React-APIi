<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Routing\RouteCollectorProxy;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
$app = AppFactory::create();

$app->group("/api", function (RouteCollectorProxy $group){
    $group->group("/pedidos", "App\\Routes\\PedidosRoutes:index");
});

$app->run();