require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue').default;

window.Swal = require('sweetalert2');

import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/saga-blue/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';
Vue.use(PrimeVue);

//#region Componentes
Vue.component('Login', require('./components/auth/Login.vue').default);
Vue.component('Menues', require('./components/Menues.vue').default);
//#endregion

const app = new Vue({
    el: '#app'
});