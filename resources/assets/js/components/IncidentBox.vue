<template>
    <div class="box" v-if="incident.pet && Object.keys(cabinet).length">
        <article class="media">
            <div class="media-content">
                <div class="content" style="text-align: center;">
                    <PetBoxHorizontal :small="true" :pet="incident.pet" style="text-align: left;margin-bottom: 10px;"/>
                    <img style="height: 100px;" :src="'/images/incidents/' + incident.type + '.png'" alt="Image">
                    <div class="box" style="text-align: left;margin-bottom: 0px;margin-top: 10px;">
                        <article class="media" style="border: 0;">
                            <div class="media-left">
                                    <img style="margin-left: 10px; width: 126px;" :src="'images/cabinet/' + cabinet.image_id" alt="Placeholder image">

                            </div>
                            <div class="content">
                                <p>
                                    <router-link :to="{name: 'cabinet', params: { id: cabinet.id }}" class="is-size-3" style="width: 49%;"><span>{{cabinet.name}}</span></router-link>
                                    <br>
                                    {{cabinet.description}}
                                </p>
                            </div>

                        </article>

                    </div>
                </div>

            </div>
        </article>
    </div>
</template>

<script>
    import PetBoxHorizontal from "./PetBoxHorizontal";
    import {API} from "../config";
    export default {
        components: {PetBoxHorizontal},
        props: ['incident'],
        mounted() {
            axios.get( API + 'cabinet/id/' + this.incident.cabinet_id)
                .then(res => {
                    this.cabinet = res.data.cabinet;
                });
        },
        data: function() {
            return {
                cabinet: {},
            };
        },
    }
</script>

<style scoped>

</style>