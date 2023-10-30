<?php

namespace App\Repository;
use App\Repository\BaseRepository;
class ItemsRepository extends BaseRepository {
    public function getItems(?array $params){
        $query = "SELECT * FROM items_menu i";
//
//        if($params && count($params) > 0){
            $titulo = (string)isset($params["titulo"]) ? $params["titulo"]  : "";
            $tipo = (string)isset($params["tipo"]) ? $params["tipo"]  : "";
            $orden = isset($params["orden"]) ? $params["orden"]  : "ASC";

            if($titulo != ""){
                $query .= " WHERE LOWER(i.nombre) LIKE '%".strtolower($titulo) ."%'";
            }

            if($titulo != "" && $tipo != ""){
                $query .= " OR i.tipo = '".$tipo."%'";
            }

            if($titulo == "" && $tipo != ""){
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

}