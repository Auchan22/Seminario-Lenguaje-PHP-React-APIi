<?php

require("BaseRepository.php");
class ItemsRepository extends BaseRepository {
    public function getItems(?array $params){
        $query = "SELECT * FROM items_menu i";

        if($params && count($params) > 0){
            $titulo = (string)$params["titulo"];
            $tipo = (string)$params["tipo"];
            $orden = $params["orden"];

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
        }

        $result = mysqli_query($this->link_conn, $query);

        return $result;
    }

    public function getItemImageById(int $id){
        $query = "SELECT i.foto FROM items_menu i WHERE i.id = " . $id;

        $result = mysqli_query($this->link_conn, $query);

        mysqli_close($this->link_conn);
        return mysqli_fetch_array($result);
    }

}