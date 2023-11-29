import React from "react";

const Select = ({ title, value, handleChange, options }) => {
  return (
    <div className="input_group">
      <label htmlFor={title}>{title}</label>
      <select value={value} name={title} onChange={handleChange}>
        <option value="0" defaultChecked>
          Seleccione una opción
        </option>
        {options.map((o, i) => (
          <option key={i} value={o.valor}>
            {o.descripcion}
          </option>
        ))}
      </select>
    </div>
  );
};

export default Select;
