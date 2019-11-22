<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-md-3 float-left">
                              <p><a href="/">Home</a> / SupplierInvoice</p>
                            </div>
                            <div class="col-md-6">
                              <div class="form-inline ml-3 mr-2">
                                <div class="input-group input-group-sm w-100">
                                    <select v-model="queryFiled" class="form-control w-25" id="fileds">
                                        <option value="supplier_id">Supplier Name</option>
                                        <option value="supplier_contact_name">Contact Name</option>
                                        <option value="supplier_email">Email</option>
                                        <option value="supplier_phone">Phone</option>
                                        <option value="supplier_address">Address</option>
                                    </select>
                                  <input class="form-control w-50" v-model="query" type="search" placeholder="Search" aria-label="Search">
                                  <div class="input-group-append">
                                    <button class="btn btn-default" type="submit">
                                      <i class="fas fa-search"></i>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="d-inline-flex float-right">
                                <router-link to="/supplier-invoice-create" class="btn btn-sm btn-primary float-right">
                                    <i class="fa fa-plus"></i> Supplier Invoice
                                </router-link>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body p-2">
                            <table id="example1-" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th class="text-center">S.N</th>
                                    <th class="text-center">Supplier Name</th>
                                    <th class="text-center">Warehouse Name</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">paid_amount</th>
                                    <th class="text-center">due_amount</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody v-if="supplierInvoices.length > 0 ">

                                    <tr v-for="(supplierInvoice, index) in supplierInvoices">
                                        <td>{{ index+1 }}</td>
                                        <td>{{ supplierInvoice.supplier_id }}</td>
                                        <td>{{ supplierInvoice.warehouse_id }}</td>
                                        <td>{{ supplierInvoice.image }}</td>
                                        <td>{{ supplierInvoice.paid_amount }}</td>
                                        <td>{{ supplierInvoice.due_amount }}</td>
                                        <td>{{ supplierInvoice.status }}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-xs btn-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-xs btn-success mr-1" @click="editSupplier(supplierInvoice.id)">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-xs btn-danger" @click.prevent="deleteSupplier(supplierInvoice.id)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>

                                <tbody v-else>
                                    <tr>
                                        <td colspan="8">
                                            <div class="p-3 mb-2">
                                                <h3 class="text-center text-danger">Opps!!</h3>
                                                <p class="text-center">Data not found</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer pb-0 pt-0">
                          <div class="float-right">
                            <pagination-component v-if="pagination.last_page > 1"
                              :pagination="pagination"
                              :offset="5"
                              @paginate="query === '' ? getData() : searchData()"
                              >
                            </pagination-component>
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
                query: "",
                queryFiled: "supplier_id",
                supplierInvoices:{},

                pagination:{
                    current_page: 1,
                },

                supplier_id : '',

                form: new Form({
                  id : '',
                  product_name : '',
                  product_quantity : '',
                  product_rate : '',
                  total_price : '',
                  supplier_id : '',
                  warehouse_id : '',
                  datepicker_invoice_exp : '',
                  image : '',
                }),
               new_row: '<tr>' + 
                    '<td style="width: 320px">'+
                        '<input v-model="product_name[]" class="form-control-sm w-100 productSelection" placeholder="Item Name" required="" id="product_name" autocomplete="off" tabindex="1" type="text">'+
                    '</td>'+
                    '<td style="width: 320px">'+
                        '<input v-model="product_quantity[]" autocomplete="off" class="total_qty_1 form-control-sm w-100" id="total_qty_1" onkeyup="quantity_calculate(1);" required="" onchange="quantity_calculate(1);" placeholder="0" tabindex="2" type="text">'+
                    '</td>'+
                    '<td>'+
                        '<input v-model="product_rate[]" autocomplete="off" value="" id="item_price_1" placeholder="0.00" class="item_price_1 price_item form-control-sm w-100" tabindex="3" onkeyup="quantity_calculate(1);" required="" onchange="quantity_calculate(1);" type="text">'+
                    '</td>'+
                    '<td>'+
                        '<input v-model="total_price[]" class="total_price form-control-sm w-100" id="total_price_1" placeholder="0.00" value="" tabindex="-1" readonly="" type="text">'+
                    '</td>'+
                    '<td>'+
                        '<button style="text-align: right;" class="btn btn-danger btn-sm" type="button" @click="deleteRow" value="Delete" tabindex="4">Delete</button>'+
                    '</td>'+
                    '</tr>' 
            }
        },

        watch:{
            query: function(newQ, old) {
                if (newQ === "") {
                    this.getData();
                } else {
                    this.searchData();
                }
            }
        },

        mounted(){
            this.getData();
        },

        methods:{


            getData(){
                var temp = this;
                axios.get('/api/supllier-invoice?page='+this.pagination.current_page)
                  .then((response) => {
                    temp.supplierInvoices = response.data.data;
                    temp.pagination = response.data.meta;
                  })
                  .catch(function (error) {
                    this.loadin = true;
                        toastr.error('Something is wrong Data Loaded')
                  });
            },

            searchData() {
                var temp = this;
                axios.get("/api/search/supllier-invoice/" + temp.queryFiled + "/" + temp.query + "?page=" +
                    temp.pagination.current_page
                    )
                    .then(response => {
                        temp.supplierInvoices = response.data.data;
                        temp.pagination = response.data.meta;
                    })
                    .catch(e => {
                        console.log(e);
                        toastr.error('Something is wrong Search Data')
                    });
            },

            addNewSupplier(){
                var temp = this
                axios.post('/api/suppliers', {
                    supplier_name : temp.supplier_name,
                    supplier_contact_name : temp.supplier_contact_name,
                    supplier_email : temp.supplier_email,
                    supplier_phone : temp.supplier_phone,
                    supplier_address : temp.supplier_address,
                })
                .then(function (response) {
                    console.log(response.data)
                    temp.getData();
                    toastr.success('Saved Supplier Successfully'),

                    temp.supplier_name = '',
                    temp.supplier_contact_name = '',
                    temp.supplier_email = '',
                    temp.supplier_phone = '',
                    temp.supplier_address = ''
                })
                .catch(function (error) {
                    toastr.error('Saved Supplier Failed')
                });
            },

            deleteSupplier(id){
               const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success btn-sm',
                    cancelButton: 'btn btn-danger  btn-sm mr-2',
                  },
                  buttonsStyling: false
               })
               swalWithBootstrapButtons.fire({
                  // title: '',
                  text: "Are you sure Delete ?",
                  icon: 'question',
                  position: 'top-end',
                  width: '18rem',
                  padding: '10px',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, delete it!',
                  cancelButtonText: 'No, cancel!',
                  reverseButtons: true
               }).then((result) => {
                  if (result.value) {
                    var temp = this
                     axios.delete('/api/supllier-invoice/'+id)
                        .then(function (response) {
                            toastr.success('Deleted Supplier Successfully')
                            temp.getData();
                        })
                        .catch(function (error) {
                            toastr.error('Delete Supplier Failed')
                        });
                  }
               })
            },

            editSupplier(supplierInvoiceId){
                var temp = this;
                var temp = this
                axios.delete('/api/supllier-invoice/'+supplierInvoiceId)
                .then((response) => {
                    window.location.href = "/admin/supplier-invoice-edit";
                    temp.supplierInvoices = response.data.data;
                    temp.pagination = response.data.meta;
                })
                .catch(function (error) {
                    this.loadin = true;
                    toastr.error('Something is wrong Data Loaded')
                });
                // this.supplier_id = supplierInvoice.id,
                // this.supplier_name = supplierInvoice.supplier_name,
                // this.supplier_contact_name = supplierInvoice.supplier_contact_name,
                // this.supplier_email = supplierInvoice.supplier_email,
                // this.supplier_phone = supplierInvoice.supplier_phone,
                // this.supplier_address = supplierInvoice.supplier_address
            },

            updateSupplier(id){
                var temp = this
                axios.put('/api/suppliers/'+id, {
                    supplier_name : this.supplier_name,
                    supplier_contact_name : this.supplier_contact_name,
                    supplier_email : this.supplier_email,
                    supplier_phone : this.supplier_phone,
                    supplier_address : this.supplier_address,
                })
                .then(function (response) {
                    toastr.success('Updated Supplier Successfully');
                    temp.getData();
                })
                .catch(function (error) {
                    toastr.error('Updated Supplier Failed')
                });
            },
        }
    }
</script>
