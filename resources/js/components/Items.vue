<template>
    <MyHeader></MyHeader>
    <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-2 gap-5">
        <div v-for="item in items" class="max-w-xs bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-2">
                <h1 class="text-gray-900 font-bold text-3xl uppercase">{{ item.name }}</h1>
                <p class="text-gray-600 text-sm mt-1">{{ item.description }}</p>
            </div>
            <img class="h-56 w-full object-cover mt-2"
                 src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                 alt="NIKE AIR">

            <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
                <h1 class="text-gray-200 font-bold text-xl">$ {{ item.price }}</h1>
                <button class="px-3 py-1 bg-gray-200 text-sm text-gray-900 font-semibold rounded"
                        @click="shopPage(item.id)">Add to card
                </button>
            </div>
        </div>
    </div>
    <Footer></Footer>
</template>

<script>
import axios from 'axios';
import MyHeader from './MyHeader';
import Footer from "./Footer";

export default {
    name: "Items",
    components: {Footer, MyHeader},
    data() {
        return {
            items: {}
        }
    },
    methods: {
        shopPage(id) {
            this.$router.push('/item/' + id);
        }
    },
    created() {
        axios.get('http://localhost:8000/api/items').then(response => {
            this.items = response.data.data
        });
    }
}
</script>

<style scoped>

</style>
