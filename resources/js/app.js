require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue').default;

window.Swal = require('sweetalert2');

import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/saga-blue/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';
Vue.use(PrimeVue, {ripple: true});

import ToastService from 'primevue/toastservice';
Vue.use(ToastService);

//#region PrimeVue Components
import TabView from "primevue/tabView";
Vue.component('TabView', TabView);
import TabPanel from "primevue/tabPanel";
Vue.component('TabPanel', TabPanel);
import DataTable from "primevue/dataTable";
Vue.component('DataTable', DataTable);
import Column from "primevue/column";
Vue.component('Column', Column);
import Button from "primevue/button";
Vue.component('Button', Button);
import Card from "primevue/card";
Vue.component('Card', Card);
import Chip from "primevue/chip";
Vue.component('Chip', Chip);
import Toast from 'primevue/toast';
Vue.component('Toast', Toast);
import Badge from 'primevue/badge';
Vue.component('Badge', Badge);
import InputText from 'primevue/inputtext';
Vue.component('InputText', InputText);
//#endregion

//#region Prime directives
import Tooltip from 'primevue/tooltip';
Vue.directive('tooltip', Tooltip);
//#endregion

//#region Componentes
Vue.component('Login', require('./components/auth/Login.vue').default);
Vue.component('Menues', require('./components/Menues.vue').default);
//administración componentes
Vue.component('Inventario', require('./components/administracion/Inventario.vue').default);
//#endregion

const app = new Vue({
    el: '#app'
});