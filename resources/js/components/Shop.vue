<template>
    <MyHeader></MyHeader>
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                    <thead>
                    <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell"></th>
                        <th class="text-left">Product</th>
                        <th class="lg:text-right text-left pl-5 lg:pl-0">
                            <span class="lg:hidden" title="Quantity">Qtd</span>
                            <span class="hidden lg:inline">Quantity</span>
                        </th>
                        <th class="hidden text-right md:table-cell">Unit price</th>
                        <th class="text-right">Total price</th>
                        <th class="text-right">Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="cart in carts">
                        <td class="hidden pb-4 md:table-cell">
                            <a href="#">
                                <img class="w-20 rounded"
                                     src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                     alt="NIKE AIR">
                            </a>
                        </td>
                        <td>
                            <a href="#">
                                <p class="mb-2 md:ml-4">{{ cart.item.name }}</p>

                                <button @click="deleteCart(cart.id)" type="button"
                                        class="text-gray-700 md:ml-4 text-red-400">
                                    <small>(Remove item)</small>
                                </button>

                            </a>
                        </td>
                        <td class="justify-center md:justify-end md:flex mt-6">
                            <div class="w-20 h-10">
                                <div class="relative flex flex-row w-full h-8">
                                    <input type="number" min="1" v-model="cart.quantity" @change="idItemThatWillUpdate=cart.id"
                                           class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black"/>
                                </div>
                            </div>
                        </td>
                        <td class="hidden text-right md:table-cell">
                          <span class="text-sm lg:text-base font-medium">
                            {{ cart.item.price }} $
                          </span>
                        </td>
                        <td class="text-right">
                          <span class="text-sm lg:text-base font-medium">
                            {{ cart.item.price * cart.quantity }} $
                          </span>
                        </td>
                        <td class="text-right">
                          <button class="bg-indigo-400 p-2 rounded" v-if="idItemThatWillUpdate==cart.id" @click="updateQuantity(cart.id, cart.item.id, cart.quantity)">Confirm</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <hr class="pb-6 mt-6">
                <div class="my-4 mt-6 -mx-2 lg:flex">
                    <div class="lg:px-2 lg:w-3/4">
                        <div class="p-4 bg-gray-100 rounded-full">
                            <h1 class="ml-2 font-bold uppercase">Order Details</h1>
                        </div>
                        <div class="p-4">
                            <p class="mb-6 italic">Shipping and additionnal costs are calculated based on values you
                                have entered</p>
                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                    Tax
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    10.00 $
                                </div>
                            </div>
                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                    Total
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    {{ totalPrice() }} $
                                </div>
                            </div>
                            <a href="#">
                                <button
                                    class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                    <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor"
                                              d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/>
                                    </svg>
                                    <router-link class="mt-3 hover:underline sm:mx-3 sm:mt-0" to="/checkout">Procceed to checkout
                                    </router-link>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer></Footer>
</template>

<script>
import MyHeader from './MyHeader';
import axios from 'axios';
import Footer from "./Footer";

export default {
    name: "Shop",
    components: {Footer, MyHeader},
    data() {
        return {
            carts: {},
            tax: 10,
            idItemThatWillUpdate: ''
        }
    },
    methods: {

        deleteCart(id) {
            axios.delete('http://localhost:8000/api/carts/' + id).then(response => {
                for (let i = 0; i < this.carts.length; i++) {
                    if (this.carts[i].id === id) {
                        this.carts.splice(i, 1);
                    }
                }
            });
        },

        totalPrice() {
            let totalSum = 0;

            for (let i = 0; i < this.carts.length; i++) {
                totalSum += this.carts[i].quantity * this.carts[i].item.price
            }
            return totalSum - this.tax;
        },

        updateQuantity(cartId, itemId, quantity) {
            let  data = {customer_id: 1, item_id : itemId, quantity : quantity};
            axios.patch(`http://localhost:8000/api/carts/`+cartId, data).then(response => {
                this.idItemThatWillUpdate = '';
            });
        }
    },
    mounted() {
        let data = {customer_id: 1};//if we have loggedIn user will get it automatic from here or back end
        axios.get(`http://localhost:8000/api/customers/${data.customer_id}/cart`).then(response => {
            this.carts = response.data.data
        });
    }
}
</script>

<style scoped>

</style>
