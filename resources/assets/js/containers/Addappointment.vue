<template>
    <div class="container">
        <b-field label="Select a date" required>
            <b-datepicker
                v-model="date"
                placeholder="Click to select..."
                icon="calendar-today"
                required
                >
            </b-datepicker>
        </b-field>

        <b-field label="Description"
                v-model="description"                    
        >
            <b-input type="textarea"  maxlength="1000" v-model="description" required></b-input>
        </b-field>

        <b-field label="Select a pet">
            <b-select v-model="pet" placeholder="Select a pet" expanded required>
                <option
                    v-for="option in pets"
                    :value="option.id"
                    :key="option.id">
                    {{ option.name }}
                </option>
            </b-select>
        </b-field>
        <b-field label="Select a treatment">
            <b-select v-model="service" placeholder="Select a treatment" expanded required>
                <option
                    v-for="option in services"
                    :value="option.id"
                    :key="option.id">
                    {{ option.name }}
                </option>
            </b-select>
        </b-field>

        <button class="button is-fullwidth is-primary" @click="addAppointment">Add Appointment</button>
    </div>
</template>

<script>
    import { API } from "../config";

    export default {
        name: "AddAppointment",
        mounted(){
            axios.get(API + 'services/' + this.$route.params.cabinet)
                .then(res => {
                    this.services = res.data.services;
                    console.log(this.services);
                })
                .catch(err => console.log(err));
            axios.get(API + 'pet/' + this.$user.username)
                .then(res => {
                    this.pets = res.data.pet;
                    console.log(this.pets);
                })
                .catch(err => console.log(err));  
        },
        data: function(){
            return {
                date: '',
                description: '',
                service: '',
                pet: '',
                services: {},
                pets: {}
            }
        },
        methods: {
            addAppointment(){              
                const { date, description, service, pet } = this;
                const cabinet = this.$route.params.cabinet;
                axios.post(API + 'appointment/add',{ date, description, service, pet, cabinet }).then(({ data }) => {
                    if(data.success) {
                        this.$toast.open({
                            message: "Congratulations! Appointment added successfully! ",
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