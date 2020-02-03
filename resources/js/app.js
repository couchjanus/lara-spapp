require('./bootstrap');
window.Vue = require('vue');
import VueRouter from "vue-router";
import routes from "./routes/routes";

Vue.use(VueRouter);
Vue.component('pagination', require('laravel-vue-pagination'));
// https://github.com/gilbitron/laravel-vue-pagination
Vue.component('App', require('./App').default);
Vue.prototype.setDocumentTitle = function (title = "SPA Blog") {
    document.title = title;
};
const app = new Vue({
    el: '#app',
    router: new VueRouter({ routes, mode: "history" }),
});
