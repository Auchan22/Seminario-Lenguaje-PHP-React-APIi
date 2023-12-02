import React from "react";

const CardPedido = ({ data, handleDelete }) => {
  return (
    <div className="cartas">
      <img
        src={`data:${data.tipo_imagen};base64,${data.imagen}`}
        alt="Imagen producto"
      />
      <div className="descripcion_producto">
        <h3>{data.nombre}</h3>
        <p className="producto_precio">
          Valor: <span>$ {data.precio}</span>
        </p>
        <p style={{ fontWeight: "bold" }}>
          Nro. Mesa: <span>{data.nroMesa}</span>
        </p>
        <div className="descripcion_pedido">
          <h4>Descripción:</h4>
          <p>
            {data.comentarios.length > 0 ? (
              data.comentarios
            ) : (
              <i>Sin Comentarios</i>
            )}
          </p>
        </div>
      </div>
      <div className="btn-actions">
        <button
          className="btn btn_eliminar"
          onClick={() => handleDelete(data.id)}
        >
          Eliminar
        </button>
      </div>
    </div>
  );
};

export default CardPedido;
