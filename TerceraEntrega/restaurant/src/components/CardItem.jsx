import React from "react";
import { useNavigate } from "react-router-dom";
import { ItemsAPI } from "../api/ItemsAPI";
import Swal from "sweetalert2";

const CardItem = ({ data, handleDelete }) => {
  const navigate = useNavigate();

  return (
    <div className="cartas">
      <img
        src={`data:${data.tipo_imagen};base64,${data.imagen}`}
        alt="Imagen producto"
      />
      <div className="descripcion_producto">
        <h3>{data.nombre}</h3>
        <h5>{data.tipo}</h5>
        <p className="producto_precio">
          Valor: <span>$ {data.precio}</span>
        </p>
      </div>
      <div className="btn-actions">
        <button
          className="btn btn_editar"
          onClick={() => navigate(`/edit-item/${data.id}`, { state: data })}
        >
          Editar
        </button>
        <button
          className="btn btn_eliminar"
          onClick={() => handleDelete(data.id, data.nombre)}
        >
          Eliminar
        </button>
      </div>
    </div>
  );
};

export default CardItem;
