import {API} from "./config";

require("./bootstrap");
import Vue from "vue";
import Buefy from "buefy";
import VueRouter from "vue-router";
import router from "./routes/routes";

Vue.use(Buefy);
Vue.use(VueRouter);

Vue.component("root", require("./Main.vue"));

axios.get( API + 'user' )
    .then(res => {
        Vue.prototype.$user = res.data.user;

        window.vue = new Vue({
            router,
            el: "#app"
        });

        console.log("S-o luat userul", res.data.user);
    })
    .catch(err => console.log(err));

