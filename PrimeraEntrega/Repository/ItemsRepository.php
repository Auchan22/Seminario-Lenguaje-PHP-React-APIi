<?php

require("BaseRepository.php");
class ItemsRepository extends BaseRepository {
    public function getItems(?array $params){
        $query = "SELECT * FROM items_menu i";

        if($params && count($params) > 0){
            $titulo = (string)$params["titulo"];
            $tipo = (string)$params["tipo"];
            $orden = $params["orden"];

            if(strlen($titulo) != 0 || $tipo != "vacio" || $orden != "none" ){
                $query .= " WHERE i.nombre LIKE '%".$titulo."%' AND i.tipo = '". $tipo . "' ORDER BY i.precio ". $orden;
            }
        }

        $result = mysqli_query($this->link_conn, $query);

        return $result; // fetchea el resultado y lo pone en un array
    }

}