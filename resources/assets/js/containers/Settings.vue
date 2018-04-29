<template>
    <div class="container"  style="margin-top: 30px;">
        <b-field label="Username">
            <b-input type="text"
                     v-model="user.username"
                     required
                     maxlength="30">
            </b-input>
        </b-field>
        <b-field label="First name">
            <b-input type="text"
                     v-model="user.first_name"
                     required
                     maxlength="30">
            </b-input>
        </b-field>
        <b-field label="Last name">
            <b-input type="text"
                     v-model="user.last_name"
                     required
                     maxlength="30">
            </b-input>
        </b-field>
        <b-field label="Email">
            <b-input type="email"
                     v-model="user.email"
                     required
                     maxlength="30">
            </b-input>
        </b-field>
        <button class="button is-success is-fullwidth" style="margin-bottom: 30px;">Save data</button>
        <span class="is-size-2">Password settings</span>
        <b-field label="Current Password">
            <b-input type="password"
                     v-model="password"
                     required
                     maxlength="30">
            </b-input>
        </b-field>
        <b-field label="New Password">
            <b-input type="password"
                     v-model="npassword"
                     required
                     maxlength="30">
            </b-input>
        </b-field>
        <b-field label="Confirm Password">
            <b-input type="password"
                     v-model="cpassword"
                     required
                     maxlength="30">
            </b-input>
        </b-field>
        <button class="button is-success is-fullwidth"  style="margin-bottom: 30px;">Save password</button>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                user: {...this.$user},
                password: '',
                npassword: '',
                cpassword: '',
            };
        },
    }
</script>

<style scoped>

</style>