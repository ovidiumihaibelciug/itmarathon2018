<template>
    <div>
        <div class="columns">
            <div class="">
                <Sidebar></Sidebar>
            </div>
            <div class="right-side">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
    import Sidebar from '../components/Sidebar.vue';
    export default {
        name: "Dashboard",
        components: {
            Sidebar
        }
    }
</script>

<style scoped>
    .columns {
        margin-top: 0 !important;
    }
    .column {
        padding-top: 0;
    }
    .right-side {
        width: 80% !important;
        margin-left: 17%;
    }
</style>