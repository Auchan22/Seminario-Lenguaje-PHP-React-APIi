import React from "react";
import { useNavigate } from "react-router-dom";

const CardItem = ({ data }) => {
  const navigate = useNavigate();
  return (
    <div className="cartas">
      <img src="imagen" alt="Imagen producto" />
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
          onClick={() => navigate(`/edit-item/id`)}
        >
          Editar
        </button>
        <button className="btn btn_eliminar">Eliminar</button>
      </div>
    </div>
  );
};

export default CardItem;
