
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'

import moment from 'moment'
Vue.filter('myDate', function(created){
    return moment(created).format('MMM Do YYYY');
})

// Vue Router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// Vue Progress bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'green',
    failedColor: 'red',
    height: '2px'
})

// Vue Form
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

const routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/supplier', component: require('./components/Supplier.vue').default },
    { path: '/category', component: require('./components/Category.vue').default },
    { path: '/warehouse', component: require('./components/Warehouse.vue').default },
    { path: '/supplier-invoice', component: require('./components/SupplierInvoice.vue').default },
    { path: '/supplier-invoice-create', component: require('./components/SupplierInvoiceCreate.vue').default },
    { path: '/supplier-invoice-create', component: require('./components/SupplierInvoiceCreate.vue').default },
    { path: '/supplier-invoice-edit/:id', component: require('./components/SupplierInvoiceEdit.vue').default },
    { path: '*', component: require('./components/Dashboard.vue').default }
]

const router = new VueRouter({
    mode: 'history',
    routes, // short for `routes: routes`
});

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pagination-component', require('./components/partials/PaginationComponent.vue').default);


const app= new Vue({
    el: '#app',
    router,
});
