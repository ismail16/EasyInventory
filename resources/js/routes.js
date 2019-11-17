import Home from './components/SupplierInvoiceComponent';
import Register from './components/SupplierInvoiceCreateComponent.vue';
import Login from './components/SupplierInvoiceEditComponent.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/register', component: Register },
    { path: '/login', component: Login },
];

export default routes;