<template>
    <div>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Dashboard v2</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
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
          <!-- <div class="clearfix hidden-md-up"></div> -->

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
          }
    },

    mounted(){
        this.getSuppliers();
        this.getWarehouses();
        this.getCategory();
        this.getProducts();
        this.getInvoices();
    },
    computed: {
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
            axios.get('/api/invoices')
              .then((response) => {
                temp.Invoices = response.data.data;
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
    }
    }
</script>
