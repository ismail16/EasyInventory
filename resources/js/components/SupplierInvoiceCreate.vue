<template>
    <div class="container">
        <!-- hukTnOztP5tzBwH5jwVKqztE7OR6heUccNGizTPXp9QFTphl4pr4atir501a -->
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-md-3 float-left">
                                <p><a href="/">Home</a> / Add New SupplierInvoice</p>
                          </div>
                          <div class="col-md-6">

                          </div>
                          <div class="col-md-3">
                              <div class="d-inline-flex float-right">
                                <router-link to="/supplier-invoice" class="btn btn-sm btn-primary float-right">
                                    <i class="nav-icon far fa-file-alt"></i> Supplier Invoice
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="background-color: #f6f6f7;">
                    <form @submit.prevent="addNewSupplierInvoice">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Select Supplier <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <select id="supplier_id" v-model="form.supplier_id" name="supplier_id" class="form-control-sm w-100 w-100" required>
                                                 <option v-for="supplier in suppliers" :value="supplier.id">{{ supplier.supplier_name }}</option>
                                            </select>
                                            <input id="auth_id" type="hidden" name="auth_id" value="1">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="warehouse_id" class="col-sm-3 form-control-label">Warehouse </label>
                                        <div class="col-sm-8">
                                            <select id="warehouse_id" v-model="form.warehouse_id" name="warehouse_id" class="form-control-sm w-100 w-100" data-plugin="select2" required>
                                                <option v-for="warehouse in warehouses" :value="warehouse.id">{{ warehouse.warehouse_name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row mb-1">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">            
                                            <input type="text"  v-model="form.invoice_date" name="" class="form-control-sm w-100 datetimepicker" :class="{ 'is-invalid': form.errors.has('invoice_date') }" autocomplete="off">

                                            <!-- <datetime format="DD/MM/YYYY h:i:s" width="300px" v-model="form.invoice_date" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('invoice_date') }" autocomplete="off"></datetime> -->
                                            <has-error :form="form" field="invoice_date"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-7 ml-2">
                                            <input type="file" :src="form.image" @change="uploadImage" />
                                        </div>

                                        <div id="preview col-sm-2">
                                            <img v-if="img_url" :src="img_url" class="img-fluid" style="max-height: 50px; max-width: 50px;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive" style="margin-top: 10px">
                                <table class="table table-bordered table-sm table-hover" id="normalinvoice">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Item Information <i class="text-danger">*</i></th>
                                            <th class="text-center">Quantity <i class="text-danger">*</i></th>
                                            <th class="text-center">Rate <i class="text-danger">*</i></th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add_row_to_invoice">

                                        <tr v-for="(product, index) in form.products">
                                            <td style="width: 320px">

    <input @blur="onBlur=true" @focus="onFocus = true;onBlur = false;" v-model="product.product_name" @keyDown="keyDown"  type="text" placeholder="Product Name" class="form-control-sm w-100" required>
    <div class="product.product_name-items" style="z-index: 999; position: absolute; width: 29%; background-color: white; padding: 0px 10px; max-height: 150px; overflow: auto;">
      
      <div :class="currentFocus == index ? 'product.product_name-active' : ''" v-for="(i, index) in product_arr" v-if= "onFocus && i.product_name.substr(0, product.product_name.length).toUpperCase() == product.product_name.toUpperCase()" @click="product.product_name = i.product_name; product.supplier_price = i.supplier_price; onFocus = false;">
        <strong>{{i.product_name.substr(0, product.product_name.length)}}</strong>{{i.product_name.substr(product.product_name.length)}}
      </div>
    </div>

                                            </td>
                                            <td style="width: 320px">
                                                <input v-model="product.product_quantity" placeholder="Product Quantity" type="text" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('product_quantity') }" autocomplete="off" required>

                                            </td>
                                            <td>
                                                <input v-model="product.supplier_price" placeholder="Product Price" type="text" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('product.supplier_price') }" autocomplete="off" required>
                                            </td>
                                            <td class="text-center">
                                                <input class="form-control-sm w-100" :value="product.product_quantity * product.supplier_price" type="text" style="text-align: center;" disabled>
                                            </td>

                                            <td class="text-center">
                                                <span @click="deleteRow(index)" class="btn btn-danger btn-sm">&times;</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr id="appssss">
                                            <td colspan="3" style="text-align:right;"><b>Grand Total:</b></td>
                                            <td class="text-center">
                                                <input class="form-control-sm w-100" v-model="grand_total_price" type="text" style="text-align: center;" disabled>
                                            </td>
                                            <td align="center">
                                                <input id="add-invoice-item" class="btn btn-info btn-sm" name="add-invoice-item" @click="add_new_row_to_invoice" value="Add New Item" type="button">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td style="text-align:right;" colspan="3"><b>Paid Amount:</b></td>
                                            <td class="text-right">
                                                <input id="paidAmount" class="form-control-sm w-100" v-model="form.paid_amount" value="5455" name="paid_amount" type="number" required style="text-align: center;">
                                            </td>
                                        </tr>
                                        <tr v-show="due_amount">
                                            <td style="text-align:right;" colspan="3"><b>Due:</b></td>
                                            <td  class="text-center">
                                                <input class="form-control-sm w-100" :value="due_amount"  type="number" style="text-align: center;" disabled>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="card-footer">
                                    <router-link to="/supplier-invoice" class="btn btn-sm btn-default float-left">
                                        Back to Invoice list
                                    </router-link>

                                    <button class="btn btn-sm btn-success float-right" >
                                        Create Supplier Invoice
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</template>

<script>
import datetime from 'vuejs-datetimepicker'
export default {

    components: { datetime },
    name: 'imageUpload',

    // https://www.youtube.com/watch?v=h6sTdAX6yTs
    // https://github.com/codekerala/laravel-vuejs-invoice/blob/master/resources/views/invoices/form.blade.php

    data() {
        var today = new Date();
        var current_date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();

        return {
            form: new Form({
              id : '',
              products:[{product_name : '',product_quantity : 1,supplier_price : 0}],

              supplier_id : '',
              warehouse_id : '',
              invoice_date : current_date,
              image : '',
              grand_total_price : '',
              paid_amount : '',
              discount : '',
              due_amount : ''
          }), 

            img_url: '',

            suppliers:{},
            warehouses:{},


            currentFocus: '',
            autocomplete: '',
            onBlur: true,
            onFocus: false,
            product_arr: []
        }
    },

    mounted(){
        this.getSuppliers();
        this.getWarehouses();
        this.getProducts();


        var vm = this;
        document.addEventListener("click", function(e){
          vm.onBlur ?vm.onFocus = false: false});
        },

    computed: {
        grand_total_price: function() {
            var temp = this
            return temp.form.products.reduce(function(carry, product) {
                let total = carry + (parseFloat(product.product_quantity) * parseFloat(product.supplier_price));
                temp.form.grand_total_price = total
                return total
            }, 0);
        },
        due_amount: function() {
            var temp = this
            let due_ammount = temp.form.grand_total_price - parseFloat(temp.form.paid_amount);
            temp.form.due_amount = due_ammount
            return due_ammount
        }
    },

    methods:{


        addActive(){
          var vm = this;
          if (!vm.array) return false;
          if (vm.currentFocus >= vm.array.length) vm.currentFocus = 0;
          if (vm.currentFocus < 0) vm.currentFocus = (vm.array.length - 1);
        },

        keyDown(e){ 
            var vm = this;
              if (e.keyCode == 40) {
              vm.currentFocus++;
              vm.addActive()
            } else if (e.keyCode == 38) {
              vm.currentFocus;
              vm.addActive()
            }
        },

        addNewSupplierInvoice(){
            var temp = this
            temp.$Progress.start()
            temp.form.post('/api/supllier-invoice')
            .then(function (response) {
                console.log(response)
                toastr.success('Saved Supplier Invoice Successfully')
                temp.$Progress.finish()
            })
            .catch(function (error) {
              toastr.error('Saved Supplier Invoice Failed')
              temp.$Progress.fail()
          });
        },

        uploadImage(e) {
            let file = e.target.files[0];
            let reader = new FileReader();
            let limit = 1024 * 1024 * 2;
            if(file['size'] > limit){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'You are uploading a large file',
                })
                return false;
            }else{
                file = e.target.files[0]
                this.img_url = URL.createObjectURL(file);
            }
            reader.onloadend = (file) => {
                this.form.image = reader.result
            }
            reader.readAsDataURL(file);
        },

        add_new_row_to_invoice: function(){
            this.form.products.push({product_name : '',product_quantity : 1,supplier_price : 0,sub_total_price : '' })
        },

        deleteRow: function(index){
            this.form.products.splice(index, 1)
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

        getProducts(){
            var temp = this;
            axios.get('/api/products')
            .then((response) => {
              temp.product_arr = response.data.data;
          })
            .catch(function (error) {
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
