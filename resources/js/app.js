
require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    { path: '/supplier-invoice', component: require('./components/SupplierInvoiceComponent.vue') },
    { path: '/supplier-invoice-create', component: require('./components/SupplierInvoiceCreateComponent.vue') }
]

let router = new VueRouter({
    routes // short for `routes: routes`
});

const router = new VueRouter({
    routes // short for `routes: routes`
});
// https://flaviocopes.com/vue-router/


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('supplier-component', require('./components/SupplierComponent.vue').default);
Vue.component('category-component', require('./components/CategoryComponent.vue').default);
Vue.component('warehouse-component', require('./components/WarehouseComponent.vue').default);
Vue.component('supplier-invoice-component', require('./components/SupplierInvoiceComponent.vue').default);
Vue.component('supplier-invoice-create-component', require('./components/SupplierInvoiceCreateComponent.vue').default);
Vue.component('pagination', require('./components/partials/PaginationComponent.vue').default);



const app= new Vue({
    el: '#app',
    router
});
