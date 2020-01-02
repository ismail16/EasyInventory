<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-3 float-left">
                                    <p><router-link to="/dashboard"> Home </router-link> / Add New Invoice</p>
                                </div>
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-3">
                                    <div class="d-inline-flex float-right">
                                        <router-link to="/invoice" class="btn btn-sm btn-primary float-right">
                                            <i class="nav-icon far fa-file-alt"></i> Invoices
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg_light_gray">
                            <form @submit.prevent="addNewInvoice">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Name <i class="text-danger">*</i></label>
                                                <div class="col-sm-8">

       <model-list-select :list="options1"
                     v-model="objectItem"
                     option-value="customer_name"
                     option-text="customer_name"
                     placeholder="select item">
  </model-list-select>

                                                    <!-- <input @blur="onBlur2=true" @focus="onFocus2 = true;onBlur2 = false;" v-model="form.customer_name" @keyDown="keyDown2"  type="text" placeholder="Customer Name" class="form-control form-control-sm w-100" required> -->

                                                  <!--   <div class="form.customer_name-items" style="z-index: 999; position: absolute; width: 29%; background-color: white; padding: 0px 10px; max-height: 150px; overflow: auto;">

                                                        <div :class="currentFocus2 == index ? 'form.customer_name-active' : ''" v-for="(i, index) in customer_arr" v-if= "onFocus2 && i.customer_name.substr(0, form.customer_name.length).toUpperCase() == form.customer_name.toUpperCase()" @click="form.customer_name = i.customer_name; form.customer_phone = i.customer_phone; form.customer_email = i.customer_email; form.customer_address = i.customer_address; onFocus2 = false;">
                                                            <strong>{{i.customer_name.substr(0, form.customer_name.length)}}</strong>{{i.customer_name.substr(form.customer_name.length)}}
                                                        </div>
                                                    </div> -->
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
                                                <label class="col-sm-2 form-control-label mr-n4">Address <i class="text-danger">*</i></label>
                                                <div class="col-sm-10">
                                                    <textarea  v-model="form.customer_address" class="form-control" rows="1"></textarea>
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label pt-0">Date <i class="text-danger">*</i></label>
                                                <div class="col-sm-9">
                                                    <input type="text" v-model="form.invoice_date" name="" class="form-control-sm w-100 datetimepicker" :class="{ 'is-invalid': form.errors.has('mfg_date') }" autocomplete="off">
                                                    <has-error :form="form" field="invoice_date"></has-error>
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

                                                            <div :class="currentFocus == index ? 'product.product_name-active' : ''" v-for="(i, index) in product_arr" v-if= "onFocus && i.product_name.substr(0, product.product_name.length).toUpperCase() == product.product_name.toUpperCase()" @click="product.product_name = i.product_name; product.sell_price = i.sell_price; onFocus = false;">
                                                                <strong>{{i.product_name.substr(0, product.product_name.length)}}</strong>{{i.product_name.substr(product.product_name.length)}}
                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td style="width: 320px">
                                                        <input v-model="product.product_quantity" placeholder="Product Quantity" type="text" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('product_quantity') }" autocomplete="off" required>
                                                    </td>
                                                    <td>
                                                        <input v-model="product.sell_price" placeholder="Product Price" type="text" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('product.sell_price') }" autocomplete="off" required>
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
                                                        <input id="paidAmount" class="form-control-sm w-100 text-center" v-model="form.discount" value="0" name="discount" type="number">
                                                    </td>
                                                    <td align="center">
                                                        <input id="add-invoice-item" class="btn btn-info btn-sm" name="add-invoice-item" @click="add_new_row_to_invoice" value="Add New Item" type="button">
                                                    </td>
                                                </tr>

                                                <tr id="appssss">
                                                    <td colspan="3" style="text-align:right;"><b>Grand Total:</b></td>
                                                    <td class="text-center">
                                                        <input class="form-control-sm w-100 text-center" v-model="grand_total_price" type="number" disabled>
                                                    </td>
                                                </tr> 

                                                <tr v-show="total">
                                                    <td colspan="3" style="text-align:right;"><b>Final Total:</b></td>
                                                    <td class="text-center">
                                                        <input class="form-control-sm w-100 text-center" v-model="total" type="number" disabled>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="text-align:right;" colspan="3"><b>Paid Amount:</b></td>
                                                    <td class="text-right">
                                                        <input id="paidAmount" class="form-control-sm w-100 text-center" v-model="form.paid_amount" value="" name="paid_amount" type="number" required>
                                                    </td>
                                                </tr>
                                                <tr v-show="due_amount">
                                                    <td style="text-align:right;" colspan="3"><b>Due:</b></td>
                                                    <td  class="text-center">
                                                        <input class="form-control-sm w-100 text-center"  :value="due_amount"  type="number" disabled>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="card-footer">
                                            <router-link to="/supplier-invoice" class="btn btn-sm btn-default float-left">
                                                Back to Invoice list
                                            </router-link>

                                            <button class="btn btn-sm btn-primary float-right" >
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
import { ModelListSelect } from 'vue-search-select'
export default {
    data() {
        var today = new Date();
        var current_date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();

        return {
            options1: [
          ],

        objectItem: {},
         stringItem: '',

            item: {
              value: '',
              text: ''
            },

            form: new Form({
                id : '',
                customer_name : '',
                customer_phone : '',
                customer_email : '',
                customer_address : '',
                invoice_date : current_date,

                products:[{product_name : '',product_quantity : 1,sell_price : 0 }],

                grand_total_price : '',
                discount : 0,
                paid_amount : '',
                due_amount : 0
            }), 

            // options: [],
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
        this.getProducts();
        var vm = this;
        document.addEventListener("click", function(e){
            vm.onBlur ?vm.onFocus = false: false
        });

        this.getCustomers();
        var vm2 = this;
        document.addEventListener("click", function(e){
            vm2.onBlur2 ?vm2.onFocus2 = false: false
        });
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

    components: {
      ModelListSelect
    },

    methods:{

        codeAndNameAndDesc (item) {
        return `${item.customer_name} - ${item.customer_name} - ${item.customer_name}`
      },
      reset1 () {
        this.objectItem = {}
      },
      selectFromParentComponent1 () {
        // select option from parent component
        this.objectItem = this.options[0]
      },
      reset2 () {
        this.stringItem = ''
      },
      selectFromParentComponent2 () {
        // select option from parent component
        this.stringItem = this.options[0].code
      },

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


        addNewInvoice(){
            var temp = this
            temp.$Progress.start()
            temp.form.post('/api/invoices')
            .then(function (response) {
                console.log(response)
                toastr.success('Saved Invoice Successfully')
                temp.$Progress.finish()
            })
            .catch(function (error) {
                toastr.error('Saved Invoice Failed')
                temp.$Progress.fail()
            });
        },

        add_new_row_to_invoice: function(){
            this.form.products.push({product_name : '',product_quantity : 1,sell_price : 0 })
        },

        deleteRow: function(index){
            this.form.products.splice(index, 1)
        },

        getCustomers(){
            var temp = this;
            axios.get('/api/customers')
            .then((response) => {
                temp.options1 = response.data.data;
            })
            .catch(function (error) {
                this.loadin = true; 
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
    }
}
</script>
