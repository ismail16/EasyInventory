<template>
    <div>
        <div class="content-header pb-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Admin Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container">

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <router-link to="/category">      
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-th-large"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Category</span>
                                    <span class="info-box-number">
                                        {{ categories.length }}
                                    </span>
                                </div>
                            </div>
                        </router-link>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <router-link to="/product">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary elevation-1"><i class="fab fa-product-hunt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Product</span>
                                    <span class="info-box-number">
                                        {{ products.length }}
                                    </span>
                                </div>
                            </div>
                        </router-link>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <router-link to="/invoice">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Sales</span>
                                    <span class="info-box-number">{{ total_invoice }}</span>
                                </div>
                            </div>
                        </router-link>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <router-link to="/customer">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Customers</span>
                                    <span class="info-box-number">{{ customers.length }}</span>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Yearly Report</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-center"><strong>TOTAL INVOICE</strong><span class="m-1 pl-2 pr-2 bg-success">{{ total_invoice }}</span> </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center"><strong>This Month Sales Graph</strong></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p  class="text-center"><strong id="date_month">Report of </strong></p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="chart">
                                            <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="description-block">
                                            <div class="info-box mb-3">
                                                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-shopping-cart"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">TOTAL REVENUE</span>
                                                    <span class="info-box-number">{{ setting.store_currency }} {{ grant_total }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="description-block">
                                            <div class="info-box mb-3">
                                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">TOTAL DUE</span>
                                                    <span class="info-box-number">{{ setting.store_currency }} {{ total_due }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="description-block">
                                            <div class="info-box mb-3">
                                                <span class="info-box-icon bg-danger elevation-1"><i class="far fa-money-bill-alt"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">TOTAL EXPENSE</span>
                                                    <span class="info-box-number">{{ setting.store_currency }} {{ total_expense }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="description-block">
                                            <div class="info-box mb-3">
                                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">TOTAL PROFIT</span>
                                                    <span class="info-box-number">{{ setting.store_currency }} {{ grant_total-total_expense }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                suppliers:'',
                products:'',
                customers:'',
                categories:'',
                invoices:'',
                setting:'',
                thisYearInvoices:'',
                expenses:'',
            }
        },

        mounted(){
            this.getSetting();
            this.getCustomers();
            this.getSuppliers();
            this.getWarehouses();
            this.getCategory();
            this.getProducts();
            this.getInvoices();
            this.getThisYearInvoices();
            this.getExpenses();
        },
        computed: {

            grant_total: function() {
                var total = 0;
                for (let i = 0; i < this.thisYearInvoices.length ; i++) {
                    total += parseFloat(this.thisYearInvoices[i].paid_amount); 
                } 
                return total
            },

            total_due: function() {
                var total = 0;
                for (let i = 0; i < this.thisYearInvoices.length ; i++) {
                    total += parseFloat(this.thisYearInvoices[i].due_amount); 
                } 
                return total
            },

            total_expense: function() {
                var total = 0;
                for (let i = 0; i < this.expenses.length ; i++) {
                    total += parseFloat(this.expenses[i].expense_paid_amount); 
                } 
                return total
            },

            total_invoice: function() {
                return this.thisYearInvoices.length
            }
        },

        methods:{
            getSetting(){
                var temp = this;
                axios.get('/api/setting/1')
                .then((response) => {
                    temp.setting = response.data;
                })
                .catch(function (error) {
                    this.loadin = true; 
                    toastr.error('Something is wrong Data Loaded')
                });
            },

            getCustomers(){
                var temp = this;
                axios.get('/api/customers')
                .then((response) => {
                    temp.customers = response.data.data;
                })
                .catch(function (error) {
                    this.loadin = true; 
                    toastr.error('Something is wrong Data Loaded')
                });
            },

            getSuppliers(){
                var temp = this;
                axios.get('/api/suppliers')
                .then((response) => {
                    temp.suppliers = response.data.data;
                })
                .catch(function (error) {
                    toastr.error('Something is wrong Data Loaded')
                });
            },

            getCategory(){
                var temp = this;
                axios.get('/api/categories')
                .then((response) => {
                    temp.categories = response.data.data;
                })
                .catch(function (error) {
                    toastr.error('Something is wrong Data Loaded')
                });
            },

            getProducts(){
                var temp = this;
                axios.get('/api/products')
                .then((response) => {
                    temp.products = response.data.data;
                })
                .catch(function (error) {
                    toastr.error('Something is wrong Data Loaded')
                });
            },

            getInvoices(){
                var temp = this;
                axios.get('/api/allInvoice')
                .then((response) => {
                    temp.Invoices = response.data.data;
                })
                .catch(function (error) {
                    this.loadin = true;
                    toastr.error('Something is wrong Data Loaded')
                });
            },

            getThisYearInvoices(){
                var date = new Date();
                var year = date.getFullYear()
                var temp = this;
                axios.get('/api/getThisYearInvoices/'+year)
                .then((response) => {
                    temp.thisYearInvoices = response.data.all_data;
                    this.report(response.data);
                })
                .catch(function (error) {
                    this.loadin = true;
                    toastr.error('Something is wrong Data Loaded')
                });
            },

            getWarehouses(){
                var temp = this;
                axios.get('/api/warehouses')
                .then((response) => {
                    temp.warehouses = response.data.data;
                })
                .catch(function (error) {
                    toastr.error('Something is wrong Data Loaded')
                });
            },

            getExpenses(){
                var temp = this;
                axios.get('/api/expenses')
                .then((response) => {
                    temp.expenses = response.data.data;
                })
                .catch(function (error) {
                    toastr.error('Something is wrong Data Loaded')
                });
            },


            report(data){
                $(function () {
                    'use strict'

                    var month_name = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
                    var total_seles = 0;

                    if (data.all_data.length > 0) {

                        var d = new Date(data.all_data[0].created_at);
                        $('#date_month').append(' '+ d.getFullYear())

                        for (let i = 0; i < data.all_data.length ; i++) {
                            total_seles+=parseFloat(data.all_data[i].paid_amount)
                        }
                    }else{
                        var now = new Date();
                        $('#date_month').append(' '+month_name[now.getMonth()]+ ' ' + now.getFullYear())
                    }

                    var monthNames = []
                    for(var k = 0; k<data.months.length; k++){
                        monthNames.push(data.months[k] == 0? 0: data.months[k])
                    }

                    var month_months = []
                    for(var d = 1; d<=data.months.length; d++){
                        month_months.push(d)
                    }

                    var salesChartCanvas = $('#salesChart').get(0).getContext('2d')
                    var salesChartData = {
                        labels  : month_name,
                        datasets: [
                            {
                                label               : 'Sales',
                                backgroundColor     : 'rgba(60,141,188,0.9)',
                                borderColor         : 'rgba(60,141,188,0.8)',
                                pointRadius          : true,
                                pointColor          : '#3b8bba',
                                pointStrokeColor    : 'rgba(60,141,188,1)',
                                pointHighlightFill  : '#fff',
                                pointHighlightStroke: 'rgba(60,141,188,1)',
                                data                : monthNames
                            },
                        ]
                    }

                    var salesChartOptions = {
                        maintainAspectRatio : false,
                        responsive : true,
                        legend: {
                            display: true
                        },
                        scales: {
                            xAxes: [{
                                gridLines : {
                                    display : true,
                                }
                            }],
                            yAxes: [{
                                gridLines : {
                                    display : true,
                                }
                            }]
                        }
                    }

                    var salesChart = new Chart(salesChartCanvas, { 
                        type: 'line', 
                        data: salesChartData, 
                        options: salesChartOptions
                    })
                })
            }
        }
    }
</script>
