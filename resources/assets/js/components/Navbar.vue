<template>
    <nav class="navbar is-transparent is-fixed-top">
        <div class="container">

            <div class="navbar-brand">
                <router-link :to="{name: 'root'}" class="navbar-item">
                    <img src="https://www.i-vet.com.au/wp-content/uploads/2015/08/FF_I-Vet_LO.png" alt="Bulma: a modern CSS framework based on Flexbox" width="129" height="35">
                </router-link>

                <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div id="navbarExampleTransparentExample" class="navbar-menu">
                <div class="navbar-start">
                    <router-link class="navbar-item" :to="{name: 'root'}"><b-icon icon="home"></b-icon>&nbsp;Home</router-link>
                    <div class="navbar-item">
                        <NavbarSearch />
                    </div>
                </div>
                <div class="navbar-end">
                    <router-link :to="{name: 'cabinet', params: {id: $user.cabinet_id}}" class="navbar-item"><b-icon icon="hospital-building"></b-icon>&nbsp; My cabinet</router-link>
                    <router-link :to="{name: 'mypets'}" class="navbar-item"><b-icon pack="fa" icon="paw"></b-icon>&nbsp; My pets</router-link>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="/documentation/overview/start/">
                            Salut, {{$user.first_name}}
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            <router-link :to="{name: 'profile', params: { username: $user.username }}" class="navbar-item"><b-icon icon="account"></b-icon>&nbsp; Profile</router-link>
                            <router-link :to="{name: 'dashboard'}" class="navbar-item"><b-icon icon="view-dashboard"></b-icon>&nbsp; Dashboard</router-link>
                            <hr class="navbar-divider">
                            <router-link :to="{name: 'settings'}" class="navbar-item"><b-icon pack="fa" icon="cog"></b-icon>&nbsp; Settings</router-link>
                            <a type="submit" @click="logout" class="navbar-item"><b-icon icon="logout"></b-icon>&nbsp; Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
    import NavbarSearch from './NavbarSearch';
    export default {
        methods: {
            logout() {
                axios.post('/logout').then(() => location.reload()).catch(() => location.reload());
            },
        },
        components: {NavbarSearch}
    };
</script>

<style scoped>

    .navbar {
        box-shadow: 0 0 1px 1px rgba(20,23,28,.1), 0 3px 1px 0 rgba(20,23,28,.1);
    }
    
</style>
