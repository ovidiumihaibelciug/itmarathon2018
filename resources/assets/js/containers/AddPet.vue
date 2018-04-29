<template>
    <div class="container">
        <b-field label="Name">
            <b-input type="text" icon="account" is-required v-model="name" maxlength="30"></b-input>
        </b-field>
        <b-field label="Birthay">
            <b-datepicker
                    placeholder="Click to select..."
                    v-model="birthday"
                    icon="calendar-today">
            </b-datepicker>
        </b-field>
        <b-field label="Description">
            <b-input maxlength="1000" type="textarea" is-required v-model="description" placeholder="Description..."></b-input>
        </b-field>
        <b-field label="Waist (cm)">
            <b-input min="10" max="300" type="number" is-required v-model="waist" placeholder="Waist"></b-input>
        </b-field>

        <b-field label="Sex">
            <b-select expanded icon="contrast-circle" v-model="sex">
                <option :value="0">Mascul</option>
                <option :value="1">Femela</option>
            </b-select>
        </b-field>
        <b-field label="Type">
            <b-select expanded icon="format-list-bulleted-type" v-model="type">
                <option value="dog">Doggo</option>
                <option value="cat">Catto</option>
                <option value="fish">Fish</option>
                <option value="elephant">Elephant</option>
                <option value="horse">Horse</option>
                <option value="chicken">Chicken</option>
                <option value="parrot">Parrot</option>
                <option value="hamster">Hamster</option>
                <option value="else">Something else...</option>
            </b-select>
        </b-field>
        <b-field label="Other observations">
            <b-input maxlength="1000" type="textarea" is-required v-model="description" placeholder="Other observations..."></b-input>
        </b-field>
        <button class="button is-fullwidth is-primary" @click="addPet">Add animal</button>
    </div>
</template>

<script>
    import { API } from "../config";

    export default {
        name: "AddPet",
        data: function(){
            return {
                name: 'Castravecior',
                birthday: new Date(),
                description: 'Stecher',
                type: 'cat',
                waist: 1234,
                observations: 'S-a cacat din cer',
                sex: 0,
            }
        },
        methods: {
            addPet(){
                const { name, birthday, description, type, sex, waist, observations } = this;
                axios.post(API + 'pet', { name, birthday, description, type, sex, waist, observations }).then(({ data }) => {
                    if(data.success) {
                        this.$router.push({ name: 'mypets' });
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>