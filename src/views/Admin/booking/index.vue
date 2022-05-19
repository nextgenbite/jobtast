<template>
    <div>
        <h2 class="text-center mb-3">Booking List</h2>
        <table class="table table-bordered" id="example1">
            <thead>
                <tr>
                    <th scope="col">Customer name</th>
                    <th scope="col">Resort Name</th>
                    <th scope="col">Booking Start Date</th>
                    <th scope="col">Booking End Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="booking in bookings" v-bind:key="booking.id" >
                    
                    <td>{{booking.customer.cus_name}}</td>
                    <td>{{booking.resort.resort_name}}</td>
                    <td >{{booking.start_date}}</td>
                    <td >{{booking.end_date}}</td>
                    <td>
                        <div class="btn-group">
                            <router-link :to="{name: 'edit-booking', params:{id: booking.id}}" class="btn btn-outline-warning">Edit</router-link>
                            <button @click="deleteCategory(booking.id)" class="btn btn-outline-danger">Delete</button>
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
            bookings:[]
        }
    },
    methods: {
        AllBooking(){
            axios.get('reservation')
            .then(res=>{
                this.bookings = res.data
            })
        },
        deleteCategory(id){
           axios.delete('reservation/'+id)
           .then(res=>{
               this.AllBooking();
                this.$router.push({name: 'booking'})
           }) 
        }
    },
    mounted() {
        this.AllBooking();
    },
}
</script>