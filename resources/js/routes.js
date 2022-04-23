import { createRouter, createWebHistory } from "vue-router"
import Item from "./components/Item";
import Items from "./components/Items";
import Shop from './components/Shop';
import Checkout from "./components/Checkout";
import Orders from "./components/Orders";
import PaymentDone from "./components/PaymentDone";

const routeInfos = [
    {
        path : "/",
        name: 'items',
        component : Items
    },
    {
        path : "/item/:id",
        name: 'item',
        component : Item
    },
    {
        path : "/shop",
        name: 'shop',
        component : Shop
    },
    {
        path : "/checkout",
        name: 'checkout',
        component : Checkout
    },
    {
        path : "/orders",
        name: 'orders',
        component : Orders
    },
    {
        path : "/payment-done",
        name: 'payment',
        component : PaymentDone
    },


]

const router = createRouter({
    history : createWebHistory(),
    routes : routeInfos
})

export default router;
