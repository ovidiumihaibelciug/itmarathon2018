import VueRouter from "vue-router";
import ExampleComponent from "../containers/ExampleComponent.vue";
import Profile from "../containers/Profile.vue";
import Cabinet from "../containers/Cabinet.vue";
import MyPets from "../containers/MyPets.vue";
import Dashboard from "../containers/Dashboard.vue";
import AddPet from "../containers/AddPet.vue";
import PetProfile from "../containers/PetProfile.vue";

const router = new VueRouter({
    linkExactActiveClass: "is-exact-active",
    linkActiveClass: "is-active",
    routes: [
        {
            path: "/home",
            component: ExampleComponent,
            name: "root"
            //   meta: { onlyAuth: true }
        },
        {
            path: "/profile",
            component: Profile,
            name: "profile-auth"
            //   meta: { onlyAuth: true }
        },
        {
            path: "/profile/:username",
            component: Profile,
            name: "profile"
            //   meta: { onlyAuth: true }
        },
        {
            path: "/cabinet/:id",
            component: Cabinet,
            name: "cabinet"
            //   meta: { onlyAuth: true }
        },
        {
            path: "/mypets",
            component: MyPets,
            name: "mypets"
        },
        {
            path: "/pet/:id",
            component: PetProfile,
            name: "petProfile"
        },
        {
            path: "/dashboard",
            component: Dashboard,
            name: "dashboard",
            children: [
                {
                    path: "/addpet",
                    component: AddPet,
                    name: "addpet"
                }
            ]
        }
    ]
});

export default router;
