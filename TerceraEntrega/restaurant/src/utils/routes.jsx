import { createBrowserRouter } from "react-router-dom";
import Layout from "../components/Layout";
import ItemsPage from "../pages/Items/ItemsPage";

const router = createBrowserRouter([
  {
    path: "/",
    element: <Layout />,
    children: [
      {
        path: "/",
        children: [
          {
            path: "/",
            index: true,
            element: <ItemsPage />,
          },
          {
            path: "/new-item",
            element: <h1>Agregar</h1>,
            index: true,
          },
          {
            path: "/edit-item/:id",
            element: <h1>Editar</h1>,
          },
        ],
      },
    ],
  },
]);

export default router;
