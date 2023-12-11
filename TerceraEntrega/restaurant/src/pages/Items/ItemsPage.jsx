import React, { useEffect, useState } from "react";
import CardItem from "../../components/CardItem";
import FloatingButton from "../../components/FloatingButton";
import { ItemsAPI } from "../../api/ItemsAPI";
import Swal from "sweetalert2";
import { useNavigate } from "react-router-dom";
import FilterBar from "../../components/FilterBar";

const fetchItems = async (queryParams = {}) => {
  const res = await ItemsAPI.get("", { params: queryParams });
  return res.data;
};

const ItemsPage = () => {
  const [items, setItems] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(false);

  const [clickDelete, setClickDelete] = useState(true);

  const [queryParams, setQueryParams] = useState({});

  const handleDelete = (id, nombre) => {
    Swal.fire({
      icon: "warning",
      title: "Eliminar Item",
      text: `¿Estás seguro que deseas eliminar el item: ${nombre}?`,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        ItemsAPI.delete(`/${id}`)
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

  const handleFilter = (e) => {
    e.preventDefault();
    const form = e.target;
    let titulo = form[0].value;
    let tipo = form[1].value;
    let orden = form[2].value;

    let url = new URLSearchParams();

    if (titulo != "") {
      url.append("nombre", titulo);
    }

    if (tipo != "") {
      url.append("tipo", tipo);
    }

    if (orden != "") {
      url.append("orden", orden);
    }

    setQueryParams(url);
  };

  useEffect(() => {
    setLoading(true);
    fetchItems(queryParams)
      .then((res) => {
        setItems(res.length > 0 ? res : []);
        setLoading(false);
      })
      .catch((err) => {
        setLoading(false);
        setError(err);
        setItems([]);
      });
  }, [clickDelete, queryParams]);
  return (
    <div>
      <div className="encabezado_lista">
        <h2>Menú</h2>
        <FilterBar handleFilter={handleFilter} />
      </div>
      <hr />
      <div id="productos_contenedor">
        {loading && <h1>Cargando...</h1>}
        {!loading &&
          items &&
          items.map((i) => (
            <CardItem key={i.id} data={i} handleDelete={handleDelete} />
          ))}
        {items.length == 0 && !loading && <h1>No hay items para mostrar</h1>}
      </div>
      <FloatingButton title="Agregar Item" path="/new-item" />
    </div>
  );
};

export default ItemsPage;
