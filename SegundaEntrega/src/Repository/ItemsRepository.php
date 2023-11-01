<?php

namespace App\Repository;
use PDO;
class ItemsRepository extends BaseRepository {
    public function getItems(?array $params){
        $query = "SELECT * FROM items_menu i";
//
//        if($params && count($params) > 0){
            $nombre = (string)isset($params["nombre"]) ? $params["nombre"]  : "";
            $tipo = (string)isset($params["tipo"]) ? $params["tipo"]  : "";
            $orden = isset($params["orden"]) ? $params["orden"]  : "ASC";

            if($nombre != ""){
                $query .= " WHERE LOWER(i.nombre) LIKE '%".strtolower($nombre) ."%'";
            }

            if($nombre != "" && $tipo != ""){
                $query .= " OR i.tipo = '".$tipo."%'";
            }

            if($nombre == "" && $tipo != ""){
                $query .= " WHERE i.tipo = '".$tipo."'";
            }

            if($orden != "" ){
                $query .= " ORDER BY i.precio ". $orden;
            }
//        }

        $stmt = $this->link_conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createItem($body){
        $nombre = $body["nombre"];
        $precio = $body["precio"];
        $tipo = $body["tipo"];
        $imagen = $body["imagen"];
        $tipoImagen = $body["tipo_imagen"];
        $query = "INSERT INTO items_menu (nombre, precio, tipo, imagen, tipo_imagen) VALUES ( :nombre, :precio, :tipo, :imagen, :tipoImagen)";

        try {
            $stmt = $this->link_conn->prepare($query);

            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":precio", $precio, PDO::PARAM_INT);
            $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
            $stmt->bindParam(":imagen", $imagen, PDO::PARAM_STR);
            $stmt->bindParam(":tipoImagen", $tipoImagen, PDO::PARAM_STR);
            $stmt->execute();

            return "ok";
        }catch (\PDOException $e){
            return $e;
        }
    }

    public function getItemById($id){
        $query = "SELECT * from items_menu i WHERE i.id = :id";

        try {
            $stmt = $this->link_conn->prepare($query);

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (\PDOException $e) {
            return $e;
        }
    }
    public function hasPedidos($id)
    {
        $query = "SELECT COUNT(p.id) as CUENTA FROM pedidos p WHERE p.idItemMenu = :id";

        try {
            $stmt = $this->link_conn->prepare($query);

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        }catch (\PDOException $e){
            return $e;
        }
    }


    public function deleteItem($id)
    {
        $query = "DELETE FROM items_menu i WHERE i.id = :id";

        try {
            $stmt = $this->link_conn->prepare($query);

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            var_dump($stmt->queryString);
            $stmt->execute();

            return "ok";
        }catch (\PDOException $e){
            return $e;
        }
    }
}