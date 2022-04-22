import { createRouter, createWebHistory } from "vue-router"
import Item from "./components/Item";
import Items from "./components/Items";
import Shop from './components/Shop';
import Checkout from "./components/Checkout";

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


]

const router = createRouter({
    history : createWebHistory(),
    routes : routeInfos
})

export default router;
