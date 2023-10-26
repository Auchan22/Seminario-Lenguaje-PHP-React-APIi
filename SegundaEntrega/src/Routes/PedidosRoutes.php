<?php
namespace App\Routes;

use Slim\Routing\RouteCollectorProxy as Router;
class PedidosRoutes {
    public function index(Router $group){
        $group->get("/", "App\\Controller\\PedidosController:index");
    }
}