import React from "react";
import { useNavigate } from "react-router-dom";

const FloatingButton = ({ title, path }) => {
  const navigate = useNavigate();
  return (
    <a className="floating" onClick={() => navigate(path)}>
      {title}
    </a>
  );
};

export default FloatingButton;
