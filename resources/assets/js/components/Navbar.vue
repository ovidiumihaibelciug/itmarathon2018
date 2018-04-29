<template>
    <nav class="navbar is-transparent">
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
                    <a class="navbar-item" href="https://bulma.io/">

                    </a>
                </div>
                <div class="navbar-end">
                    <router-link :to="{name: 'mypets'}" class="navbar-item"><b-icon pack="fa" icon="paw"></b-icon>&nbsp; My pets</router-link>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="/documentation/overview/start/">
                            Salut, {{$user.first_name}}
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            <router-link :to="{name: 'profile'}" class="navbar-item"><b-icon pack="fa" icon="cog"></b-icon>&nbsp; Profile</router-link>
                            <router-link :to="{name: 'settings'}" class="navbar-item"><b-icon pack="fa" icon="cog"></b-icon>&nbsp; Settings</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
    export default {
        methods: {
            logout() {
                alert('Mars acasa');
            },
        },
    };
</script>