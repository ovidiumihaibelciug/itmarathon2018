<template>
    <div class="doctor-box">
        <div class="box doctor-img" :style="{ backgroundImage: 'url(' + 'http://www.nationalheartinstitute.com/images/doctor-img4.jpg' + ')' }"></div>
        <div class="doctor-fullname"><router-link :to="{ name: 'profile', params: { username: user.username} }">{{ user.first_name + " " + user.last_name }}</router-link></div>        
    </div>
</template>

<script>
    export default {
        props: ['user'],
    }
</script>

<style scoped>

</style>