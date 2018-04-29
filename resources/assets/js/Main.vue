<template>
    <div class="afterApp">
        <Navbar/>

        <div style="margin-top: 10px"><router-view></router-view></div>


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
