import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import Musicians from "./pages/Musicians";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/list-musicians",
            name: "list-musicians",
            component: Musicians,
        },
        // {
        //     path: "/single",
        //     name: "user-single",
        //     component: SingleMusician,
        // },
    ],
});

export default router;
