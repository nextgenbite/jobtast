<template>
  <div class="containter">
    <div class="row">
    <div class="col-md-3" v-for="(resort, index) in resorts.data" :key="index">
      <div class="card" >
        <img :src="'http://localhost:8000/'+resort.resort_image" class="card-img-top" id="imgH"  alt="..." />
        <div class="card-body">
          <h5 class="card-title">{{resort.resort_name}}</h5>
          <p class="card-text">
            {{resort.resort_location}}
          </p>
        </div>
        <div class="card-footer">
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
                     
                            <h5  class="modal-title text-success" >Book</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                         <div class="modal-body">
                                <div class="form-group">
                                    <label for="resort_name">Customer Name</label>
                                    <input type="text" name="resort_name" class="form-control" id="resort_name" v-model="form.resort_name" :class="{ 'is-invalid': form.errors.has('resort_name') }" >
                                     <div v-if="form.errors.has('resort_name')" v-html="form.errors.get('resort_name')" />
                                </div>
                                     
                                   <div class="form-group">
                                    <label for="resort_short_description">Customer Email</label>
                                    <input type="email" name="resort_name" class="form-control" id="resort_name" v-model="form.resort_name" :class="{ 'is-invalid': form.errors.has('resort_name') }" >
                                   <div v-if="form.errors.has('resort_location')" v-html="form.errors.get('resort_location')" />
                                </div>
                                   <div class="form-group">
                                    <label for="resort_short_description">Customer Phone</label>
                                    <input type="tel" name="resort_name" class="form-control" id="resort_name" v-model="form.resort_name" :class="{ 'is-invalid': form.errors.has('resort_name') }" >
                                   <div v-if="form.errors.has('resort_location')" v-html="form.errors.get('resort_location')" />
                                </div>
                                   <div class="form-group">
                                    <label for="resort_short_description">Book Start Date</label>
                                    <input type="date" name="resort_name" class="form-control" id="resort_name" v-model="form.resort_name" :class="{ 'is-invalid': form.errors.has('resort_name') }">
                                   <div v-if="form.errors.has('resort_location')" v-html="form.errors.get('resort_location')" />
                                </div>
                                   <div class="form-group">
                                    <label for="resort_short_description">Book End Date</label>
                                    <input type="date" name="resort_name" class="form-control" id="resort_name" v-model="form.resort_name" :class="{ 'is-invalid': form.errors.has('resort_name') }" placeholder="Enter resort name">
                                   <div v-if="form.errors.has('resort_location')" v-html="form.errors.get('resort_location')" />
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
                resort_name: '',
                resort_location: '',
                resort_image: '',
                status: '',
                
            }),
    resorts:[],
  }
},
methods: {
  BookModal(resort){
           this.form.reset();
              $('#resort_modal').modal('show')
  },
  resort_update(){
            this.form.put("resort/"+this.form.id)
            .then(response =>{
                this.allresorts();
                $('#resort_modal').modal('hide')
               
            })
              
        },
   allresorts(){
            axios.get('resort')
            .then(res=>{
                this.resorts = res.data;
                console.log(res);
            })
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