<template>
    <section class="profile-section">
        <b-loading :is-full-page="true" :active.sync="isLoading"></b-loading>
        <div class="container">
            <div class="columns">
                <div class="column is-one-third">
                    <div class="box profile-user-box is-centered">
                        <div class="user-img is-centered" :style="{ backgroundImage: 'url(' + image + ')' }"></div>
                        <div class="user-fullname">{{ user.last_name + " "+ user.first_name }}</div>
                        <div class="user-email">{{ user.email }}</div>
                        <div class="user-description">{{ user.description ? user.description : "" }}</div>
                    </div>
                </div>
                <div class="column is-three-thirds">
                    <div v-if="pets">
                        <PetBoxHorizontal v-for="(pet, i) in pets" :pet="pets[i]" :key="i"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template> 

<script>
    import {API} from "../config";
    import PetBoxHorizontal from '../components/PetBoxHorizontal';

    export default {
        mounted() {
            this.getPets();
            this.getUser();
        },
        data: function() {
            return {
                image: "http://pluspng.com/img-png/user-png-icon-account-avatar-human-male-man-men-people-person-download-svg-download-png-edit-icon-512.png",
                isLoading: false,
                pets: [],
                user: {},
            }
        },
        watch: {
            '$route': function (){
                this.getPets();
                this.getUser();
            }
        },
        methods: {
            getUser() {
                axios.get(API + 'user/' + this.$route.params.username )
                    .then(({ data }) => {
                        this.user = data.user;
                        this.isLoading = false;
                    });
            },
            getPets() {
                this.isLoading = true;
                axios.get(API + 'pet/' + this.$route.params.username )
                    .then(({ data }) => {
                        this.pets = data.pet;
                        this.isLoading = false;
                    });
            },
        },
        components: {PetBoxHorizontal}
    }
</script>
