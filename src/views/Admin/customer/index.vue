<template>
    <div>
        <h2 class="text-center mb-3">All customers</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">customer Name</th>
                    <th scope="col">customer Description</th>
                    <th scope="col">publication status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer, index in customers" v-bind:key="customer.id" >
                    <th scope="row">{{index+1}}</th>
                    <td>{{customer.cus_name}}</td>
                    <td><img :src="'http://localhost:8000/'+customer.cus_image"  style="width: 100px;" alt=""></td>
                    <td v-if="customer.status == 1"><span class="badge badge-success">Active</span></td>
                    <td v-else><span class="badge badge-danger">Inactive</span></td>
                    <td>
                        <div class="btn-group">
                            <router-link :to="{name: 'edit-customer', params:{id: customer.id}}" class="btn btn-outline-warning">Edit</router-link>
                            <button @click="deletecustomer(customer.id)" class="btn btn-outline-danger">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            customers:[]
        }
    },
    methods: {
        Allcustomers(){
            axios.get('customer')
            .then(res=>{
                this.customers = res.data
            })
        },
        deletecustomer(id){
           axios.delete('customer/'+id)
           .then(res=>{
               this.Allcustomers();
                this.$router.push({name: 'customer'})
           }) 
        }
    },
    mounted() {
        this.Allcustomers();
    },
}
</script>