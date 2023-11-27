import React from "react";
import logo from "../assets/logo-restaurant.jpg";
import NavbarComponent from "./NavbarComponent";

const HeaderComponent = () => {
  return (
    <header className="header">
      <div>
        <a href="./">
          <img src={logo} />
          <h3>Don Chincho</h3>
        </a>
      </div>
      <NavbarComponent />
    </header>
  );
};

export default HeaderComponent;
