<template>
    <div class="card col-md-8 offset-2">
       <form @submit.prevent="AddBookig()">
                       
                     
                            <h5  class="text-success card-header" >New Reservation</h5>
                            
                       

                         <div class="card-body">
                                <div class="form-group">
                                    <label for="cus_name">Customer Name</label>
                                    <input type="text" name="cus_name" class="form-control" id="cus_name" v-model="form.cus_name" :class="{ 'is-invalid': form.errors.has('cus_name') }" >
                                     <div v-if="form.errors.has('cus_name')" v-html="form.errors.get('cus_name')" />
                                </div>
                                     
                                   <div class="form-group">
                                    <label for="cus_email">Customer Email</label>
                                    <input type="email" name="cus_email" class="form-control" id="cus_email" v-model="form.cus_email" :class="{ 'is-invalid': form.errors.has('cus_email') }" >
                                   <div v-if="form.errors.has('cus_email')" v-html="form.errors.get('cus_email')" />
                                </div>
                                   <div class="form-group">
                                    <label for="cus_phone">Customer Phone</label>
                                    <input type="tel" name="cus_phone" class="form-control" id="cus_phone" v-model="form.cus_phone" :class="{ 'is-invalid': form.errors.has('cus_phone') }" >
                                   <div v-if="form.errors.has('cus_phone')" v-html="form.errors.get('cus_phone')" />
                                </div>
                                   <div class="form-group">
                                    <label for="cus_phone">Customer Address</label>
                                    <input type="test" name="cus_address" class="form-control" id="cus_address" v-model="form.cus_address" :class="{ 'is-invalid': form.errors.has('cus_address') }" >
                                   <div v-if="form.errors.has('cus_address')" v-html="form.errors.get('suc_address')" />
                                </div>
                                   <div class="form-group">
                                    <label for="start_datend_date">Book Start Date</label>
                                    <input type="date" name="start_date" class="form-control" id="start_date" v-model="form.start_date" :class="{ 'is-invalid': form.errors.has('start_date') }">
                                   <div v-if="form.errors.has('start_date')" v-html="form.errors.get('start_date')" />
                                </div>
                                   <div class="form-group">
                                    <label for="end_date">Book End Date</label>
                                    <input type="date" name="end_date" class="form-control" id="end_date" v-model="form.end_date" :class="{ 'is-invalid': form.errors.has('end_date') }" >
                                   <div v-if="form.errors.has('end_date')" v-html="form.errors.get('end_date')" />
                                </div>
                                </div>
                                 <div class="card-footer">
                   
                            <button  type="submit" :disabled="form.busy" class="btn btn-primary">Book Now</button>
                        </div>
 
                    </form> 
    </div>
</template>

<script>
import Form from 'vform'
export default {
  data() {
  return {
    errors: {},
    form: new Form({
                
                cus_name: null,
                cus_phone: null,
                cus_email: null,
                cus_address: null,
                start_date: null,
                end_date: null,
                
            }),
  }
},
methods: {
 
   AddBookig(){
  	  let id = this.$route.params.id
       axios.post('/booking/'+id,this.form)
       .then(() => {
        this.$router.push({ name: 'home'})
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  
},

}
</script>
