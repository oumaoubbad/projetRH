/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import "admin-lte/plugins/jquery/jquery";
import "admin-lte/plugins/bootstrap/js/bootstrap.bundle";
import "admin-lte/dist/js/adminlte";

window.Vue = require('vue').default;
import Vue from "vue";
import VueRouter from "vue-router";
import { routes } from "./routes";

Vue.use(VueRouter);


Vue.component(
    "modeles-index",
    require("./components/modeles/Index.vue").default
);
const router = new VueRouter({
    mode: "history",
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router
});
