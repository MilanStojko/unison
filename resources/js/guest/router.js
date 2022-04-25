import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import Search from "./pages/Search";
import Musicians from "./pages/Musicians";
import SingleMusician from "./pages/SingleMusician";
import PageNotFound from "./pages/PageNotFound";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/search",
            name: "search/:name/:vote",
            query: "name",
            component: Search,
        },
        {
            path: "/single/:slug",
            name: "user-single",
            component: SingleMusician,
        },
        {
            path: "/list-musicians",
            name: "list-musicians",
            component: Musicians,
        },
        {
            path: "*",
            name: "page-404",
            component: PageNotFound,
        },
    ],
});

export default router;
