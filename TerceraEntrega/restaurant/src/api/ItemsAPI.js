import axios from "axios";

export const ItemsAPI = axios.create({
    baseURL: "http://localhost:8000/api/items",
    mode: "no-cors",
})