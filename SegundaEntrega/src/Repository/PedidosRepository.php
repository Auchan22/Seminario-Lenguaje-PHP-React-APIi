<?php
namespace App\Repository;
use PDO;
class PedidosRepository extends BaseRepository
{
    public function getPedidos()
    {
        $query = "SELECT p.id, p.idItemMenu, p.nroMesa, p.comentarios, p.fechaAlta, i.nombre, i.precio, i.tipo_imagen, i.imagen, i.tipo FROM pedidos p INNER JOIN items_menu i on p.idItemMenu = i.id ORDER BY p.fechaAlta DESC";

        try{
            $stmt = $this->link_conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (\PDOException $e){
            return $e;
        }
    }

    public function getPedidoById($id){
        $query = "SELECT p.id, p.idItemMenu, p.nroMesa, p.comentarios, p.fechaAlta, i.nombre, i.precio, i.tipo_imagen, i.imagen, i.tipo FROM pedidos p INNER JOIN items_menu i on p.idItemMenu = i.id WHERE p.id = :id";

        try {
            $stmt = $this->link_conn->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e){
            return $e;
        }
    }

    public function deletePedido($id){
        $query = "DELETE FROM pedidos p WHERE p.id = :id";

        try {
            $stmt = $this->link_conn->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            return "ok";
        } catch (\PDOException $e){
            return $e;
        }
    }


    /**
     * @param array $params
     * @return bool|mysqli_result
     */
    public function createPedido(array $params)
    {
        $id_item = $params["id_item"];
        $nro_mesa = $params["nro_mesa"];
        $descripcion = isset($params["descripcion"]) ? $params["descripcion"] : "";
        $fechaAlta = date("Y-m-d H:i:s");

        $query = "INSERT INTO pedidos (idItemMenu, nromesa, comentarios, fechaAlta) VALUES (:idItem, :nroMesa, :descripcion, '". $fechaAlta . "')";
        try {
            $stmt = $this->link_conn->prepare($query);
            $stmt->bindParam(":idItem", $id_item, PDO::PARAM_INT);
            $stmt->bindParam(":nroMesa", $nro_mesa, PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);

            $stmt->execute();

            return "ok";
        }catch (\Exception $e){
            return $e;
        }
        $result = mysqli_query($this->link_conn, $query);
        return $result;
    }
}
