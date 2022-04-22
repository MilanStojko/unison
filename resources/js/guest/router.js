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
            name: "search",
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

router.beforeEach((to, from, next) => {
    if (!to.meta.authRequired) {
        next();
    } else if (store.getters["user/isAuthenticated"]) {
        next();
    } else {
        next({
            path: "/open-404"
        });
    }
});

export default router;
