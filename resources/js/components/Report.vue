<template>
    <div>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container">

        <!-- <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-th-large"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Category</span>
                <span class="info-box-number">
                  {{ categories.length }}
                </span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fab fa-product-hunt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Product</span>
                <span class="info-box-number">
                  {{ products.length }}
                </span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">{{invoices.length}}</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Supplier</span>
                <span class="info-box-number">{{ suppliers.length }}</span>
              </div>
            </div>
          </div>
        </div> -->

       <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">This Month Report</h5>

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
                    <p  class="text-center"><strong>This Month Sales Graph</strong></p>
                      
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
                            <span class="info-box-number">{{ grant_total }}</span>
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
                            <span class="info-box-number">{{ total_due }}</span>
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
                            <span class="info-box-number">{{ total_expense }}</span>
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
                            <span class="info-box-number">{{ grant_total-total_expense }}</span>
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
            categories:'',
            products:'',
            invoices:'',
            setting:'',
            thisMonthInvoices:'',
            expenses:'',
          }
    },

    mounted(){
        this.getSuppliers();
        this.getWarehouses();
        this.getCategory();
        this.getProducts();
        this.getInvoices();
        this.getThisMonthInvoices();
        this.getExpenses();
    },
    computed: {

      grant_total: function() {
        var total = 0;
        for (let i = 0; i < this.thisMonthInvoices.length ; i++) {
          total += parseFloat(this.thisMonthInvoices[i].paid_amount); 
        } 
        return total
      },

      total_due: function() {
        var total = 0;
        for (let i = 0; i < this.thisMonthInvoices.length ; i++) {
          total += parseFloat(this.thisMonthInvoices[i].due_amount); 
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
        return this.thisMonthInvoices.length
      }

    },

    methods:{

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

        getThisMonthInvoices(){
          var date = new Date();
          var month_no = date.getMonth()+1
            var temp = this;
            axios.get('/api/getThisMonthInvoices/'+month_no)
              .then((response) => {
                temp.thisMonthInvoices = response.data.all_data;
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

            if (data.all_data) {
              const month_name = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"
                ];
              const d = new Date(data.all_data[0].created_at);
              $('#date_month').append(' '+month_name[d.getMonth()]+ ' ' + d.getFullYear())
            }

            var total_seles = 0;
            for (let i = 0; i < data.all_data.length ; i++) {
              total_seles+=parseFloat(data.all_data[i].paid_amount)
            }

            var monthNames = []
            for(var k = 0; k<data.days.length; k++){
              monthNames.push(data.days[k] == 0? 0: data.days[k])
            }

            var month_days = []
            for(var d = 1; d<=data.days.length; d++){
              month_days.push(d)
            }

            var salesChartCanvas = $('#salesChart').get(0).getContext('2d')
            var salesChartData = {
              labels  : month_days,
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
                // {
                //   label               : 'Electronics',
                //   backgroundColor     : 'rgba(210, 214, 222, 1)',
                //   borderColor         : 'rgba(210, 214, 222, 1)',
                //   pointRadius         : false,
                //   pointColor          : 'rgba(210, 214, 222, 1)',
                //   pointStrokeColor    : '#c1c7d1',
                //   pointHighlightFill  : '#fff',
                //   pointHighlightStroke: 'rgba(220,220,220,1)',
                //   data                : [25000, 25000, 25000, 25000, 15000, 25000, 25000,25000, 10000, 8000, 25000, 15000, 20000, 25000,25000, 10000, 25000, 25000, 15000, 20000, 25000,25000, 10000, 8000, 25000, 15000, 20000, 25000, 25000, 10000, 8000, 25000, 15000, 20000, 25000]
                // },
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

            // This will get the first returned node in the jQuery collection.
            var salesChart = new Chart(salesChartCanvas, { 
                type: 'line', 
                data: salesChartData, 
                options: salesChartOptions
              }
            )

          })
        }

        // getSetting(){
        //     var temp = this;
        //     axios.get('/api/setting/1')
        //       .then((response) => {
        //         temp.form = response.data;
        //       })
        //       .catch(function (error) {
        //         this.loadin = true; 
        //             toastr.error('Something is wrong Data Loaded')
        //       });
        // },
      }
    }

</script>
