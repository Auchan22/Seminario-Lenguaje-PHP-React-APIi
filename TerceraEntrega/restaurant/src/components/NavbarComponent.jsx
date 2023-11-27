import React from "react";
import { Link, useLocation } from "react-router-dom";

const NavbarComponent = () => {
  const location = useLocation();
  const isActive = (p) => location.pathname == p;

  return (
    <nav className="navbar">
      <Link to="/" className={isActive("/") ? "is-active" : ""}>
        {" "}
        Home
      </Link>
      <Link to="/pedidos" className={isActive("/pedidos") ? "is-active" : ""}>
        Pedidos
      </Link>
    </nav>
  );
};

export default NavbarComponent;
