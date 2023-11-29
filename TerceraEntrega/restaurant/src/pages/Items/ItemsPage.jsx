import React, { useEffect, useState } from "react";
import CardItem from "../../components/CardItem";
import FloatingButton from "../../components/FloatingButton";
import { ItemsAPI } from "../../api/ItemsAPI";

const fetchItems = async () => {
  const res = await ItemsAPI.get("");
  return res.data;
};

const ItemsPage = () => {
  const [items, setItems] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(false);

  useEffect(() => {
    setLoading(true);
    fetchItems()
      .then((res) => {
        // console.log(res);
        setItems(res);
        setLoading(false);
      })
      .catch((err) => {
        setLoading(false);
        setError(err);
      });
  }, []);
  return (
    <div>
      <div className="encabezado_lista">
        <h2>Menú</h2>
        <form method="GET" action="index.php">
          <div className="input_group">
            <label htmlFor="titulo">Título:</label>
            <input
              className="input_form"
              name="titulo"
              id="titulo"
              type="text"
              placeholder="Ingrese un título"
            />
          </div>
          <div className="input_group">
            <label htmlFor="tipo">Tipo:</label>
            <select className="input_form" name="tipo" id="tipo">
              <option value="">Vacío</option>
              <option value="COMIDA">Comida</option>
              <option value="BEBIDA">Bebida</option>
            </select>
          </div>
          <div className="input_group">
            <label htmlFor="orden">Orden:</label>
            <select className="input_form" id="orden" name="orden">
              <option value="">Sin orden</option>
              <option value="ASC">Ascendente</option>
              <option value="DESC">Descendente</option>
            </select>
          </div>
          <button type="submit" className="btn_submit" id="filter_btn">
            Filtrar
          </button>
        </form>
      </div>
      <hr />
      <div id="productos_contenedor">
        {!loading &&
          items &&
          items.map((i) => <CardItem key={i.id} data={i} />)}
      </div>
      <FloatingButton title="Agregar Item" path="/new-item" />
    </div>
  );
};

export default ItemsPage;
