import React from "react";
import HeaderComponent from "./HeaderComponent";
import { Outlet } from "react-router-dom";
import FooterComponent from "./FooterComponent";

const Layout = () => {
  return (
    <>
      <HeaderComponent />
      <main id="content">
        <Outlet />
      </main>
      <FooterComponent />
    </>
  );
};

export default Layout;
