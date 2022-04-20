import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import Musicians from "./pages/Musicians";
import SingleMusician from "./pages/SingleMusician";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/single",
            name: "user-single",
            component: SingleMusician,
        },
        {
            path: "/list-musicians",
            name: "list-musicians",
            component: Musicians,
        },
    ],
});

export default router;
