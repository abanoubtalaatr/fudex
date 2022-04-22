<template>
    <MyHeader></MyHeader>
    <div class="md:flex md:items-center">
        <div class="w-full h-64 md:w-1/2 lg:h-96">
            <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto"
                 src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                 alt="NIKE AIR">
        </div>
        <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
            <h3 class="text-gray-700 uppercase text-lg">{{ item.name }}</h3>
            <span class="text-gray-500 mt-3">${{ item.price }}</span>
            <p class="text-gray-600 text-sm mt-1">{{ item.description }}</p>
            <hr class="my-3">
            <div class="mt-2">
                <label class="text-gray-700 text-sm">Count:</label>
                <div class="flex items-center mt-1">
                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                        <svg @click="count++" class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                    <span class="text-gray-700 text-lg mx-2">{{ count < 1 ? count=1 : count }}</span>
                    <button class="text-gray-500 focus:outline-none focus:text-gray-600" @click="count--">
                        <svg @click="count--" class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex items-center mt-6">
                <button
                    class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                    Order Now
                </button>
                <button class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                    <svg @click="addToCart()" class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <footer></footer>
</template>

<script>

import MyHeader from './MyHeader';
import Footer from './Footer';
import axios from 'axios';

export default {
    name: "Item",
    components: {
        MyHeader,
        Footer,
    },
    data() {
        return {
            item: {},
            count: 1,
        }
    },
    methods: {
        addToCart(){
            let data = {item_id : this.item.id, customer_id : 1, quantity : this.count}
            axios.post("http://localhost:8000/api/carts/", data).then(response=>{
                this.$router.push('/shop')
            })
        }
    },
    mounted() {
        axios.get('http://localhost:8000/api/items/' + this.$route.params.id).then(response => {
            this.item = response.data.data;
        });
    }
}
</script>

<style scoped>

</style>
