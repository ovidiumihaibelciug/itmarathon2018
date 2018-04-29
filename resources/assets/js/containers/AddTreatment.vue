<template>
    <div class="container">
        <b-field label="Name">
            <b-input type="text" icon="account" is-required v-model="name" maxlength="30" required></b-input>
        </b-field>
        <b-field label="Description">
            <b-input type="textarea" required  maxlength="1000" v-model="description"></b-input>
        </b-field>

        <b-field label="Price">
            <b-input icon="currency-usd" type="number" required  maxlength="9" v-model="price"></b-input>
        </b-field>

        <b-field label="Icon">
            <b-select v-model="icon" expanded placeholder="Select a icon" required>
                <option value="hospital">hospital</option>
                <option value="hospital-building">hospital-building</option>
                <option value="hospital-marker">hospital-marker</option>
                <option value="account-heart">account-heart</option>
                <option value="cards-heart">cards-heart</option>
                <option value="heart-box">heart-box</option>
                <option value="heart-pulse">heart-pulse</option>
                <option value="home-heart">home-heart</option>
            </b-select>
        </b-field>

        <button class="button is-fullwidth is-primary" @click="addTreatment">Add Treatment</button>
    </div>
</template>

<script>
    import { API } from "../config";

    export default {
        name: "AddTreatment",
        data: function(){
            return {
                name: '',
                description: '',
                number: '',
                icon: '',
                price: ''
            }
        },
        methods: {
            addTreatment(){
                const { name, description, icon, price } = this;
                axios.post(API + 'treatment', { name, description, icon,  price }).then(({ data }) => {
                    if(data.success) {
                         this.$toast.open({
                            message: "Congratulations!" + name + " added successfully! ",
                            type: 'is-success'
                        })
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>