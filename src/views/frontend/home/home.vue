<template>
  <div class="containter">
    <div class="row">
    <div class="col-md-3" v-for="resort in resorts" :key="resort.id">
      <div class="card" >
        <img :src="'http://localhost:8000/'+resort.resort_image" class="card-img-top" id="imgH"  alt="..." />
        <div class="card-body">
          <h5 class="card-title">{{resort.resort_name}}</h5>
          <p class="card-text">
            {{resort.resort_location}}
          </p>
        </div>
        <div class="card-footer">
           <!-- <router-link :to="{name: 'checkout', params:{id: resort.id}}" class="btn btn-outline-warning">Book Now</router-link> -->
         <div @click="BookModal(resort)" class="btn btn-outline-warning">Book Now</div>
        
      
        </div>
      </div>
</div>
</div>

  <!--checkout Modal -->
        <div class="modal fade" id="resort_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                     <form @submit.prevent="resort_update()">
                        <div class="modal-header">
                     
                            <h5  class="modal-title text-success" >New Reservation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                         <div class="modal-body">
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
                                 <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  type="submit" :disabled="form.busy" class="btn btn-primary">Book Now</button>
                        </div>
 
                    </form>
                </div>
            </div>
        </div>
    
  </div>
</template>
<script>
import Form from 'vform'
export default {
  data() {
  return {
    errors: {},
    form: new Form({
                 id: '',
                cus_name: null,
                cus_phone: null,
                cus_email: null,
                cus_address: null,
                start_date: null,
                end_date: null,
                status: '',
                
                
            }),
    resorts:[],
  }
},
methods: {
 
  resort_update(){
this.form.post("booking/"+this.form.id)
            .then(response =>{
                this.allresorts();
                $('#resort_modal').modal('hide')
               
            })
        
        },
   allresorts(){
            axios.get('getresort')
            .then(res=>{
                this.resorts = res.data;
                console.log(res);
            })
        },
         BookModal(resort){
             this.form.reset();
              $('#resort_modal').modal('show');
              this.form.fill(resort);
        },
},
mounted() {
  this.allresorts();
},
}
</script>
<style>
#imgH{
  max-height: 240px;
}
</style>