<template>
    <div class="p-2">
        <MyHeader></MyHeader>
        <Items></Items>
    </div>
</template>
<script>
import MyHeader from "./components/MyHeader";
import Items from "./components/Items";
import axios from 'axios';

export default {
    components: {
        MyHeader,
        Items
    },
    created() {
        axios.get('http://localhost:8000/api/items').then(response=>{
            console.log(response)
        })
    }
}
</script>

<style scoped>

</style>
