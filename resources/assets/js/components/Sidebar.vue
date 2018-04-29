<template>
    <aside class="menu">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a>Dashboard</a></li>
        </ul>

        <!-- //v-if="$user.role===3" -->
        <p class="menu-label"> 
            Manage cabinet
        </p>
        <ul class="menu-list">
            <li><router-link :to="{name: 'addcabinet'}">Add Cabinet {{ $user.cabinet_id ? "(disabled)" : "" }}</router-link></li>
            <li><router-link :to="{name: 'addtreatment'}">Add Treatment</router-link></li>
        </ul>
    </aside>
</template>

<script>
    export default {
        name: "Sidebar"
    }
</script>

<style scoped>
    aside {
        background-color: white;
        padding-top: 10px; 
        padding-left: 20px;
        padding-right: 10px;
        width: 15%;
    }
    .menu {
        height: 100vh;
        position: fixed;
    }

    .active-label {
        background: rgba(0,0,0, .1);
    }

</style>
