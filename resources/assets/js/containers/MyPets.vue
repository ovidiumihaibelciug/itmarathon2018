<template>
    <div class="container">
        <router-link :to="{name: 'addpet'}" class="button">Add pet</router-link>
        <b-loading :is-full-page="true" :active.sync="isLoading" :canCancel="true"></b-loading>
        <div v-if="pets">
            <PetBoxHorizontal v-for="(pet, i) in pets" :pet="pets[i]" :key="i"/>
        </div>
    </div>
</template>

<script>
    import {API} from "../config";
    import PetBoxHorizontal from '../components/PetBoxHorizontal';
    export default {
        mounted() {
            this.getPets();
        },
        data: function() {
            return {
                isLoading: false,
                pets: [],
            };
        },
        methods: {
            getPets() {
                this.isLoading = true;
                axios.get(API + 'pet/' + this.$user.username )
                    .then(({ data }) => {

                        this.pets = data.pet;
                        this.isLoading = false;
                    });
            },
        },
        components: {PetBoxHorizontal}
    }
</script>