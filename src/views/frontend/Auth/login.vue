<template>
  <div class="card m-t-270 m-auto w-50">
    <div class="card-header text-center"><h4>Login</h4></div>
    <div class="card-body">
      <h6>email   : admin@gmail.com</h6>
      <h6>password: password</h6>
        <div class="form-group">
          <label class="exampleInputEmail1"  for="email">Email</label>
          <input class="form-control" placeholder="admin@gmail.com" v-model="form.email" type="text" />
        </div>
        <div class="form-group">
          <label class="exampleInputEmail1" for="password">Password</label>
          <input class="form-control" placeholder="password" v-model="form.password" type="password" />
        </div>
        <div class="form-group">
          <input class="btn btn-primary" @click="userInsert" type="submit" />
        </div>

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

        userInsert(){
        axios.post('/login',this.form)
        .then((response)=>{
             localStorage.setItem('AToken',response.data.data.token)
            this.$router.push({name: 'dashboard'})
            
        })
        .catch(error=> this.errors =error.response.data.errors)

    }
    },
     mounted() {
        var token = localStorage.getItem('AToken');
        if(token){
      
            this.$router.push({name: 'dashboard'})
        }
    },
}
</script>