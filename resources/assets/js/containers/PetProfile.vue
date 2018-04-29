<template>
    <section class="profile-section">
        <b-loading :is-full-page="true" :active.sync="isLoading"></b-loading>
        <div class="container">
            <div class="columns">
                <div class="column is-one-third">
                    <div class="box profile-user-box is-centered">
                        <div class="user-img is-centered" :style="{ backgroundImage: 'url(images/' + pet.type + '.png)' }"></div>
                        <div class="user-fullname">{{ pet.name }}</div>

                        <div>
                            <div class="user-info-item">
                                <b-icon icon="cake"></b-icon>&nbsp;Birthday: <strong>{{moment(pet.birthday).format('MMMM Do YYYY, h:mm:ss a')}}</strong>
                            </div>
                            <div class="user-info-item">
                                <b-icon icon="ruler"></b-icon>&nbsp;Age: <strong>{{(new Date()).getFullYear() - moment(pet.birthday).year()}} years</strong>
                            </div>
                            <div class="user-info-item">
                                <b-icon icon="ruler"></b-icon>&nbsp;Waist: <strong>{{pet.waist}} cm</strong>
                            </div>
                            <div class="user-info-item">
                                <b-icon icon="contrast-circle"></b-icon>&nbsp;Sex: <strong><b-icon :icon="'gender-'+ (pet.sex == 0 ? 'm' : 'fem') +'ale'"></b-icon> </strong>
                            </div>
                        </div>
                        <span class="is-size-4">Description</span>
                        <div class="user-info-item" style="text-align: center;">{{ pet.description ? pet.description : "" }}</div>

                        <span class="is-size-4 mt-10">Other observations</span>
                        <div class="user-info-item" style="text-align: center;">{{ pet.observations ? pet.observations : "" }}</div>

                    </div>
                </div>
                <div class="column is-three-thirds">
                    <IncidentBox v-for="(incident, index) in incidents" :incident="incident" :key="index"/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import {API} from "../config";
    import IncidentBox from '../components/IncidentBox';

    function randomDate(start, end) {
        return new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
    }

    export default {
        mounted () {
            axios.get(API + `pet/profile/${this.$route.params.id})`)
                .then(({ data }) => {
                    this.pet = data.pet;
                    this.isLoading = false;
                })
        },
        data: function() {
            return {
                isLoading: true,
                pet: {},
                moment: window.moment,
            };
        },
        computed: {
            incidents() {
                return [
                    {
                        type: 'vaccine',
                        cabinet_id: 1,
                        pet: this.pet,
                        date: randomDate(new Date(2012, 0, 1), new Date()),
                    },
                    {pet: this.pet,
                        type: 'vaccine',
                        cabinet_id: 2,
                        date: randomDate(new Date(2012, 0, 1), new Date()),
                    },
                    {pet: this.pet,
                        type: 'vaccine',
                        cabinet_id: 3,
                        date: randomDate(new Date(2012, 0, 1), new Date()),
                    }
                ];
            }
        },
        components: {IncidentBox}
    }
</script>
