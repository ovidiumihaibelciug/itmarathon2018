<template>
    <div class="box pet-box">
        <article class="media">
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
                    <router-link class="button is-small" :to="{name: 'petProfile', params: { id: pet.id }}">View profile</router-link>
                </div>
            </div>
        </article>
    </div>
</template>

<script>
    import PetImage from "./PetImage";
    export default {
        props: ['pet'],
        name: "PetBoxHorizontal",
        components: {PetImage},

    }
</script>

<style scoped>

</style>