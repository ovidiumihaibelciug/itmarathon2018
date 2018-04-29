<template>
    <div class="container">
        <b-field label="Name">
            <b-input type="text" icon="account" is-required v-model="name" maxlength="30" required></b-input>
        </b-field>
       <b-field label="Description">
            <b-input type="textarea"  maxlength="1000" v-model="description" required></b-input>
        </b-field>
        <b-field label="Location">
            <b-input type="text" icon="pin" required v-model="location" maxlength="30"></b-input>
        </b-field>
        <button class="button is-fullwidth is-primary" @click="addCabinet">Add cabinet</button>
    </div>
</template>

<script>
    import { API } from "../config";

    export default {
        name: "AddCabinet",
        data: function(){
            return {
                name: '',
                description: '',
                location: ''
            }
        },
        methods: {
            addCabinet(){
                
                const { name, description, location, price } = this;
                axios.post(API + 'cabinet',{ name, description, location, price }).then(({ data }) => {
                    if(data.success) {
                        this.$toast.open({
                            message: "Congratulations!" + name + " added successfully! ",
                            type: 'is-success'
                        });
                    } else {
                        this.$toast.open({
                            message: "Something went wrong :( ",
                            type: 'is-danger'
                        });
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>