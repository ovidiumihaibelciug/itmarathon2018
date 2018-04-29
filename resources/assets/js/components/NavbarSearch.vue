<template>
    <b-autocomplete
            v-if="cabinets.length"
            expanded
            v-model="name"
            :data="filteredDataArray"
            placeholder="e.g. jQuery"
            icon="magnify"
            @select="selected">
        <template slot="empty">No results found</template>
        <template slot-scope="props">
            <div class="media">
                <div class="media-left">
                    <img width="50" :src="'images/cabinet/' + cabinets[props.index].image_id">
                </div>
                <div class="media-content">
                    {{ cabinets[props.index].name }}
                    <br>
                    <div style=" font-size: 80%">
                        {{ cabinets[props.index].location }}
                    </div>
                </div>
            </div>
        </template>
    </b-autocomplete>
</template>

<script>
    import {API} from "../config";

    export default {
        mounted() {
            this.getCabinets();
        },
        data() {
            return {
                cabinets: [],
                cabinetsNames: [],
                name: '',
            }
        },
        computed: {
            filteredDataArray() {
                return this.cabinetsNames.filter((option) => {
                    return option
                        .toString()
                        .toLowerCase()
                        .indexOf(this.name.toLowerCase()) >= 0
                })

            }
        },
        methods: {
            selected(selected) {
                const index = this.cabinets.findIndex(e => e.name === selected);
                if(index !== -1) {
                    this.$router.push({name: 'cabinet', props: { id: this.cabinets[index].id }});
                    this.name = '';
                }
            },
            getCabinets() {
                axios.get(API + 'cabinet/all')
                    .then(({ data }) => {
                        this.cabinets = data.cabinets;
                        this.cabinetsNames = data.cabinets.map(e => e.name);
                    });
            },
        },
    }
</script>
<style scoped>
    .columns {
        width: 700px;
    }
    .media-content {
        white-space: normal;
    }
    .course-description {
        font-size: .8rem;
    }
    .dropdown-item {
        padding: 0;
    }
    .dropdown-menu {
        width: 400px !important;
    }
</style>