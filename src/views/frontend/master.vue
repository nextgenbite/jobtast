<template>
    <div>
        <navbar></navbar>
       <router-view/>
       
    </div>
</template>

<script>
import navbar from './navbar.vue'
export default {
    components:{
        navbar: navbar,
     
    }
}
</script>