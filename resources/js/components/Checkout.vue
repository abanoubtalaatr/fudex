<template>
    <MyHeader></MyHeader>
    <div class="justify-center my-6 leading-loose">
        <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl mx-auto">
            <p class="text-gray-800 font-medium">Customer information</p>
            <h5>Your store credit equal: {{store_credit}}</h5>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="cus_address">Address</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_address"
                       v-model="data.address"
                       type="text" required="" placeholder="Address" aria-label="Email">
                <span class="text-red-500" v-if="errors['address']">{{errors['address']}}</span>
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="cus_telephone">Telephone</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_telephone"
                       v-model="data.telephone"
                       type="text" required="" placeholder="Telephone" aria-label="Email">
                <span class="text-red-500" v-if="errors['telephone']">{{errors['telephone']}}</span>
            </div>

            <div class="mt-4">
                <pre>Total Price : {{totalPrice()}}</pre>
                <h4 class="text-red-500" v-if="store_credit < totalPrice()">Sorry can't order now <span class="text-dark">total order greater than store credit</span></h4>
                <button v-if="store_credit > totalPrice()" class="px-4 mr-4 py-1 text-white font-light tracking-wider bg-indigo-900 rounded" type="submit">  Order now
                </button>

                <button class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded" type="submit">  Cancel
                </button>
            </div>
        </form>
    </div>
    <Footer></Footer>
</template>

<script>
import MyHeader from './MyHeader'
import Footer from "./Footer";
import axios from 'axios';

export default {
    name: "Checkout",
    components: {Footer, MyHeader},
    data() {
        return {
            store_credit: 1000 ,
            data: {
                address: '',
                email: '',
                first_name: '',
                telephone: '',
                customer_id : 1
            },
            carts: {},
            errors : {}
        }
    },
    methods : {
        totalPrice() {
            let totalSum = 0;
            for (let i = 0; i < this.carts.length; i++) {
                totalSum += this.carts[i].quantity * this.carts[i].item.price
            }
            return totalSum;
        },
        submit()
        {

        }
    },
    mounted() {
        //here must get customer id put for test we add default value
        //get customer value of customer store_credit
        axios.get('http://localhost:8000/api/customers/1').then(response => {
            this.store_credit = response.data.data.store_credit;
        });

        //get total price for his cart
        axios.get(`http://localhost:8000/api/customers/${this.data.customer_id}/cart`).then(response => {
           this.carts = response.data.data
        });

    }
}
</script>

<style scoped>

</style>
