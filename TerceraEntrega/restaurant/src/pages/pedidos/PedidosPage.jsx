import React, { useEffect, useState } from "react";
import FloatingButton from "../../components/FloatingButton";
import Swal from "sweetalert2";
import { PedidosAPI } from "../../api/PedidosAPI";
import CardPedido from "../../components/CardPedido";

const fetchPedidos = async () => {
  const res = await PedidosAPI.get("");
  return res.data;
};

const PedidosPage = () => {
  const [items, setItems] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(false);

  const [clickDelete, setClickDelete] = useState(true);

  const handleDelete = (id) => {
    Swal.fire({
      icon: "warning",
      title: "Eliminar Pedido",
      text: `¿Estás seguro que deseas eliminar el pedido?`,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si",
        showCancelButton: true,
        cancelButtonText: "Cancelar"
    }).then((result) => {
      if (result.isConfirmed) {
        PedidosAPI.delete(`/${id}`)
          .then(() => setClickDelete(!clickDelete))
          .catch((err) => {
            Swal.fire({
              title: "Hubo un error",
              text: err.response.data.msg,
              icon: "error",
            });
          });
      }
    });
  };

  useEffect(() => {
    setLoading(true);
    fetchPedidos()
      .then((res) => {
        setItems(res.length > 0 ? res : []);
        setLoading(false);
      })
      .catch((err) => {
        setLoading(false);
        setError(err);
        setItems([]);
      });
  }, [clickDelete]);
  return (
    <div>
      <div className="encabezado_lista">
        <h2>Pedidos</h2>
      </div>
      <hr />
      <div id="pedidos_contenedor">
        {loading && <h1>Cargando...</h1>}
        {!loading &&
          items &&
          items.map((i) => (
            <CardPedido key={i.id} data={i} handleDelete={handleDelete} />
          ))}
        {items.length == 0 && !loading && <h1>No hay items para mostrar</h1>}
      </div>
      <FloatingButton title="Agregar Pedido" path="/pedidos/new-pedido" />
    </div>
  );
};

export default PedidosPage;
