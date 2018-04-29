<template>
    <div class="afterApp">
        <Navbar/>

        <router-view></router-view>


    </div>
</template>
<script>
    import Navbar from './components/Navbar';
    export default {
        components: {
            Navbar,
        },
    };
</script>
