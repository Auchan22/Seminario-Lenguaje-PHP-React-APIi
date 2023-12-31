<?php
include_once("BaseRepository.php");

class PedidosRepository extends BaseRepository
{
    public function getPedidos()
    {
        $query = "SELECT * FROM pedidos p INNER JOIN items_menu i on p.idItemMenu = i.id ORDER BY p.fechaAlta DESC";
        $result = mysqli_query($this->link_conn, $query);

        //Convierte la respuesta en un array
        return $result;
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
        $fechaAlta = date("Y-m-d H:i:s");

        $query = "INSERT INTO pedidos (idItemMenu, nromesa, comentarios, fechaAlta) VALUES (". $id_item . ", ". $nro_mesa . ", '". $descripcion . "', '" . $fechaAlta ."')";
        $result = mysqli_query($this->link_conn, $query);
        return $result;
    }
}
