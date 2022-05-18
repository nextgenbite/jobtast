<template>
    <div>
        <h2>Logout is seccessfull</h2>
    </div>
</template>

<script>
export default {
    created(){
        localStorage.removeItem('AToken')
        this.$router.push({name: 'home'})
    }
}
</script>