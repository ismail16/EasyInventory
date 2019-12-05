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
                                <router-link to="/supplier-invoice" class="btn btn-sm btn-primary float-right">
                                    <i class="nav-icon far fa-file-alt"></i>Invoice
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="background-color: #f6f6f7;">
                    <form @submit.prevent="addNewInvoice">
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-8">
                                   <div class="form-group row">
                                        <label class="col-sm-3 form-control-label" style="margin-right: -44px;">Expense Title <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input v-model="form.expense_title" type="text" name="expense_title"
                                            placeholder="Expense Title"
                                            class="form-control form-control-sm w-100 rounded-0" :class="{ 'is-invalid': form.errors.has('expense_title') }">
                                            <has-error :form="form" field="expense_title"></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                   <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">                                      
                                            <datetime format="DD/MM/YYYY h:i:s" width="300px" v-model="form.expense_date" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('expense_date') }" autocomplete="off"></datetime>
                                            <has-error :form="form" field="expense_date"></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                   <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Expense Detail <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <textarea cols="128" rows="2" v-model="form.expense_detail"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover" id="normalinvoice">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Expense Purpose  <i class="text-danger">*</i></th>
                                            <th class="text-center">Expense Quantity <i class="text-danger">*</i></th>
                                            <th class="text-center">Expense Amount <i class="text-danger">*</i></th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add_row_to_invoice">

                                        <tr v-for="(expense, index) in form.expenses">
                                            <td style="width: 320px">
                                                <input v-model="expense.expense_purpose" placeholder="Expense Purpose" required type="text" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('expense_purpose') }" autocomplete="off">
                                                <has-error :form="form" field="expense_purpose"></has-error>
                                            </td>
                                            <td style="width: 320px">
                                                <input v-model="expense.expense_quantity" placeholder="Expense Quantity" type="text" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('expense_quantity') }" autocomplete="off" required>

                                            </td>
                                            <td>
                                                <input v-model="expense.expense_amount" placeholder="Expense Amount" type="text" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('expense.expense_amount') }" autocomplete="off" required>
                                            </td>
                                            <td class="text-center">
                                                <input class="form-control-sm w-100" :value="expense.expense_quantity * expense.expense_amount" type="text" style="text-align: center;" disabled>
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
              expenses:[{expense_name : '', expense_quantity : 1, expense_amount : 0}],

              supplier_id : '',
              warehouse_id : '',
              expense_date :new Date().toLocaleString(),
              grand_total_price : '',
              paid_amount : '',
              due_amount : ''
          }), 
            expense_arr: []
        }
    },

    mounted(){

    },

    computed: {
        grand_total_price: function() {
            var temp = this
            return temp.form.expenses.reduce(function(carry, expense) {
                let total = carry + (parseFloat(expense.expense_quantity) * parseFloat(expense.expense_amount));
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
                return fdiscount
            }else{
                let due_ammount = temp.form.grand_total_price - parseFloat(temp.form.paid_amount);
                return due_ammount
            }           
        }


    },

    methods:{

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
            this.form.expenses.push({expense_name : '',expense_quantity : 1,expense_amount : 0,sub_total_price : '' })
        },

        deleteRow: function(index){
            this.form.expenses.splice(index, 1)
        },
    }
}
</script>
