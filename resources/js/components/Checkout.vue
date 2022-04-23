<template>
    <MyHeader></MyHeader>
    <div class="justify-center my-6 leading-loose">
        <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl mx-auto">
            <p class="text-gray-800 font-medium">Customer information</p>
            <h5><strong>Your store credit equal</strong>: <mark class="bg-gray-900 text-red-500 p-1 rounded">{{store_credit}} $</mark> </h5>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="cus_address">Address</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_address"
                       v-model="data.address"
                       type="text" required="" placeholder="Address" aria-label="Email">
                <span class="text-red-500" v-if="errors['address']">{{errors['address'][0]}}</span>
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="cus_telephone">Telephone</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_telephone"
                       v-model="data.telephone"
                       type="text" required="" placeholder="Telephone" aria-label="Email">
                <span class="text-red-500" v-if="errors['telephone']">{{errors['telephone'][0]}}</span>
            </div>

            <div class="mt-4">
                <pre>Total Price : {{totalPrice()}}</pre>
                <h4 class="text-red-500" v-if="totalPrice() == 0">Sorry can't order now <span class="text-dark">you don't have items in cart</span></h4>
                <h4 class="text-red-500" v-if="store_credit < totalPrice()">Sorry can't order now <span class="text-dark">total order greater than store credit</span></h4>

                <button @click="submit()" v-if="store_credit > totalPrice() && totalPrice() !=0" class="px-4 mr-4 py-1 text-white font-light tracking-wider bg-indigo-900 rounded" type="button">  Order now
                </button>

                <button @click="submit()" class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded" type="button">
                    <router-link class="" to="/"> Cancel
                    </router-link>
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
            store_credit: 0 ,
            data: {
                address: '',
                telephone: '',
                customer_id : 1
            },
            total : 0,
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
            this.data['total'] = this.totalPrice();

            axios.post('http://localhost:8000/api/orders', this.data).then(response=>{
                this.$router.push('/payment-done');
            }).catch(error=>{
                this.errors = error.response.data.errors;
            })
        }
    },
    created() {
        //get amount of store credit to display it
        axios.get('http://localhost:8000/api/customers/1').then(response => {
            this.store_credit = response.data.data.store_credit;
        });

        //get carts for this customer to calculate total price
        axios.get(`http://localhost:8000/api/customers/${this.data.customer_id}/cart`).then(response => {
           this.carts = response.data.data
        });

        this.total = this.totalPrice();
    }
}
</script>

<style scoped>

</style>
