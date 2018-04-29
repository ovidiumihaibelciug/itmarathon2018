<template>
    <section class="profile-section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-third">
                    <div class="box profile-user-box is-centered">
                        <div class="user-img is-centered" :style="{ backgroundImage: 'url(' + image + ')' }"></div>
                        <div class="user-fullname">{{ $user.last_name + " "+ $user.first_name }}</div>
                        <div class="user-email">{{ $user.email }}</div>
                        <div class="user-description">{{ $user.description ? $user.description : "" }}</div>
                    </div>
                </div>
                <div class="column is-one-fifth"></div>
                <div class="column is-three-thirds">asdasdad</div>
            </div>
        </div>
    </section>
</template> 

<script>
    export default {
        data: function() {
            return {
                image: "http://pluspng.com/img-png/user-png-icon-account-avatar-human-male-man-men-people-person-download-svg-download-png-edit-icon-512.png",
            }
        }
    }
</script>