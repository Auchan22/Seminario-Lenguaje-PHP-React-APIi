import React from "react";

const Input = ({ title, value, handleChange, type, ...props }) => {
  return (
    <div className="input_group">
      <label htmlFor={title}>{title}</label>
      <input
        type={type}
        value={value}
        onChange={handleChange}
        name={title}
        {...props}
      />
    </div>
  );
};

export default Input;
