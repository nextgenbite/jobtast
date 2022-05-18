<template>
  <div class="card m-t-270 m-auto w-50">
    <div class="card-header text-center"><h4>Register </h4></div>
    <div class="card-body">

  <div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" v-model="form.name" placeholder="Enter Name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="form.email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" v-model="form.password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm</label>
    <input type="password" class="form-control" id="exampleInputPassword1" v-model="form.c_password" placeholder="Password">
  </div>
 <br>
  <button type="submit"  @click="userInsert()" class="btn btn-primary">Sign UP</button>

   
    </div>
  </div>
</template>
<script>
export default {
    data() {
        return {
            form:{
                name: null,
                email: null,
                password: null,
            }
        }
    },
    methods:{
        register(){
    axios.post('/register', {
    name: this.form.name,
    email: this.form.email,
    password: this.form.password
  })
  .then(function (response) {
       localStorage.setItem('AToken',response.data.data.token)
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
        },
        userInsert(){
        axios.post('register',this.form)
        .then((response)=>{
             localStorage.setItem('AToken',response.data.data.token)
            this.$router.push({name: 'home'})
            
        })
        .catch(error=> this.errors =error.response.data.errors)

    }
    },
     mounted() {
        let token = localStorage.getItem('AToken');
        if(!token){
            this.$router.push('/login')
        }
    },
}
</script>