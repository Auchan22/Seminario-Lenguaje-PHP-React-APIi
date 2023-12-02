import React from "react";

const Select = ({ title, value, name, handleChange, options, required }) => {
  return (
    <div className="input_group">
      <label htmlFor={name}>
        {title} {required && <span style={{ color: "red" }}>*</span>}
      </label>
      <select
        value={value}
        name={name}
        required={required}
        onChange={handleChange}
      >
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
