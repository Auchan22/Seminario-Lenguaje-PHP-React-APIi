<?php
use Slim\Routing\RouteCollectorProxy;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once("./src/Models/DB.php");
$app = AppFactory::create();

$app->group("/api", function (RouteCollectorProxy $group){
    $group->group("/pedidos", "App\\Routes\\PedidosRoutes:index");
    $group->group("/items", "App\\Routes\\ItemsRoutes:index");
});

$app->run();