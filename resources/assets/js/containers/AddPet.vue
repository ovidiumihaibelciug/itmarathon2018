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
            <b-select expanded icon="contrast-circle">
                <option :value="0">Mascul</option>
                <option :value="1">Femela</option>
            </b-select>
        </b-field>
        <b-field label="Type">
            <b-select expanded icon="format-list-bulleted-type">
                <option value="dog">Doog</option>
                <option value="cat">Cat</option>
                <option value="parrot">Parrot</option>
                <option value="hamster">Hamster</option>
                <option value="altceva">Altceva...</option>
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
                name: '',
                birthday: new Date(),
                description: '',
                type: null,
                waist: '',
                observations: '',
                sex: 0,
            }
        },
        methods: {
            addPet(){
                const { birthday, description, type, sex, waist, observations } = this;
                axios.post(API + 'pet', { birthday, description, type, sex, waist, observations }).then(({ data }) => {

                });
            }
        }
    }
</script>

<style scoped>

</style>