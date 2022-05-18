<template>
    <div>
         <div class="btn btn-outline-success float-right" @click="addProductModal">Add Product</div>
        <table class="table table-border table-hover">
           <thead>
               <tr>
                   <th>Id</th>
                   <th>Product name</th>
                   <th>Product category</th>
                   <th>Product short description</th>
                   <th>Product price</th>
                   <th>Product image</th>
                   <th>Created at</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
               <tr v-for="(product, index) in products.data" :key="index">
                   <td scope="row">{{product.id}}</td>
                   <td>{{product.product_name}}</td>
                   <td>{{product.category_id}}</td>
                   <td>{{product.product_short_description}}</td>
                   <td>{{product.product_price}} TK</td>
                   <td>
                        <img  :src="'http://localhost/E-commerce/Laravel-8-Rest-API-with-Passport/public/uploads/product_images/'+product.product_image" id="p_photo" class="img-fluid"/>
                   </td>
                   <td>{{product.created_at}}</td>
                   <td>
                       <div class="btn-gorup">
                           <!-- <div @click="editProductModal(product)" class="btn btn-outline-warning">Edit</div>
                           <div @click="product_delete(product.id)" class="btn btn-outline-danger">Del</div> -->
                       </div>
                   </td>
               </tr>
           </tbody>
       </table>
       <Pagination :data="products" @pagination-change-page="getResults" />
   <!--Product Modal -->
        <div class="modal fade" id="product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                     <form @submit.prevent="product_add" @keydown="form.onKeydown($event)">
                           <div class="modal-header">
                            <h5  class="modal-title text-success" >Product Add</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                         <div class="modal-body">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="product_name" v-model="form.product_name" :class="{ 'is-invalid': form.errors.has('product_name') }" placeholder="Enter Product name">
                                     <div v-if="form.errors.has('product_name')" v-html="form.errors.get('product_name')" />
                                </div>
                                     <div class="form-group">
                                    <label for="category_id">Product Category</label>
                                    <select class="form-control" id="category_id" v-model="form.category_id" :class="{ 'is-invalid': form.errors.has('category_id') }">
                                        <option value="">------Select a Category------</option>
                                        <option v-for="(category, index) in categories" :key="index" :value="category.id" >{{category.category_name}}</option>
                                    </select>
                                    <div v-if="form.errors.has('category_id')" v-html="form.errors.get('product_long_description')" />
                                </div>
                                   <div class="form-group">
                                    <label for="product_short_description">Product short description</label>
                                    <textarea name="product_short_description" id="product_short_description" v-model="form.product_short_description" :class="{ 'is-invalid': form.errors.has('product_short_description') }" cols="30" rows="2" class="form-control" placeholder="Product short description"></textarea>
                                   <div v-if="form.errors.has('product_short_description')" v-html="form.errors.get('product_short_description')" />
                                </div>
                                <div class="form-group">
                                    <label for="product_long_description">Product long description</label>
                                    <textarea name="product_long_description" id="product_long_description" v-model="form.product_long_description" :class="{ 'is-invalid': form.errors.has('product_long_description') }" cols="30" rows="4" class="form-control" placeholder="Product long description"></textarea>
                                    
                                    <div v-if="form.errors.has('product_long_description')" v-html="form.errors.get('product_long_description')" />
                                </div>
                                <div class="form-group">
                                    <label for="product_price">Product Price</label>
                                    <input type="number" name="product_price" id="product_price" v-model="form.product_price" :class="{ 'is-invalid': form.errors.has('product_price') }" placeholder="Product Price" class="form-control">                                    
                                    <div class="text-danger" v-if="form.errors.has('product_price')" v-html="form.errors.get('product_price')" />
                                </div>
                  <div class="form-group">
                                    <label for="product_image">Product Image</label><br>
                                    <!-- <img :src="form.product_image" alt="" class="img-fluid"> -->
                                    <img :src="form.product_image" alt="" class="img-fluid">
                                    <div v-if="!form.product_image" class="custom-file">
                                        <input type="file" @change="FileChangeEvent" class="custom-file-input" id="product_image">
                                        <label class="custom-file-label" for="product_image">Choose file...</label>
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
                        <input class="form-check-input" v-model="form.publication_status" :class="{ 'is-invalid': form.errors.has('publication_status') }" type="radio" name="publication_status" id="publication_status" value="1" checked>
                             <div class="text-danger" v-if="form.errors.has('publication_status')" v-html="form.errors.get('product_price')" />
                        <label class="form-check-label"  for="publication_status">
                         Publicshed
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" v-model="form.publication_status" type="radio" name="publication_status" :class="{ 'is-invalid': form.errors.has('publication_status') }" id="unpublished" value="0">
                      <div class="text-danger" v-if="form.errors.has('publication_status')" v-html="form.errors.get('product_price')" />
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
                            <!-- <button v-if="editMode" type="submit" class="btn btn-primary">Product Update</button> -->
                            <button type="submit" :disabled="form.busy" class="btn btn-primary">Product Add</button>
                        </div>
 
</form>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import Form from 'vform'
import LaravelVuePagination from 'laravel-vue-pagination';
export default {
    data() {
        return {
         products:{},
         categories:[],
         form: new Form({
                 id:'',
                product_name: '',
                category_id: '',
                product_short_description: '',
                product_long_description: '',
                product_price: '',
                product_image: '',
                publication_status: '',
            })   
        }
    },
    components: {
        'Pagination': LaravelVuePagination
    },
    methods:{
        allProducts(){
            axios.get('products')
            .then(res=>{
                this.products = res.data;
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
                    this.form.product_image = reader.result
                   
                }
                reader.readAsDataURL(file);   
            }else{
               alert('file is more than 2mb')
            }
            
        },
         RemoveImage(){
            this.imageUpdateMode = false;
            this.form.product_image = '';
        },

            // Our method to GET results from a Laravel endpoint
        getResults(page = 1) {
            axios.get('products?page=' + page)
                .then(response => {
                    this.products = response.data;
                });
        },
         addProductModal(){
            //  this.editMode = false;
              this.form.reset();
              $('#product_modal').modal('show')
        },
          product_add(){
            this.form.post('products')
            .then(response =>{
                this.allProducts();
                $('#product_modal').modal('hide')
               
            })
        },
        all_categories(){
             axios.get('category')
            .then(response =>{
                // handle success
                this.categories = response.data;
                console.log(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },
    
    },
    created() {
        this.allProducts();
        // Fetch initial results
        this.getResults();
        this.all_categories();
    },
}
</script>
<style>
#p_photo{
    height: 80px;
    width: 80px;
}
</style>