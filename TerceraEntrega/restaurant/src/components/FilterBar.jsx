import React from "react";

const FilterBar = ({ handleFilter }) => {
  return (
    <form method="GET" onSubmit={handleFilter}>
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
  );
};

export default FilterBar;
