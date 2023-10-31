<?php

namespace App\Routes;

use Slim\Routing\RouteCollectorProxy as Router;
class ItemsRoutes {
    public function index(Router $group){
        $group->get("", "App\\Controller\\ItemsController:index");
        $group->post("", "App\\Controller\\ItemsController:create");
        $group->put("/{id}", "App\\Controller\\ItemsController:update");
//        $group->put("/{id}", "App\\Controller\\ItemsController:delete");
    }
}