
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'

import moment from 'moment'
Vue.filter('myDate', function(created){
    return moment(created).format('DD-MM-YYYY');
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
    { path: '/setting', component: require('./components/Setting.vue').default },
    { path: '/report', component: require('./components/Report.vue').default },

    { path: '/supplier', component: require('./components/Supplier.vue').default },
    { path: '/customer', component: require('./components/Customer.vue').default },
    { path: '/category', component: require('./components/Category.vue').default },
    { path: '/warehouse', component: require('./components/Warehouse.vue').default },
    { path: '/staff', component: require('./components/Staff.vue').default },

    { path: '/invoice', component: require('./components/Invoice.vue').default },
    { path: '/invoice-create', component: require('./components/InvoiceCreate.vue').default },
    { path: '/invoice/:id/edit', component: require('./components/InvoiceEdit.vue').default },
    { path: '/invoice/:id/show', component: require('./components/InvoiceShow.vue').default },

    { path: '/expense', component: require('./components/Expense.vue').default },
    { path: '/expense-create', component: require('./components/ExpenseCreate.vue').default },
    { path: '/expense/:id/edit', component: require('./components/ExpenseEdit.vue').default },
    { path: '/expense/:id/show', component: require('./components/ExpenseShow.vue').default },

    { path: '/supplier-invoice', component: require('./components/SupplierInvoice.vue').default },
    { path: '/supplier-invoice-create', component: require('./components/SupplierInvoiceCreate.vue').default },
    { path: '/supplier-invoice/:id/edit', component: require('./components/SupplierInvoiceEdit.vue').default },
    { path: '/supplier-invoice/:id/show', component: require('./components/SupplierInvoiceShow.vue').default },
    
    { path: '/product', component: require('./components/Product.vue').default },
    { path: '/product-create', component: require('./components/ProductCreate.vue').default },
    { path: '/product/:id/edit', component: require('./components/ProductEdit.vue').default },
    
    { path: '/loan', component: require('./components/Loans.vue').default },
    { path: '/loan-create', component: require('./components/LoansCreate.vue').default },
    { path: '/loan/:id/edit', component: require('./components/LoansEdit.vue').default },
    
    { path: '*', component: require('./components/Dashboard.vue').default }
]

const router = new VueRouter({
    mode: 'history',
    routes, // short for `routes: routes`
});

Vue.component('pagination-component', require('./components/partials/PaginationComponent.vue').default);


const app= new Vue({
    el: '#app',
    router,
});


