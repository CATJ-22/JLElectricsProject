require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue').default;

window.Swal = require('sweetalert2');


//#region Componentes
Vue.component('Login', require('./components/auth/Login.vue').default);
//#endregion

const app = new Vue({
    el: '#app'
});