<template>
    <figure class="image is-64x64">
        <img class="pet-image" v-if="pet.type === 'dog'" src="images/dog.png" alt="Image">
        <img class="pet-image" v-if="pet.type === 'cat'" src="images/cat.png" alt="Image">
        <img class="pet-image" v-if="pet.type === 'fish'" src="images/fish.png" alt="Image">
        <img class="pet-image" v-if="pet.type === 'elephant'" src="images/elephant.png" alt="Image">
        <img class="pet-image" v-if="pet.type === 'chicken'" src="images/chicken.png" alt="Image">
        <img class="pet-image" v-if="pet.type === 'horse'" src="images/horse.png" alt="Image">
        <img class="pet-image" v-if="pet.type === 'parrot'" src="images/parrot.png" alt="Image">
        <img class="pet-image" v-if="pet.type === 'hamster'" src="images/hamster.png" alt="Image">
        <img class="pet-image" v-if="pet.type === 'else'" src="images/else.png" alt="Image">
    </figure>
</template>

<script>
    export default {
        props: ['pet'],
    }
</script>