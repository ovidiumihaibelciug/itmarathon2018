<template>
    <section class="cabinet-section" style="margin-top: 70px">
        <b-loading :is-full-page="true" :active.sync="loading" :canCancel="true"></b-loading>
        <div class="container" v-if="!loading">
            <div class="columns">
                <div class="column is-one-third">
                    <div class="box cabinet-img" :style="{ backgroundImage: 'url(' + image + ')' }"></div>
                    <div class="box">
                        <h3 class="title-doctors">Doctors</h3>
                        <div>
                            <div v-for="(item, index) in cabinet._users">
                                <UserBox :user="item"/>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <h3 class="title-doctors">Schedule</h3>
                        <ul style="text-align: center;">
                            <li style="margin-top: 10px;" v-for="(day, index) in schedule" :key="index">{{day}}</li>
                        </ul>
                    </div>
                    <router-link :to="{ name: 'addappointment', params: {cabinet: cabinet.id} }" class="button is-primary is-medium is-fullwidth">
                        Apply
                    </router-link>

                </div>
                <div class="column is-three-thirds">
                    <div class="box">
                        <div class="cabinet-div cabinet-name">
                            {{ cabinet.name }}
                        </div>
                        <div class="cabinet-div cabinet-location">
                            {{ cabinet.description }}
                        </div>
                        <div class="cabinet-div cabinet-description">
                             <b-icon
                                icon="map-marker-radius"
                                size="is-small"
                                class="primary_color"
                                >
                            </b-icon> {{ cabinet.location }}
                        </div>
                    </div>
                    <div class="box">
                        <div class="services-section">
                            <div class="cabinet-div service-title">
                                Treatments
                            </div>
                            <div v-for="(item, index) in cabinet._services">
                                <div class="service-box">
                                    <b-collapse class="card" :open="false">
                                        <div slot="trigger" slot-scope="props" class="card-header">
                                            <p class="card-header-title">
                                                <b-icon
                                                    class="primary_color"
                                                    :icon="item.icon"
                                                >
                                                </b-icon>
                                                &nbsp;&nbsp;
                                                {{ item.name }}
 
                                            </p>
                                            <a class="card-header-icon">
                                                <div class="tag is-link is-pulled-right is-vcentered">
                                                    {{ item.price }} $
                                                </div>
                                                &nbsp;
                                                &nbsp;                                                
                                                &nbsp;
                                                <b-icon
                                                    :icon="props.open ? 'menu-down' : 'menu-up'">
                                                </b-icon>
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <div class="content">
                                                {{item.description}}
                                            </div>
                                        </div>
                                    </b-collapse>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template> 

<script>
    import { API } from '../config';
    import UserBox from "../components/UserBox";
    export default {
        components: {UserBox},
        mounted() {
            this.getCabinet();
        },
        watch: {
            '$route': function(){
                this.getCabinet();
            }
        },
        data: function() {
            return {
                image: "https://lh3.googleusercontent.com/-NCsWat0QOiY/WITb5dOr_oI/AAAAAAAAADA/aTZD88KYHHoWw3BZZHACYHqq491bxb7YQCJoC/w940-h788/a97ecf9e10275f41144cc1f23eec145ff81e66e6a904dca4524adea2569ef6b8.jpeg",
                cabinet: {},
                loading: true,
                schedule: [],
                doctorImg: "http://www.nationalheartinstitute.com/images/doctor-img4.jpg",         
                isComponentModalActive: false,          
           }
        },
        methods: {
            getCabinet() {
                const { id } = this.$route.params;
                axios.get( API + 'cabinet/id/' + (id ? this.$route.params.id : this.$user.cabinet_id))
                    .then(res => {
                        this.cabinet = res.data.cabinet;
                        this.loading = false;
                        console.log(this.cabinet._users);
                        this.schedule = this.cabinet.schedule.split('|');
                    })
                    .catch(err => {
                        console.log(err)
                    });
            }
        }
    }
</script>

<style scoped>
   
</style>
