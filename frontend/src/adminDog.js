import Vue from "vue";
import App from "./App.vue";
import vuetify from "./plugins/vuetify";
import axios from './plugins/axios'
import router from "./router";
import store from "./store/store";
import VueBar from "vuebar";
import "./plugins/base";
import VueSkyCons from "vue-skycons";
import VueFeather from "vue-feather";
import InstantSearch from "vue-instantsearch";

Vue.prototype.$http = axios;
Vue.prototype.axios = axios;

Vue.use(VueFeather);
Vue.use(VueSkyCons, {
    color: "#1e88e5",
});
Vue.use(InstantSearch);
Vue.config.productionTip = false;
Vue.use(VueBar);


export default class AdminDog {
    constructor(config) {
        this.bootingCallbacks = [];
        this.config = config
    }

    booting(callback) {
        this.bootingCallbacks.push(callback)
    }

    boot() {
        this.bootingCallbacks.forEach(callback => callback(Vue, router, store, vuetify));
        this.bootingCallbacks = []
    }

    liftOff() {
        this.boot();
        this.app = new Vue({
            vuetify,
            store,
            router,
            render: (h) => h(App),
        }).$mount("#app");
    }
}
