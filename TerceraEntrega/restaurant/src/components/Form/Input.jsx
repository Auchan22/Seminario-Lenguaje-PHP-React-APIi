import React from "react";

const Input = ({ title, value, handleChange, type, required, ...props }) => {
  return (
    <div className="input_group">
      <label htmlFor={title}>
        {title} {required && <span style={{ color: "red" }}>*</span>}
      </label>
      <input
        type={type}
        value={value}
        onChange={handleChange}
        name={title.toLowerCase()}
        {...props}
      />
    </div>
  );
};

export default Input;
