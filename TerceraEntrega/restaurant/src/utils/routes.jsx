import { createBrowserRouter } from "react-router-dom";
import Layout from "../components/Layout";
import ItemsPage from "../pages/Items/ItemsPage";
import NewItem from "../pages/Items/NewItem";
import EditItem from "../pages/Items/EditItem";
import PedidosPage from "../pages/pedidos/PedidosPage";
import NewPedido from "../pages/pedidos/NewPedido";

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
            element: <NewItem />,
          },
          {
            path: "/edit-item/:id",
            element: <EditItem />,
          },
        ],
      },
      {
        path: "/pedidos",
        children: [
          {
            path: "/pedidos",
            index: true,
            element: <PedidosPage />,
          },
          {
            path: "/pedidos/new-pedido",
            element: <NewPedido />,
          },
        ],
      },
    ],
  },
]);

export default router;
