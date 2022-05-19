<template>
    <div>        
      <div class="card">
          <div class="card-header"><div class="btn btn-outline-success float-right" @click="addresortModal">Add Resort</div>
         <br></div>
            <table class="table table-border table-hover" id="example1">
           <thead>
               <tr>
                   <th>Id</th>
                   <th>Resort name</th>
                   <th>Resort Location</th>
                   <th>Resort image</th>
                   <th>Resort Status</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
               <tr v-for="resort in resorts" :key="resort.id">
                   <td scope="row">{{resort.id}}</td>
                   <td>{{resort.resort_name}}</td>
                   <td>{{resort.resort_location}}</td>
                   <td>
                        <span class="badge badge-success" v-if="resort.status == 1">Active</span>
                        <span v-else class="badge badge-danger">Inactive</span>
                   </td>
                   <td>
                        <img  :src="'http://localhost:8000/'+resort.resort_image" id="p_photo" class="img-fluid"/>
                   </td>
                   <td>
                       <div class="btn-gorup">
                           <div @click="editresortModal(resort)" class="btn btn-outline-warning">Edit</div>
                           <div @click="resort_delete(resort.id)" class="btn btn-outline-danger">Del</div>
                       </div>
                   </td>
               </tr>
           </tbody>
       </table>
      </div>
       <!-- <Pagination :data="resorts" @pagination-change-page="getResults" /> -->
   <!--resort Modal -->
        <div class="modal fade" id="resort_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                     <form @submit.prevent=" editMode ? resort_update() : resort_add()">
                        <div class="modal-header">
                            <h5 v-if="editMode" class="modal-title text-success" >Resort Update</h5>
                            <h5 v-else class="modal-title text-success" >Resort Add</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                         <div class="modal-body">
                                <div class="form-group">
                                    <label for="resort_name">Resort Name</label>
                                    <input type="text" name="resort_name" class="form-control" id="resort_name" v-model="form.resort_name" :class="{ 'is-invalid': form.errors.has('resort_name') }" placeholder="Enter resort name">
                                     <div v-if="form.errors.has('resort_name')" v-html="form.errors.get('resort_name')" />
                                </div>
                                     
                                   <div class="form-group">
                                    <label for="resort_short_description">Resort Location</label>
                                    <textarea name="resort_location" id="resort_location" v-model="form.resort_location" :class="{ 'is-invalid': form.errors.has('resort_short_description') }" cols="30" rows="2" class="form-control" placeholder="resort short description"></textarea>
                                   <div v-if="form.errors.has('resort_location')" v-html="form.errors.get('resort_location')" />
                                </div>
                                   <div class="form-group">
                                    <label for="resort_short_description">Resort Location</label>
                                    <textarea name="resort_location" id="resort_location" v-model="form.resort_location" :class="{ 'is-invalid': form.errors.has('resort_short_description') }" cols="30" rows="2" class="form-control" placeholder="resort short description"></textarea>
                                   <div v-if="form.errors.has('resort_location')" v-html="form.errors.get('resort_location')" />
                                </div>
                                
          
                  <div class="form-group">
                                    <label for="resort_image">resort Image</label><br>
                                    <!-- <img :src="form.resort_image" alt="" class="img-fluid"> -->
                                    <img :src="form.resort_image" alt="" class="img-fluid">
                                    <div v-if="!form.resort_image" class="custom-file">
                                        <input type="file" @change="FileChangeEvent" class="custom-file-input" id="resort_image">
                                        <label class="custom-file-label" for="resort_image">Choose file...</label>
                                    </div>
                                    <div v-else>
                                        <button @click="RemoveImage" type="button" class="btn btn-outline-warning mt-2">Remove image</button>
                                    </div>

                                </div>
                                <fieldset class="form-group">
                  <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" v-model="form.status" :class="{ 'is-invalid': form.errors.has('status') }" type="radio" name="status" id="status" value="1" checked>
                             <div class="text-danger" v-if="form.errors.has('status')" v-html="form.errors.get('resort_price')" />
                        <label class="form-check-label"  for="status">
                         Publicshed
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" v-model="form.status" type="radio" name="status" :class="{ 'is-invalid': form.errors.has('status') }" id="unpublished" value="0">
                      <div class="text-danger" v-if="form.errors.has('status')" v-html="form.errors.get('resort_price')" />
                        <label class="form-check-label" for="unpublished">
                         Unpublished
                        </label>
                      </div>
                    </div>
                  </div>
                </fieldset>
                                </div>
                                 <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button v-if="editMode" type="submit" class="btn btn-primary">Resort Update</button>
                            <button v-else type="submit" :disabled="form.busy" class="btn btn-primary">Resort Add</button>
                        </div>
 
</form>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import Form from 'vform'
// import LaravelVuePagination from 'laravel-vue-pagination';
export default {
    data() {
        return {
          editMode:false,
         imageUpdateMode: false,
         resorts:{},
        
         form: new Form({
                 id: '',
                resort_name: '',
                resort_location: '',
                resort_image: '',
                status: '',
                
            })   
        }
    },
    components: {
        // 'Pagination': LaravelVuePagination
    },
    methods:{
        allresorts(){
            axios.get('resort')
            .then(res=>{
                this.resorts = res.data;
                console.log(res);
            })
        },
           FileChangeEvent(e){
             this.imageUpdateMode = false;
            var file = e.target.files[0];
            const reader = new FileReader();
            // console.log(file['size']);
            if(file['size'] < 2097152 ){
                 reader.onload = ()=>{
                    this.form.resort_image = reader.result
                   
                }
                reader.readAsDataURL(file);   
            }else{
               alert('file is more than 2mb')
            }
            
        },
         RemoveImage(){
            this.imageUpdateMode = false;
            this.form.resort_image = '';
        },

            // Our method to GET results from a Laravel endpoint
        // getResults(page = 1) {
        //     axios.get('resort?page=' + page)
        //         .then(response => {
        //             this.resorts = response.data;
        //         });
        // },
         addresortModal(){
              this.editMode = false;
              this.form.reset();
              $('#resort_modal').modal('show')
        },
          resort_add(){
            this.form.post('resort')
            .then(response =>{
                this.allresorts();
                $('#resort_modal').modal('hide')
               
            })
        },
     
         editresortModal(resort){
            this.imageUpdateMode = true;
            this.editMode = true;
             $('#resort_modal').modal('show')
             this.form.fill(resort);
        },
        resort_update(){
            this.form.put("resort/"+this.form.id)
            .then(response =>{
                this.allresorts();
                $('#resort_modal').modal('hide')
               
            })
              
        },
        resort_delete(id){
                axios.delete("resort/"+id)
                .then(response =>{
                    this.allresorts();
                     
                })
        },
    
    },
    created() {
        this.allresorts();
        // Fetch initial results
        // this.getResults();
    },
}
</script>
<style>
#p_photo{
    height: 80px;
    width: 80px;
}
</style>