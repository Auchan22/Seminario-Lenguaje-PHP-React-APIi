<?php
namespace App\Routes;

use Slim\Routing\RouteCollectorProxy as Router;
class PedidosRoutes {
    public function index(Router $group){
        $group->get("", "App\\Controller\\PedidosController:index");
        $group->get("/{id}", "App\\Controller\\PedidosController:findById");
        $group->delete("/{id}", "App\\Controller\\PedidosController:delete");
    }
}