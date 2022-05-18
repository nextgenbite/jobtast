<template>
     <div>
        <h2 class="text-center mb-3">Update Customer</h2>
         <form @submit.prevent="customerUpdate()">
                <div class="form-group row">
                  <label for="customer_name" class="col-sm-2 col-form-label">Customer name</label>
                  <div class="col-sm-10">
                    <input type="text"  v-model="form.cus_name" class="form-control"   placeholder="Enter Customer Name">
                    <!-- <has-error :form="form" field="customer_name"></has-error> -->
                  </div>
                </div>
                <div class="form-group row">
                  <label for="customer_name" class="col-sm-2 col-form-label">Customer Email</label>
                  <div class="col-sm-10">
                    <input type="email"  v-model="form.cus_email" class="form-control"   placeholder="Enter Customer Email">
                    <!-- <has-error :form="form" field="customer_name"></has-error> -->
                  </div>
                </div>
                <div class="form-group row">
                  <label for="customer_name" class="col-sm-2 col-form-label">Customer Phone</label>
                  <div class="col-sm-10">
                    <input type="number"  v-model="form.cus_phone" class="form-control"   placeholder="Enter Customer Phone">
                    <!-- <has-error :form="form" field="customer_name"></has-error> -->
                  </div>
                </div>
                <div class="form-group row">
                  <label for="customer_name" class="col-sm-2 col-form-label">Customer Address</label>
                  <div class="col-sm-10">
                    <input type="text"  v-model="form.cus_address" class="form-control"   placeholder="Enter customer Name">
                    <!-- <has-error :form="form" field="customer_name"></has-error> -->
                  </div>
                </div>
                <div class="form-group row">
                  <label for="customer_name" class="col-sm-2 col-form-label">Customer Photo</label>
                  <div class="col-sm-10">
                     <img :src=" 'http://localhost:8000/'+form.cus_image" alt="" class="img-fluid">
                                    <div class="custom-file">
                                        <input type="file" @change="FileChangeEvent" class="custom-file-input" id="cus_image">
                                        <label class="custom-file-label" for="cus_image">Choose file...</label>
                                    </div>
                                    <!-- <div v-else>
                                        <button @click="RemoveImage" type="button" class="btn btn-outline-warning mt-2">Remove image</button>
                                    </div> -->
              
                    <!-- <has-error :form="form" field="customer_name"></has-error> -->
                  </div>
                </div>
                <fieldset class="form-group">
                  <div class="row">
                    <label class="col-form-label col-sm-2 pt-0">Radios</label>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" v-model="form.publication_status"  type="radio" name="publication_status" id="publication_status" value="1" checked>
                        <!-- <has-error :form="form" field="publication_status"></has-error> -->
                        <label class="form-check-label"  for="publication_status">
                         Published
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" v-model="form.publication_status" type="radio" name="publication_status"  id="unpublished" value="0">
                        <!-- <has-error :form="form" field="publication_status"></has-error> -->
                        <label class="form-check-label" for="unpublished">
                         Unpublished
                        </label>
                      </div>
                    </div>
                  </div>
                </fieldset>
               
                <div class="form-group row">
                  <div class="col-sm-2">
                   
                  </div>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Customer</button>
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
          imageUpdateMode: false,
            form:{
               cus_name: null, 
               cus_email: null, 
               cus_phone: null, 
               cus_address: null, 
               cus_address: null, 
               cus_image: null,  
                
            },
            errors:{}
        }
    },
    methods:{
            onFileSelected(event){
           this.imageUpdateMode = false;
     let file = event.target.files[0];
     if (file.size > 1048770) {
      console.log('file is greater than 1mb')
     }else{
      let reader = new FileReader();
      reader.onload = event =>{
        this.form.cus_image = event.target.result
        console.log(event.target.result);
      };
      reader.readAsDataURL(file);
     }

    },
        customerUpdate(){
             let id = this.$route.params.id
              axios.patch('customer/'+id,this.form)
          .then(()=>{
              this.$router.push({name: 'customer'})
            //   Notification.success()
          })
          .catch(error=> this.errors =error.response.data.error)
        },
        editCustomer(){
            
           let id = this.$route.params.id
            axios.get('customer/'+id)
            .then(({data}) => (this.form = data
            
            ))
            .catch(console.log('error'))
        },
    },
    created(){
       this.editCustomer()
    }
}
</script>