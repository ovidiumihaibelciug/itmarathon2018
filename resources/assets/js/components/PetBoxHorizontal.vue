<template>
    <div class="box pet-box" v-if="!isDeleted" :style="{padding: '1em'}">
        <article class="media" :style="{borderTop: 0, padding: 0}">
            <div class="media-left">
                <PetImage :pet="pet"/>
            </div>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>{{pet.name}}</strong> <small>31m </small><span style="float:right"><b-icon :icon="'gender-'+ (pet.sex == 0 ? 'm' : 'fem') +'ale'"></b-icon></span>
                        <br>
                        {{pet.description}}
                    </p>
                    <router-link v-if="$route.name !== 'petProfile'" class="button is-small" style="width: 200px;" :to="{name: 'petProfile', params: { id: pet.id }}">View profile</router-link>
                    <button v-if="pet.user_id === $user.id" @click="dp(pet)" class="button is-small is-danger" style="float: right;">Delete pet profile</button>
                </div>
            </div>
        </article>
    </div>
</template>

<script>
    import PetImage from "./PetImage";
    import {API} from "../config";
    export default {
        props: ['pet', 'small'],
        data: function() {
            return {
                isDeleted: false,
            };
        },
        methods: {
            dp(pet) {
                this.$dialog.confirm({
                    title: 'Privacy Politics',
                    message: `Are you sure you want to delete this pet.`,
                    cancelText: 'Not really',
                    confirmText: 'Of course',
                    type: 'is-danger',
                    hasIcon: true,
                    onConfirm: () => {
                        axios.delete(API + 'pet/' + pet.id)
                            .then(() => {
                                this.$toast.open({
                                    message: 'Pet deleted!',
                                    type: 'is-danger'
                                });
                                this.isDeleted = true;
                            });
                    }
                });
            },
        },
        name: "PetBoxHorizontal",
        components: {PetImage},
    };
</script>

<style scoped>

</style>