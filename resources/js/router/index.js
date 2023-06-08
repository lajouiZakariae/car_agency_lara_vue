import { createRouter, createWebHistory } from "vue-router";
import Cars from "../Cars/index.vue";

export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            name: "Cars",
            component: Cars,
        },
        {
            path: "/agencies",
            name: "Agencies",
            component: () => import("../Agencies/index.vue"),
        },
    ],
});
