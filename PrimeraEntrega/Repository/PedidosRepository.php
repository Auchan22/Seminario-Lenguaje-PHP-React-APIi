<?php
include_once("BaseRepository.php");

class PedidosRepository extends BaseRepository{
    public function getPedidos(){
        $query = "SELECT * FROM pedidos p INNER JOIN items_menu i on p.idItemMenu = i.id";
        $result = mysqli_query($this->link_conn, $query);

        //Convierte la respuesta en un array
        return mysqli_fetch_array($result);
    }
}