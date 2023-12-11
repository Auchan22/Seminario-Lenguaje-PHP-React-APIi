import React, { useState } from "react";
import Input from "../../components/Form/Input";
import Select from "../../components/Form/Select";
import { ItemsAPI } from "../../api/ItemsAPI";
import Swal from "sweetalert2";
import { useNavigate } from "react-router-dom";
import { TIPO_OPTIONS } from "../../utils/constantes";
import {getBase64} from "../../utils/base64ImageConverter";

const postItem = async (data) => {
  const res = await ItemsAPI.post("", JSON.stringify(data));
  return res.data;
};

const INITIAL_DATA = {
  nombre: "",
  precio: "",
  tipo: "",
  imagen: "",
  base64Imagen: "",
  tipoImagen: "",
};

const NewItem = () => {
  const [data, setData] = useState(INITIAL_DATA);
  const [disabled, setDisabled] = useState(false);

  const navigate = useNavigate();

  const handleData = (e) => {
    if (e.target.name == "imagen") {
      let file = e.target.files[0];
      // Si la imagen es mayor a 2mb
      if(file.size > 2000000){
        setDisabled(true);
        Swal.fire({
          title: "Hubo un error",
          text: "El tamaño de la imagen no puede ser superior a 2MB",
          icon: "error"
        })
      }
      getBase64(file)
        .then((res) => {
              setData({
                ...data,
                base64Imagen: res.split(",")[1],
                tipoImagen: file.type,
                [e.target.name.toLowerCase()]: e.target.value,
              })
            }
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
    postItem(body)
      .then((res) => {
        Swal.fire({
          title: "Se creó el itém",
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
        <h2>Agregar Item</h2>
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
          name="tipo"
          title="Tipo"
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
          accept="image/jpeg, image/png"
        />
        <button
          type="submit"
          className="btn btn_submit"
          disabled={
            data.nombre == "" ||
            data.precio == 0 ||
            typeof data.precio == "number"
              || disabled
          }
        >
          Agregar
        </button>
      </form>
    </div>
  );
};

export default NewItem;
