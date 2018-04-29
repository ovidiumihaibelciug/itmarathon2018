import ExampleComponent from "../containers/ExampleComponent.vue";
import MyPets from "../containers/MyPets.vue";
import Dashboard from "../containers/Dashboard.vue";
import AddPet from "../containers/AddPet.vue";
import VueRouter from "vue-router";

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
            path: "/mypets",
            component: MyPets,
            name: "mypets"
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
                },
            ],
        }
    ]
});

export default router;
