import Vue from "vue";
import VueRouter from "vue-router";
import VueTruncate from "vue-truncate-filter";

import vueCountryRegionSelect from 'vue-country-region-select';
import Vuelidate from 'vuelidate';

// Import component
import Loading from 'vue-loading-overlay';
import VueToastify from "vue-toastify";

import TextTruncate from 'vue-truncate-filter';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';

Vue.use(TextTruncate);
Vue.use(VueToastify);
Vue.use(Loading);


Vue.use(Vuelidate)
Vue.use(vueCountryRegionSelect)
Vue.use(VueTruncate);
Vue.use(VueRouter);

export default new VueRouter({
    routes: [],
    linkActiveClass: "",
    mode: "history"
});