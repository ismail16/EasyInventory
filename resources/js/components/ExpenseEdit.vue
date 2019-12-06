<template>
    <div class="container">
<<<<<<< HEAD
=======
        <!-- hukTnOztP5tzBwH5jwVKqztE7OR6heUccNGizTPXp9QFTphl4pr4atir501a -->
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-md-3 float-left">
<<<<<<< HEAD
                                <p><a href="/">Home</a> / Update Expense</p>
=======
                                <p><a href="/">Home</a> / Add New SupplierInvoice</p>
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
                          </div>
                          <div class="col-md-6">

                          </div>
                          <div class="col-md-3">
                              <div class="d-inline-flex float-right">
<<<<<<< HEAD
                                <router-link to="/expense" class="btn btn-sm btn-primary float-right">
                                    <i class="nav-icon far fa-file-alt"></i> Expense list
=======
                                <router-link to="/supplier-invoice" class="btn btn-sm btn-primary float-right">
                                    <i class="nav-icon far fa-file-alt"></i> Supplier Invoice
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="background-color: #f6f6f7;">
<<<<<<< HEAD
                    <form @submit.prevent="updateExpense">
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-8">
                                   <div class="form-group row">
                                        <label class="col-sm-3 form-control-label" style="margin-right: -44px;">Expense Title <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input v-model="form.expense_title" type="text" name="expense_title"
                                            placeholder="Expense Title"
                                            class="form-control form-control-sm w-100 rounded-0">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                   <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">                                      
                                            <datetime format="DD/MM/YYYY h:i:s" width="300px" v-model="form.expense_date" class="form-control-sm w-100" autocomplete="off"></datetime>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                   <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Expense Detail <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <textarea cols="128" rows="2" v-model="form.expense_detail"></textarea>
=======
                    <form @submit.prevent="updateSupplierInvoice">
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
                                            <datetime format="DD/MM/YYYY h:i:s" width="300px" v-model="form.invoice_date" class="form-control-sm w-100" autocomplete="off"></datetime>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-7 ml-2">
                                            <input type="file" :src="form.image" @change="uploadImage" />
                                        </div>

                                        <div v-if="!img_url" id="preview col-sm-2">
                                            <img v-show="this.form.image" :src="getImgUrl(this.form.image)"  class="img-fluid" style="max-height: 50px; max-width: 50px;" alt="User Avatar">
                                        </div>

                                        <div id="preview col-sm-2">
                                            <img v-if="img_url" :src="img_url" class="img-fluid" style="max-height: 50px; max-width: 50px;"/>
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
                                        </div>
                                    </div>
                                </div>
                            </div>

<<<<<<< HEAD
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover" id="normalExpense">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Expense Purpose  <i class="text-danger">*</i></th>
                                            <th class="text-center">Expense Quantity <i class="text-danger">*</i></th>
                                            <th class="text-center">Expense Amount <i class="text-danger">*</i></th>
=======
                            <div class="table-responsive" style="margin-top: 10px">
                                <table class="table table-bordered table-sm table-hover" id="normalinvoice">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Item Information <i class="text-danger">*</i></th>
                                            <th class="text-center">Quantity <i class="text-danger">*</i></th>
                                            <th class="text-center">Rate <i class="text-danger">*</i></th>
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
<<<<<<< HEAD
                                    <tbody id="add_row_to_Expense">

                                        <tr v-for="(expense, index) in expense_items">
                                            <td style="width: 320px">
                                                <input v-model="expense.expense_purpose" placeholder="Expense Purpose" required type="text" class="form-control-sm w-100" autocomplete="off">
                                            </td>
                                            <td style="width: 320px">
                                                <input v-model="expense.expense_quantity" placeholder="Expense Quantity" type="text" class="form-control-sm w-100" autocomplete="off" required>

                                            </td>
                                            <td>
                                                <input v-model="expense.expense_amount" placeholder="Expense Amount" type="text" class="form-control-sm w-100" autocomplete="off" required>
                                            </td>
                                            <td class="text-center">
                                                <input class="form-control-sm w-100" :value="expense.expense_quantity * expense.expense_amount" type="text" style="text-align: center;" disabled>
=======
                                    <tbody id="add_row_to_invoice">

                                        <tr v-for="(product, index) in products">
                                            <td style="width: 320px">
                                                <input v-model="product.product_name" placeholder="Item Name" required type="text" class="form-control-sm w-100" autocomplete="off">

                                            </td>
                                            <td style="width: 320px">
                                                <input v-model="product.product_quantity" placeholder="Product Quantity" type="text" class="form-control-sm w-100" autocomplete="off" required>

                                            </td>
                                            <td>
                                                <input v-model="product.product_price" placeholder="Product Price" type="text" class="form-control-sm w-100" autocomplete="off" required>
                                            </td>
                                            <td class="text-center">
                                                <input class="form-control-sm w-100" :value="product.product_quantity * product.product_price" tabindex="-1" type="text" style="text-align: center;" disabled>
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
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
<<<<<<< HEAD
                                                <input class="form-control-sm w-100" v-model="expense_total_amount" type="text" style="text-align: center;" disabled>
                                            </td>
                                            <td align="center">
                                                <input id="add-Expense-item" class="btn btn-info btn-sm" name="add-Expense-item" @click="add_new_row_to_Expense" value="Add New Item" type="button">
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td style="text-align:right;" colspan="3"><b>Paid Amount:</b></td>
                                            <td class="text-right">
                                                <input id="paidAmount" class="form-control-sm w-100" v-model="form.expense_paid_amount" value="5455" name="expense_paid_amount" type="number" required style="text-align: center;">
                                            </td>
                                        </tr>
                                        <tr v-show="expense_due">
                                            <td style="text-align:right;" colspan="3"><b>Due:</b></td>
                                            <td  class="text-center">
                                                <input class="form-control-sm w-100" :value="expense_due"  type="number" style="text-align: center;" disabled>
=======
                                                <input class="form-control-sm w-100" :value="grand_total_price" tabindex="-1" type="text" style="text-align: center;" disabled>
                                            </td>
                                            <td align="center">
                                                <input id="add-invoice-item" class="btn btn-info btn-sm" name="add-invoice-item" @click="add_new_row_to_invoice" value="Add New Item" tabindex="5" type="button">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td style="text-align:right;" colspan="3"><b>Paid Amount:</b></td>
                                            <td class="text-right">
                                                <input id="paidAmount" class="form-control-sm w-100" v-model="form.paid_amount" value="5455" name="paid_amount" tabindex="6" type="number" required style="text-align: center;">
                                            </td>
                                        </tr>
                                        <tr v-show="due_amount">
                                            <td style="text-align:right;" colspan="3"><b>Due:</b></td>
                                            <td  class="text-center">
                                                <input class="form-control-sm w-100" :value="due_amount"  type="number" style="text-align: center;" disabled>
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="card-footer">
<<<<<<< HEAD
                                    <router-link to="/supplier-Expense" class="btn btn-sm btn-default float-left">
                                        Back to Expense list
                                    </router-link>

                                    <button class="btn btn-sm btn-success float-right" >
                                        Update Expense
=======
                                    <router-link to="/supplier-invoice" class="btn btn-sm btn-default float-left">
                                        Back to Invoice list
                                    </router-link>

                                    <button class="btn btn-sm btn-success float-right" >
                                        Update Supplier Invoice
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
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
<<<<<<< HEAD
    components: { datetime },
=======

    components: { datetime },
    // name: 'imageUpload',
    // https://www.youtube.com/watch?v=h6sTdAX6yTs
    // https://github.com/codekerala/laravel-vuejs-invoice/blob/master/resources/views/invoices/form.blade.php
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888

    data() {
        return {
            form: new Form({
              id : '',
<<<<<<< HEAD
              expense_items:[],

              // expenses:[{expense_purpose : '', expense_quantity : 1, expense_amount : 0}],
              expense_date :'',
              expense_total_amount : '',
              expense_paid_amount : '',
              expense_due : ''
            }),

            expense_items:[]
=======
              products:[],

              supplier_id : '',
              warehouse_id : '',
              invoice_date :'',
              image : '',
              grand_total_price : '',
              paid_amount : '',
              discount : '',
              due_amount : ''
            }),
            img_url: '',
            suppliers:{},
            warehouses:{},
            products:[]
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
        }
    },

    mounted(){
<<<<<<< HEAD
        this.getExpense();
=======
        this.getSuppliers();
        this.getWarehouses();
        this.getSupplierInvoice();
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
    },

    computed: {

<<<<<<< HEAD
        expense_total_amount: function() {
            var temp = this
            return temp.expense_items.reduce(function(carry, expense) {
                let total = carry + (parseFloat(expense.expense_quantity) * parseFloat(expense.expense_amount));
                temp.form.expense_total_amount = total
=======
        grand_total_price: function() {
            var temp = this
            return temp.products.reduce(function(carry, product) {
                let total = carry + (parseFloat(product.product_quantity) * parseFloat(product.product_price));
                temp.form.grand_total_price = total
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
                return total
            }, 0);
        },

<<<<<<< HEAD
        expense_due: function() {
           var temp = this
           let expense_due = temp.expense_total_amount - parseFloat(temp.form.expense_paid_amount);
           temp.form.expense_due = expense_due
           return expense_due
=======
        due_amount: function() {
           var temp = this
           let due_ammount = temp.grand_total_price - parseFloat(temp.form.paid_amount);
           temp.form.due_amount = due_ammount
           return due_ammount
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
        }
    },

    methods:{

<<<<<<< HEAD
        updateExpense: function(){
            this.$Progress.start()
            var temp = this
            temp.form.expense_items = temp.expense_items;
            axios.put('/api/expenses/'+this.form.id,{
                expenses:temp.form
            })
            .then(function (response) {
                console.log(response)
=======
        updateSupplierInvoice: function(){
            this.$Progress.start()
            var temp = this
            temp.form.products = temp.products;
            axios.put('/api/supllier-invoice/'+this.form.id,{
                SupplierInvoice:temp.form
            })
            .then(function (response) {
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
              toastr.success('Updated Supplier Successfully');
              temp.$Progress.finish()
            })
            .catch(function (error) {
              toastr.error('Updated Supplier Failed')
              temp.$Progress.fail()
            });
        },

<<<<<<< HEAD
        add_new_row_to_Expense: function(){
            var temp = this;
            this.expense_items.push({expense_purpose : '', expense_quantity : 1, expense_amount : 0 })
        },

        deleteRow: function(index){
           this.expense_items.splice(index, 1)
        },

        getExpense(){
            var temp = this;
            axios.get('/api/expenses/'+this.$route.params.id)
            .then((response) => {

                console.log(response);
              temp.form = response.data.expense;
              temp.expense_items = response.data.expense_items;
=======
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

        getSupplierInvoice(){
            var temp = this;
            axios.get('/api/supllier-invoice/'+this.$route.params.id)
            .then((response) => {
              temp.form = response.data.supplierInvoice;
              temp.products = response.data.supplierInvoiceProduct;
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
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
            })
            .catch(function (error) {
              toastr.error('Something is wrong Data Loaded')
            });
        },
<<<<<<< HEAD
=======

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
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
    }
}
</script>
