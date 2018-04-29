<template>
    <div class="card" style="margin-top: 24px; height: 444px; position: relative;" >
        <div class="card-image">
            <figure class="image is-4by3">
                <img :src="'images/cabinet/' + cabinet.image_id" alt="Placeholder image">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content" style="text-align: center;">
                    <p class="title is-4">{{cabinet.name}} <small class="is-pulled-right is-light"><b-icon icon="account" size="is-small"></b-icon>&nbsp;{{cabinet._users.length}}</small></p>
                </div>
            </div>

            <div class="content">
                {{cabinet.description}}
                <br>
            </div>
            <div style="position: absolute; bottom: 12px; left: 12px; right: 12px;">
                <router-link :to="{name: 'cabinet', params: { id: cabinet.id }}" class="button is-small is-outlined is-primary" style="width: 49%;"><b-icon icon="eye" pack="fa"></b-icon><span>Visit</span></router-link>

                <router-link :to="{name: 'addappointment', params: { cabinet: cabinet.id }}" class="button is-small is-outlined is-success" style="width: 49%;"><b-icon icon="comments" pack="fa"></b-icon><span>Contact</span></router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['cabinet'],
    }
</script>

<style scoped>

</style>