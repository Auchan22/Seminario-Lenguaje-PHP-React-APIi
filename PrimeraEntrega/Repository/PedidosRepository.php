<?php
include_once("BaseRepository.php");

class PedidosRepository extends BaseRepository
{
    public function getPedidos()
    {
        $query = "SELECT * FROM pedidos p INNER JOIN items_menu i on p.idItemMenu = i.id";
        $result = mysqli_query($this->link_conn, $query);

        //Convierte la respuesta en un array
        return mysqli_fetch_array($result);
    }


    /**
     * @param array $params
     * @return bool|mysqli_result
     */
    public function createPedido(array $params)
    {
        $id_item = $params["id_item"];
        $nro_mesa = $params["nro_mesa"];
        $descripcion = $params["descripcion"];

        $query = "INSERT INTO pedidos (idItemMenu, nromesa, descripcion) VALUES (". $id_item . ", ". $nro_mesa . ", ". $descripcion . ")";

        $result = mysqli_query($this->link_conn, $query);

        return $result;
    }
}
