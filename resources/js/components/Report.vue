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

        <div class="row">
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
        </div>

       <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">This Month Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <p class="text-center">
                      <strong id="this_month">This Month Sales Graph</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Add Products to Cart
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Complete Purchase
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Send Inquiries
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
                      <h5 class="description-header">$ {{ grant_total}}</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <!-- <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span> -->
                      <h5 class="description-header">$ {{total_due}}</h5>
                      <span class="description-text">TOTAL DUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span> -->
                      <h5 class="description-header">$ {{ total_expense }}</h5>
                      <span class="description-text">TOTAL EXPENSE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <!-- <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span> -->
                      <h5 class="description-header">$ {{ grant_total-total_expense }}</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
                // this.report(response.data.data);
              })
              .catch(function (error) {
                this.loadin = true;
                    toastr.error('Something is wrong Data Loaded')
              });
        },

        getThisMonthInvoices(){
          var date = new Date();

          // var monthNames = ["January", "February", "March","April", "May", "June", "July","August", "September", "October","November", "December"
          // ];
          // var monthIndex = date.getMonth();
          // var year = date.getFullYear();
          // var this_month = monthNames[monthIndex] + ' ' + year;
          // $('#this_month').append(this_month)

          var month_no = date.getMonth()+1
            var temp = this;
            axios.get('/api/getThisMonthInvoices/2019')
              .then((response) => {
                temp.thisMonthInvoices = response.data.data;

                console.log('response')
                console.log(response.data.data)

                this.report(response.data.data);
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


            var dataset = []
            var month_arr = []
            var total_seles = 0;
            for (let i = 0; i < data.length ; i++) {


                var date = new Date(data[i].created_at);
                var monthIndex = date.getMonth()+1;

                  dataset.push(data[i].paid_amount);

                if (month_arr.indexOf(monthIndex)) {
                  month_arr.push(monthIndex); 
                  // var vaue = { }

                  // dataset.push(data[i].paid_amount); 
                }

                var date = new Date(data[1].created_at);
                var monthIndex = date.getMonth()+1;

                total_seles+=data[i].paid_amount

            }





            var arrt = [1,2,3,4,5,6,7,8,9,10,11,12]
            var arrs = []
            for (let j = 0; j < month_arr.length ; j++) {
              for (let i = 0; i < arrt.length ; i++) {

                if (month_arr[j] == arrt[i]) {
                  arrs.push(i+1)
                }else{
                  arrs.push(0)
                }
              }
            }
            console.log('dataset')
            console.log(arrs)

            var monthNames = [
                               month_arr.indexOf(1) != -1 ? 2000 : 0,
                               month_arr.indexOf(2) != -1 ? 2000 : 0,
                               month_arr.indexOf(3) != -1 ? 2000 : 0,
                               month_arr.indexOf(4) != -1 ? 2000 : 0,
                               month_arr.indexOf(5) != -1 ? 2000 : 0,
                               month_arr.indexOf(6) != -1 ? 2000 : 0,
                               month_arr.indexOf(7) != -1 ? 2000 : 0,
                               month_arr.indexOf(8) != -1 ? 2000 : 0,
                               month_arr.indexOf(9) != -1 ? 25000 : 0,
                               month_arr.indexOf(10) != -1 ? 1000 : 0,
                               month_arr.indexOf(11) != -1 ? 1000 : 0,
                               month_arr.indexOf(12) != -1 ? 50000 : 0
                            ];
          


            console.log('total_seles')
            // console.log( month_arr.indexOf(12) != -1 ? data[12].paid_amount:0)

            // if (true) {
            //   var date = new Date(data[1].created_at);
            //   var monthIndex = date.getMonth()+1;
            // }



            var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

            var salesChartData = {
              labels  : ["January", "February", "March","April", "May", "June", "July","August", "September", "October","November", "December"],
              datasets: [
                {
                  label               : 'Digital Goods',
                  backgroundColor     : 'rgba(60,141,188,0.9)',
                  borderColor         : 'rgba(60,141,188,0.8)',
                  pointRadius          : false,
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
                //   data                : [1000, 5000, 80000, 10000, 15000, 20000, 50000]
                // },
              ]
            }

            var salesChartOptions = {
              maintainAspectRatio : false,
              responsive : true,
              legend: {
                display: false
              },
              scales: {
                xAxes: [{
                  gridLines : {
                    display : false,
                  }
                }],
                yAxes: [{
                  gridLines : {
                    display : false,
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
