<template>
     <div>
        <h2 class="text-center mb-3">Booking Add</h2>
         <form @submit.prevent="booking_add()">
                <div class="form-group row">
                  <label for="customer_name" class="col-sm-2 col-form-label">Customer name</label>
                  <div class="col-sm-10">
                      <select class="form-control" id="customer_id" v-model="form.customer_id" >
                          <option value="" selected disabled>------Select a Customer------</option>
                          <option v-for="(customer, index) in customers" :key="index" :value="customer.id" >{{customer.cus_name}}</option>
                      </select>
                    <!-- <has-error :form="form" field="category_name"></has-error> -->
                  </div>
                </div>
                <div class="form-group row">
                  <label for="resort_name" class="col-sm-2 col-form-label">Resort</label>
                  <div class="col-sm-10">
                                          <select class="form-control" id="resort_id" v-model="form.resort_id" >
                          <option value="" selected disabled>------Select a Resort------</option>
                          <option v-for="(resort, index) in resorts" :key="index" :value="resort.id" >{{resort.resort_name}}</option>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="category_name" class="col-sm-2 col-form-label">Start</label>
                  <div class="col-sm-10">
                    <input type="date"  v-model="form.category_name" class="form-control" name="category_name" id="category_name"  placeholder="Enter Category Name">
                    <!-- <has-error :form="form" field="category_name"></has-error> -->
                  </div>
                </div>
                <div class="form-group row">
                  <label for="category_name" class="col-sm-2 col-form-label">End Date</label>
                  <div class="col-sm-10">
                    <input type="date"  v-model="form.category_name" class="form-control" name="category_name" id="category_name"  placeholder="Enter Category Name">
                    <!-- <has-error :form="form" field="category_name"></has-error> -->
                  </div>
                </div>
          
               
                <div class="form-group row">
             
                  <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                  </div>
                </div>
        </form>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            form:{
               category_name: null, 
               category_description: null, 
               publication_status: null, 
            },
            customers:[],
            resorts:[],
            errors:{}
        }
    },
    methods:{
        booking_add(){
              axios.post('/reservation',this.form)
          .then(()=>{
              this.$router.push({name: 'reservation'})
            //   Notification.success()
          })
          .catch(error=> this.errors =error.response.data.error)
        },
        allCustomer(){
          axios.get('customer')
            .then(res=>{
                this.customers = res.data;
                console.log(res);
            })
        },
        allResort(){
           axios.get('resort')
            .then(res=>{
                this.resorts = res.data;
                console.log(res);
            })
        },
    },
    mounted() {
      this.allCustomer();
      this.allResort();
    },

}
</script>