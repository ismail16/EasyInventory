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
                                <router-link to="/supplier-invoice-create" class="btn btn-outline-primary btn-sm">
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
                                    <th class="text-center">Paid Amount</th>
                                    <th class="text-center">Due Amount</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody v-if="supplierInvoices.length > 0 ">

                                    <tr v-for="(supplierInvoice, index) in supplierInvoices">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">{{ supplierInvoice.supplier_id }}</td>
                                        <td class="text-center">{{ supplierInvoice.warehouse_id }}</td>
                                        <td class="text-center">
                                            <img v-show="supplierInvoice.image" :src="getImgUrl(supplierInvoice.image)"  class="img-fluid" style="max-height: 50px; max-width: 50px;" alt="User Avatar">
                                        </td>
                                        <td class="text-center">{{ supplierInvoice.paid_amount }}</td>
                                        <td class="text-center">{{ supplierInvoice.due_amount }}</td>
                                        <td class="text-center">
                                            <span v-if="supplierInvoice.status == 1" class="text-success">
                                                Active
                                            </span>
                                            <span v-else class="text-danger">
                                                Deactive
                                            </span>

                                        </td>
                                        <td class="text-center">
                                            <router-link :to="'/supplier-invoice/'+ supplierInvoice.id +'/show'" class="btn btn-xs btn-success mr-1 ml-1">
                                                <i class="fa fa-eye"></i>
                                            </router-link>

                                            <router-link :to="'/supplier-invoice/'+ supplierInvoice.id +'/edit'" class="btn btn-xs btn-success mr-1 ml-1">
                                                <i class="fa fa-edit"></i>
                                            </router-link>
                                            
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

            getImgUrl: function(image){
                var photo = "/images/supplier_invoice/"+ image
                if (image != 'default.png') {
                    return photo
                }else{
                    return "/images/supplier_invoice/"+ 'default.png'
                }
                return photo
                console.log(photo)
            },


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
