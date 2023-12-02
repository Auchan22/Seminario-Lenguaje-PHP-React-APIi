import axios from "axios";

export const PedidosAPI = axios.create({
    baseURL: "http://localhost:8000/api/pedidos",
    mode: "no-cors",
    headers: { "Content-Type": "application/json", }
})