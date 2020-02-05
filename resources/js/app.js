require('./bootstrap');
window.Vue = require('vue');
import VueRouter from "vue-router";
import routes from "./routes/routes";
import store from "./store/store";
Vue.use(VueRouter);
Vue.component('pagination', require('laravel-vue-pagination'));
// https://github.com/gilbitron/laravel-vue-pagination
Vue.component('App', require('./App').default);
Vue.prototype.setDocumentTitle = function (title = "SPA Blog") {
    document.title = title;
};

Vue.prototype.pluralize = (word, count) => {
    return parseInt(count) > 1 ? word + "s" : word;
};

const app = new Vue({
    el: '#app',
    router: new VueRouter({ routes, mode: "history" }),
    store
});
