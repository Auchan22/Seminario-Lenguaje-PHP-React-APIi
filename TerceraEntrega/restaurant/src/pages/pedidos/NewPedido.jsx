import React, { useEffect, useState } from "react";
import Input from "../../components/Form/Input";
import Select from "../../components/Form/Select";
import { ItemsAPI } from "../../api/ItemsAPI";
import Swal from "sweetalert2";
import { useNavigate } from "react-router-dom";
import { PedidosAPI } from "../../api/PedidosAPI";
import { MESAS } from "../../utils/constantes";

const postPedido = async (data) => {
  const res = await PedidosAPI.post("", JSON.stringify(data));
  return res.data;
};

const getItems = async () => {
  const { data } = await ItemsAPI.get("");
  return data;
};

const INITIAL_DATA = {
  nroMesa: "",
  descripcion: "",
  id_item: "",
};

const NewPedido = () => {
  const [data, setData] = useState(INITIAL_DATA);
  const [items, setItems] = useState([]);

  useEffect(() => {
    getItems().then((res) => {
      setItems(res.map((r) => ({ descripcion: r.nombre, valor: r.id })));
    });
  }, []);

  const navigate = useNavigate();

  const handleData = (e) => {
    setData({ ...data, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    let body = {
      nro_mesa: data.nroMesa,
      id_item: data.id_item,
      descripcion: data.descripcion,
    };
    postPedido(body)
      .then((res) => {
        Swal.fire({
          title: "Se creó el pedido",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            navigate("/pedidos");
          }
        });
      })
      .catch((err) => {
        Swal.fire({
          title: "Hubo un error",
          text: err.response.data,
          icon: "error",
        });
      });
  };
  return (
    <div>
      <div className="encabezado_lista">
        <h2>Agregar Pedido</h2>
      </div>
      <hr />
      <form className="form_alta" onSubmit={handleSubmit}>
        <div>
          <p style={{ color: "slategray" }}>
            Los campos que poseen * son obligatorios
          </p>
          <hr />
        </div>
        <Select
          title="Item del menú"
          name="id_item"
          handleChange={handleData}
          value={data.id_item}
          options={items}
          required
        />
        <Select
          title="Numero de mesa"
          name="nroMesa"
          handleChange={handleData}
          value={data.nroMesa}
          options={MESAS}
          required
        />
        <Input
          type="textarea"
          title="Descripcion"
          handleChange={handleData}
          value={data.descripcion}
          placeholder="Ingrese sus comentarios"
        />
        <button
          type="submit"
          className="btn btn_submit"
          disabled={data.id_item == "" || data.nroMesa == ""}
        >
          Agregar
        </button>
      </form>
    </div>
  );
};

export default NewPedido;
