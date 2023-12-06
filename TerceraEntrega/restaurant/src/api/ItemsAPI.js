import axios from "axios";

export const ItemsAPI = axios.create({
    baseURL: `${process.env.REACT_APP_API_URL}/items`,
    mode: "no-cors",
    headers: { "Content-Type": "application/json", }
})