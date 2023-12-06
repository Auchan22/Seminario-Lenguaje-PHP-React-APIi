import axios from "axios";

export const PedidosAPI = axios.create({
    baseURL: `${process.env.REACT_APP_API_URL}/pedidos`,
    mode: "no-cors",
    headers: { "Content-Type": "application/json", }
})