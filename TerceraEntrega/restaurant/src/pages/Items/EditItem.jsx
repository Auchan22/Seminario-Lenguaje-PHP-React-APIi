import React, { useState } from "react";
import { useLocation, useNavigate } from "react-router-dom";
import Input from "../../components/Form/Input";
import Select from "../../components/Form/Select";
import Swal from "sweetalert2";
import { TIPO_OPTIONS } from "../../utils/constantes";
import { ItemsAPI } from "../../api/ItemsAPI";
import {getBase64} from "../../utils/base64ImageConverter";

const updateItem = async (data, id) => {
  const res = await ItemsAPI.put(`/${id}`, JSON.stringify(data));
  return res.data;
};

let INITIAL_DATA = {
  nombre: "",
  precio: "",
  tipo: "",
  imagen: "",
  base64Imagen: "",
  tipoImagen: "",
};

const EditItem = () => {
  const location = useLocation();
  const state = location.state;

  INITIAL_DATA = {
    ...INITIAL_DATA,
    nombre: state.nombre,
    precio: state.precio,
    imagen: "",
    tipo: state.tipo,
    tipoImagen: state.tipo_imagen,
    base64Imagen: state.imagen,
  };

  const [data, setData] = useState(INITIAL_DATA);

  const navigate = useNavigate();

  const handleData = (e) => {
    if (e.target.name == "Imagen") {
      let file = e.target.files[0];
      getBase64(file)
        .then((res) =>
          setData({
            ...data,
            base64Imagen: res.split(",")[1],
            tipoImagen: file.type,
            [e.target.name.toLowerCase()]: e.target.value,
          })
        )
        .catch((err) => console.error(err));
    }
    setData({ ...data, [e.target.name.toLowerCase()]: e.target.value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    let body = {
      nombre: data.nombre,
      precio: data.precio,
      tipo: data.tipo,
      imagen: data.base64Imagen,
      tipo_imagen: data.tipoImagen,
    };
    updateItem(body, state.id)
      .then((res) => {
        Swal.fire({
          title: "Se actualizó el itém",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            navigate("/");
          }
        });
      })
      .catch((err) => {
        Swal.fire({
          title: "Hubo un error",
          text: err.response.data.msg,
          icon: "error",
        });
      });
  };
  return (
    <div>
      <div className="encabezado_lista">
        <h2>Editar Item</h2>
      </div>
      <hr />
      <form className="form_alta" onSubmit={handleSubmit}>
        <div>
          <p style={{ color: "slategray" }}>
            Los campos que poseen * son obligatorios
          </p>
          <hr />
        </div>
        <Input
          type="text"
          title="Nombre"
          handleChange={handleData}
          value={data.nombre}
          placeholder="Ingrese un nombre"
          required
        />
        <Input
          type="number"
          title="Precio"
          handleChange={(e) => e.target.value >= 0 && handleData(e)}
          value={data.precio}
          min={0}
          placeholder="Ingrese un precio"
          required
        />
        <Select
          title="Tipo"
          name="tipo"
          handleChange={handleData}
          value={data.tipo}
          options={TIPO_OPTIONS}
          required
        />
        <Input
          type="file"
          title="Imagen"
          handleChange={handleData}
          value={data.imagen}
          placeholder="Ingrese una imagen"
          required
        />
        <button
          type="submit"
          className="btn btn_submit"
          disabled={
            data.nombre == "" ||
            data.precio == 0 ||
            typeof data.precio == "number"
          }
        >
          Editar
        </button>
      </form>
    </div>
  );
};

export default EditItem;
