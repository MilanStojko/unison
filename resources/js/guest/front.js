require("../bootstrap");

window.Vue = require("vue");

import Vue from "vue";
import App from "./App.vue";
import router from "./router";

export const bus = new Vue();

const app = new Vue({
    el: "#app",
    render: (h) => h(App),
    router,
});
