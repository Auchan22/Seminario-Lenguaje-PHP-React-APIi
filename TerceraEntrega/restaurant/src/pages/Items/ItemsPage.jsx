import React from "react";
import CardItem from "../../components/CardItem";
import FloatingButton from "../../components/FloatingButton";

const ItemsPage = () => {
  return (
    <div>
      <div class="encabezado_lista">
        <h2>Menú</h2>
        <form method="GET" action="index.php">
          <div class="input_group">
            <label for="titulo">Título:</label>
            <input
              class="input_form"
              name="titulo"
              id="titulo"
              type="text"
              placeholder="Ingrese un título"
            />
          </div>
          <div class="input_group">
            <label for="tipo">Tipo:</label>
            <select class="input_form" name="tipo" id="tipo">
              <option value="">Vacío</option>
              <option value="COMIDA">Comida</option>
              <option value="BEBIDA">Bebida</option>
            </select>
          </div>
          <div class="input_group">
            <label for="orden">Orden:</label>
            <select class="input_form" id="orden" name="orden">
              <option value="">Sin orden</option>
              <option value="ASC">Ascendente</option>
              <option value="DESC">Descendente</option>
            </select>
          </div>
          <button type="submit" class="btn_submit" id="filter_btn">
            Filtrar
          </button>
        </form>
      </div>
      <hr />
      <div id="productos_contenedor">
        <CardItem />
        <CardItem />
        <CardItem />
        <CardItem />
        <CardItem />
        <CardItem />
        <CardItem />
      </div>
      <FloatingButton title="Agregar Item" path="/new-item" />
    </div>
  );
};

export default ItemsPage;
