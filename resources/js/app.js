import Vue from "vue";
import router from "./router";

require('./bootstrap');

require("./components");

if (!window.App) {
    Vue.prototype.$eventBus = new Vue();
    window.App = new Vue({
        el: '#ukz-app',
        comments: {},
        router,
        methods: {
            photoFullUrl(url) {
                return `${window.location.origin}${url}`;
            }
        }
    });
}
