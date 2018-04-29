<template>
    <section class="cabinet-section">
        <b-loading :is-full-page="true" :active.sync="loading" :canCancel="true"></b-loading>
        <div class="container" v-if="!loading">
            <div class="columns">
                <div class="column is-one-third">
                    <div class="box cabinet-img" :style="{ backgroundImage: 'url(' + image + ')' }"></div>
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
                </div>
            </div>
        </div>
    </section>
</template> 

<script>
    import { API } from '../config';
    export default {
        mounted() {
            axios.get( API + 'cabinet/' + this.$route.params.id)
            .then(res => {
                this.cabinet = res.data.cabinet
                this.loading = false;
                console.log(res);
            })
            .catch(err => {
                console.log(err)
            });
        },
        data: function() {
            return {
                image: "https://lh3.googleusercontent.com/-NCsWat0QOiY/WITb5dOr_oI/AAAAAAAAADA/aTZD88KYHHoWw3BZZHACYHqq491bxb7YQCJoC/w940-h788/a97ecf9e10275f41144cc1f23eec145ff81e66e6a904dca4524adea2569ef6b8.jpeg",
                cabinet: {},
                loading: true
           }
        }
    }
</script>