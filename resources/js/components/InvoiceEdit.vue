<template>
     <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-md-3 float-left">
                                <p><a href="/">Home</a> / Add New Invoice</p>
                          </div>
                          <div class="col-md-6">

                          </div>
                          <div class="col-md-3">
                              <div class="d-inline-flex float-right">
                                <router-link to="/invoice" class="btn btn-sm btn-primary float-right">
                                    <i class="nav-icon far fa-file-alt"></i> Invoice
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="background-color: #f6f6f7;">
                    <form @submit.prevent="addNewInvoice">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">

                                            <input @blur="onBlur2=true" @focus="onFocus2 = true;onBlur2 = false;" v-model="form.customer_name" @keyDown="keyDown2"  type="text" placeholder="Customer Name" class="form-control form-control-sm w-100" required>

                                            <div class="form.customer_name-items" style="z-index: 999; position: absolute; width: 29%; background-color: white; padding: 0px 10px; max-height: 150px; overflow: auto;">
                                              
                                              <div :class="currentFocus2 == index ? 'form.customer_name-active' : ''" v-for="(i, index) in customer_arr" v-if= "onFocus2 && i.customer_name.substr(0, form.customer_name.length).toUpperCase() == form.customer_name.toUpperCase()" @click="form.customer_name = i.customer_name; form.customer_phone = i.customer_phone; form.customer_email = i.customer_email; form.customer_address = i.customer_address; onFocus2 = false;">
                                                <strong>{{i.customer_name.substr(0, form.customer_name.length)}}</strong>{{i.customer_name.substr(form.customer_name.length)}}
                                              </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="warehouse_id" class="col-sm-3 form-control-label">Phone <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                           <input type="text" name="" v-model="form.customer_phone" class="form-control form-control-sm w-100">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="warehouse_id" class="col-sm-3 form-control-label">Email </label>
                                        <div class="col-sm-8">
                                           <input type="text" name="" v-model="form.customer_email" class="form-control form-control-sm w-100">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 form-control-label" style="margin-right: -28px;">Address <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                           <textarea  v-model="form.customer_address" cols="70" rows="1"></textarea>
                                        </div> 
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label pt-0">Date <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">                                      
                                            <datetime format="DD/MM/YYYY h:i:s" width="200px" v-model="form.invoice_date" class=""  autocomplete="off"></datetime>
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

                                               <input v-model="product.product_name" placeholder="Item Name" required type="text" class="form-control-sm w-100" autocomplete="off">
                                            </td>
                                            <td style="width: 320px">
                                                <input v-model="product.product_quantity" placeholder="Product Quantity" type="text" class="form-control-sm w-100" autocomplete="off" required>
                                            </td>
                                            <td>
                                                <input v-model="product.sell_price" placeholder="Product Price" type="text" class="form-control-sm w-100" autocomplete="off" required>
                                            </td>
                                            <td class="text-center">
                                                <input class="form-control-sm w-100" :value="product.product_quantity * product.sell_price" type="text" style="text-align: center;" disabled>
                                            </td>
                                            <td class="text-center">
                                                <span @click="deleteRow(index)" class="btn btn-danger btn-sm">&times;</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="text-align:right;" colspan="3"><b>Discount:</b></td>
                                            <td class="text-right">
                                                <input id="paidAmount" class="form-control-sm w-100" v-model="form.discount" value="" name="discount" type="number" required style="text-align: center;">
                                            </td>
                                            <td align="center">
                                                <input id="add-invoice-item" class="btn btn-info btn-sm" name="add-invoice-item" @click="add_new_row_to_invoice" value="Add New Item" type="button">
                                            </td>
                                        </tr>

                                        <tr id="appssss">
                                            <td colspan="3" style="text-align:right;"><b>Grand Total:</b></td>
                                            <td class="text-center">
                                                <input class="form-control-sm w-100" v-model="grand_total_price" type="text" style="text-align: center;" disabled>
                                            </td>
                                        </tr> 

                                        <tr v-show="total">
                                            <td colspan="3" style="text-align:right;"><b>Final Total:</b></td>
                                            <td class="text-center">
                                                <input class="form-control-sm w-100" v-model="total" type="text" style="text-align: center;" disabled>
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
                                                <input class="form-control-sm w-100"  :value="due_amount"  type="number" style="text-align: center;" disabled>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="card-footer">
                                    <router-link to="/supplier-invoice" class="btn btn-sm btn-default float-left">
                                        Back to Invoice list
                                    </router-link>

                                    <button class="btn btn-sm btn-success float-right" >
                                        Create Invoice
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

    data() {
        return {
            form: new Form({
             id : '',
              customer_name : '',
              customer_phone : '',
              customer_email : '',
              customer_address : '',
              invoice_date :new Date().toLocaleString(),

              products:[{product_name : '',product_quantity : 1,sell_price : 0 }],

              grand_total_price : '',
              discount : '',
              paid_amount : '',
              due_amount : 0
            }),

            products:[],
            product_arr: [],
            currentFocus: '',
            autocomplete: '',
            onBlur: true,
            onFocus: false,

            customer_arr: [],
            currentFocus2: '',
            autocomplete2: '',
            onBlur2: true,
            onFocus2: false
        }
    },

    mounted(){
        this.getInvoice();
    },

    computed: {

        grand_total_price: function() {
            var temp = this
            return temp.form.products.reduce(function(carry, product) {
                let total = carry + (parseFloat(product.product_quantity) * parseFloat(product.sell_price));
                    temp.form.grand_total_price = total;
                    return total
            }, 0);
        },

        total: function() {
            var temp = this
            let discount = temp.form.grand_total_price - parseFloat(temp.form.discount);
                return discount      
        },

        due_amount: function() {
            var temp = this
            let total = temp.total;
            if (total) {
                let fdiscount = total - parseFloat(temp.form.paid_amount);
                temp.form.due_amount = fdiscount;
                return fdiscount
            }else{
                let due_ammount = temp.form.grand_total_price - parseFloat(temp.form.paid_amount);
                temp.form.due_amount = due_ammount;
                return due_ammount
            }           
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

        addActive2(){
          var vm2 = this;
          if (!vm2.array) return false;
          if (vm2.currentFocus >= vm2.array.length) vm2.currentFocus = 0;
          if (vm2.currentFocus < 0) vm2.currentFocus = (vm2.array.length - 1);
        },
        keyDown2(e){ 
            var vm2 = this;
              if (e.keyCode == 40) {
              vm2.currentFocus++;
              vm2.addActive2()
            } else if (e.keyCode == 38) {
              vm2.currentFocus;
              vm2.addActive2()
            }
        },

        updateSupplierInvoice: function(){
            this.$Progress.start()
            var temp = this
            temp.form.products = temp.products;
            axios.put('/api/supllier-invoice/'+this.form.id,{
                SupplierInvoice:temp.form
            })
            .then(function (response) {
              toastr.success('Updated Supplier Successfully');
              temp.$Progress.finish()
            })
            .catch(function (error) {
              toastr.error('Updated Supplier Failed')
              temp.$Progress.fail()
            });
        },

        getImgUrl: function(image){
            var photo = "/images/supplier_invoice/"+ image
            return photo
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
            var temp = this;
            this.products.push({product_name : '', product_quantity : 1, product_price : 0 })
        },

        deleteRow: function(index){
           this.products.splice(index, 1)
        },

        getInvoice(){
            var temp = this;
            axios.get('/api/invoices/'+this.$route.params.id)
            .then((response) => {

              temp.form = response.data.Invoice;
              temp.products = response.data.InvoiceProduct;
              temp.product_arr = response.data.InvoiceProduct;
            })
            .catch(function (error) {
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
