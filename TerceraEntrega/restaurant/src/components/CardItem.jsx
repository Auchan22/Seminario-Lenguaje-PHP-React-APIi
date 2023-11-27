import React from "react";
import { useNavigate } from "react-router-dom";

const CardItem = ({ data }) => {
  const navigate = useNavigate();
  return (
    <div class="cartas">
      <img src="imagen" alt="Imagen producto" />
      <div class="descripcion_producto">
        <h3>Nombre</h3>
        <h5>Tipo</h5>
        <p class="producto_precio">
          Valor: <span>$ 1234</span>
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
