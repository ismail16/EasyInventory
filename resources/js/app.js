
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'

import VueRouter from 'vue-router'
Vue.use(VueRouter)
let routes = [
    // { path: '/', component: require('./components/Dashboard.vue').default },
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/supplier', component: require('./components/SupplierComponent.vue').default },
    { path: '/category', component: require('./components/CategoryComponent.vue').default },
    { path: '/warehouse', component: require('./components/WarehouseComponent.vue').default },
    { path: '/supplier-invoice', component: require('./components/SupplierInvoiceComponent.vue').default },
    { path: '/supplier-invoice-create', component: require('./components/SupplierInvoiceCreateComponent.vue').default },
    { path: '/supplier-invoice-create', component: require('./components/SupplierInvoiceCreateComponent.vue').default }
]

let router = new VueRouter({
	mode: 'history',
    routes // short for `routes: routes`
});

// router.beforeEach((to, from, next) => {
//   if (!isAuthenticated) next('/admin/dashboard')
//   else next()
// })

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('dashboard', require('./components/Dashboard.vue').default);
// Vue.component('supplier-component', require('./components/SupplierComponent.vue').default);
// Vue.component('category-component', require('./components/CategoryComponent.vue').default);
// Vue.component('warehouse-component', require('./components/WarehouseComponent.vue').default);
// Vue.component('supplier-invoice-component', require('./components/SupplierInvoiceComponent.vue').default);
// Vue.component('supplier-invoice-create-component', require('./components/SupplierInvoiceCreateComponent.vue').default);
Vue.component('pagination', require('./components/partials/PaginationComponent.vue').default);


const app= new Vue({
    el: '#app',
    router
});
