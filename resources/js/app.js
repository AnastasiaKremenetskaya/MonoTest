// import 'vuetify/dist/vuetify.min.css'
require('./bootstrap');
// import VueRouter from 'vue-router';
// import VueAxios from 'vue-axios';
import axios from 'axios';

window.Vue = require('vue');
import Vuetify from 'vuetify';
Vue.use(Vuetify);

// Vue.use(VueAxios, axios);//?

Vue.component('car-form-create', require('./components/CarFormCreate.vue').default);
Vue.component('car-form-edit', require('./components/CarFormEdit').default);
Vue.component('user-form-create', require('./components/UserFormCreate.vue').default);
Vue.component('user-form-edit', require('./components/UserFormEdit').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify()
});

