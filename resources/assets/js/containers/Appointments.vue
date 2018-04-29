<template>
  <section class="appointments-section">
      <div class="containter">
          <div v-for="(item, index) in appointments">
              <div class="appointment">
                  <div class="box">
                    <div class="title">
                        Appointment
                    </div>
                      <p>Date: {{ item.date }}</p>
                      <p>Description: {{ item.description }}</p>
                      <p>Pet: {{ item.pet_id }}</p>
                      <p>Treatment: {{ item.service_id }}</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
</template>

<script>
    import { API } from '../config';
    export default {
        name: "Appointments",
        mounted() {
            let cabinet = this.$user.cabinet_id;
            axios.get(API + 'appointment/get/' + cabinet )
            .then(res => {
                this.appointments = res.data.appointments;
            })
            .catch(err => console.log(err))
        },
        data() {
            return {
                appointments: []
            }
        }
    }
</script>