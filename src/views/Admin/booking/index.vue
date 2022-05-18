<template>
    <div>
        <h2 class="text-center mb-3">All Categories</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Description</th>
                    <th scope="col">publication status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="category, index in categories" v-bind:key="category.id" >
                    <th scope="row">{{index+1}}</th>
                    <td>{{category.category_name}}</td>
                    <td>{{category.category_description}}</td>
                    <td >{{category.publication_status}}</td>
                    <td>
                        <div class="btn-group">
                            <router-link :to="{name: 'edit-category', params:{id: category.id}}" class="btn btn-outline-warning">Edit</router-link>
                            <button @click="deleteCategory(category.id)" class="btn btn-outline-danger">Delete</button>
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
            categories:[]
        }
    },
    methods: {
        AllCategories(){
            axios.get('category')
            .then(res=>{
                this.categories = res.data
            })
        },
        deleteCategory(id){
           axios.delete('category/'+id)
           .then(res=>{
               this.AllCategories();
                this.$router.push({name: 'category'})
           }) 
        }
    },
    mounted() {
        this.AllCategories();
    },
}
</script>