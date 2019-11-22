<template>
    <div class="container">
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
                                            <select id="supplier_id" v-model="form.supplier_id" name="supplier_id" class="form-control-sm w-100 w-100">
                                                 <option v-for="supplier in suppliers" :value="supplier.id">{{ supplier.supplier_name }}</option>
                                            </select>
                                            <input id="auth_id" type="hidden" name="auth_id" value="1">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="warehouse_id" class="col-sm-3 form-control-label">Warehouse </label>
                                        <div class="col-sm-8">
                                            <select id="warehouse_id" v-model="form.warehouse_id" name="warehouse_id" class="form-control-sm w-100 w-100" data-plugin="select2">
                                                <option v-for="warehouse in warehouses" :value="warehouse.id">{{ warehouse.warehouse_name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row mb-1">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">                                           
                                            <datetime format="DD/MM/YYYY h:i:s" width="300px" v-model="form.invoice_date" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('invoice_date') }" autocomplete="off"></datetime>
                                            <!-- <input v-model="form.invoice_date" @change="someHandler(this)" id="datetimepicker" type="text" value="" class="form-control" :class="{ 'is-invalid': form.errors.has('invoice_date') }" autocomplete="off"> -->
                                            <has-error :form="form" field="invoice_date"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">

                                             <input type="file" accept="image/*" @change="onChange" />
  <div id="preview">
    <img v-if="item.imageUrl" :src="item.imageUrl" />
  </div>

                                             <!-- <input type="file" accept="image/jpeg" @change="uploadImage"> -->
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
                                                <!-- <input v-model="product.product_name" name="product_name[]" class="form-control-sm w-100 productSelection" placeholder="Item Name" id="product_name" autocomplete="off" tabindex="1" type="text"> -->

                                                <input v-model="product.product_name" placeholder="Item Name" type="text" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('product_name') }" autocomplete="off">
                                                <has-error :form="form" field="product_name"></has-error>

                                            </td>
                                            <td style="width: 320px">
                                                <!-- <input v-model="product.product_quantity"  autocomplete="off" class="total_qty_1 form-control-sm w-100" id="total_qty_1"  value="2222" tabindex="2" type="text"> -->

                                                <input v-model="product.product_quantity" placeholder="Product Quantity" type="text" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('product_quantity') }" autocomplete="off">

                                            </td>
                                            <td>
                                                <!-- <input v-model="product.product_price" name="product_price[]" autocomplete="off" value="11111" id="item_price_1" placeholder="0.00" class="item_price_1 price_item form-control-sm w-100" tabindex="3" type="text"> -->

                                                <input v-model="product.product_price" placeholder="Product Price" type="text" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('product_price') }" autocomplete="off">

                                            </td>

                                            <td>
                                                <!-- <input v-model="product.sub_total_price" class="sub_total_price form-control-sm w-100" name="sub_total_price[]" id="total_price_1" placeholder="0.00" value="" tabindex="-1" type="text"> -->

                                                <input v-model="product.sub_total_price" type="text" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('sub_total_price') }" autocomplete="off">



                                            </td>

                                            <td class="text-center">
                                                <span @click="deleteRow(index)" class="btn btn-danger btn-sm">&times;</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>

                                        <tr id="appssss">
                                            <td colspan="3" style="text-align:right;"><b>Grand Total:</b></td>
                                            <td class="text-right">
                                                <input id="grandTotal" v-model="form.grand_total_price" class="form-control-sm w-100" name="grand_total_price" tabindex="-1" type="text">
                                            </td>
                                            <td align="center">
                                                <input id="add-invoice-item" class="btn btn-info btn-sm" name="add-invoice-item" @click="add_new_row_to_invoice" value="Add New Item" tabindex="5" type="button">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td align="center" colspan="2">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="full_paid_tab" value="100">
                                                        <label for="full_paid_tab" class="custom-control-label">Custom Checkbox</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align:right;" colspan="1"><b>Paid Amount:</b></td>
                                            <td class="text-right">
                                                <input id="paidAmount" class="form-control-sm w-100" v-model="form.paid_amount" value="5455" name="paid_amount" tabindex="6" type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="2">
                                                <input id="add-invoice" class="btn btn-sm btn-success w-50" name="add-invoice" value="Submit" tabindex="8" type="submit">
                                            </td>
                                            <td style="text-align:right;" colspan="1"><b>Due:</b></td>
                                            <td class="text-right">
                                                <input id="dueAmmount" v-model="form.due_amount" class="form-control-sm w-100" name="due_amount" value="3333"  type="text">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
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
        return {
            form: new Form({
              id : '',
              products:[{product_name : '',product_quantity : 1,product_price : 0,sub_total_price : '' }],

              supplier_id : '',
              warehouse_id : '',
              invoice_date :new Date().toLocaleString('en-GB'),
              image : '',
            }), 

            item:{
              //...
              image : null,
              imageUrl: null
            },

            suppliers:{},
            warehouses:{}
        }
    },

    mounted(){
        this.getSuppliers();
        this.getWarehouses();
    },

    // computed: {
    // // a computed getter
    //     reversedMessage: function () {
    //       // `this` points to the vm instance
    //       return this.form.sub_total_price = this.form.product_quantity+3
    //     }
    // }

    methods:{

        addNewSupplierInvoice(){
            var temp = this
            temp.$Progress.start()
            temp.form.post('/api/supllier-invoice')
            .then(function (response) {

                console.log(response)
              toastr.success('Saved Supplier Invoice Successfully'),
              temp.$Progress.finish()
            })
            .catch(function (error) {
              toastr.error('Saved Supplier Invoice Failed')
              temp.$Progress.fail()
            });
        },

        onChange(e) {
          const file = e.target.files[0]
          this.image = file
          this.item.imageUrl = URL.createObjectURL(file)
        },

        someHandler: function(me){
            console.log(me);
            // this.form.invoice_date = ''
        },


        add_new_row_to_invoice: function(){
            this.form.products.push({product_name : '',product_quantity : 1,product_price : 0,sub_total_price : '' })
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
