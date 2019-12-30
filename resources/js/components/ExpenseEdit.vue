<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-md-3 float-left">
                                <p><router-link to="/dashboard"> Home </router-link> / Update Expense</p>
                          </div>
                          <div class="col-md-6">

                          </div>
                          <div class="col-md-3">
                              <div class="d-inline-flex float-right">
                                <router-link to="/expense" class="btn btn-sm btn-primary float-right">
                                    <i class="nav-icon far fa-file-alt"></i> Expense list
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="background-color: #f6f6f7;">
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
                                            <input type="text" v-model="form.expense_date" name="" class="form-control-sm w-100 datetimepicker" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group row">
                                        <label class="col-sm-2 form-control-label" style="margin-right: -45px;">Expense Detail <i class="text-danger">*</i></label>
                                        <div class="col-sm-10">
                                            <textarea  rows="2" class="form-control" v-model="form.expense_detail"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover" id="normalExpense">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Expense Purpose  <i class="text-danger">*</i></th>
                                            <th class="text-center">Expense Quantity <i class="text-danger">*</i></th>
                                            <th class="text-center">Expense Amount <i class="text-danger">*</i></th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
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
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="card-footer">
                                    <router-link to="/expense" class="btn btn-sm btn-default float-left">
                                        Back to Expense list
                                    </router-link>

                                    <button class="btn btn-sm btn-success float-right" >
                                        Update Expense
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
// import datetime from 'vuejs-datetimepicker'
export default {
    // components: { datetime },

    data() {
        return {
            form: new Form({
              id : '',
              expense_items:[],

              // expenses:[{expense_purpose : '', expense_quantity : 1, expense_amount : 0}],
              expense_date :'',
              expense_total_amount : '',
              expense_paid_amount : '',
              expense_due : ''
            }),

            expense_items:[]
        }
    },

    mounted(){
        this.getExpense();
    },

    computed: {
        expense_total_amount: function() {
            var temp = this
            return temp.expense_items.reduce(function(carry, expense) {
                let total = carry + (parseFloat(expense.expense_quantity) * parseFloat(expense.expense_amount));
                temp.form.expense_total_amount = total
                return total
            }, 0);
        },

        expense_due: function() {
           var temp = this
           let expense_due = temp.expense_total_amount - parseFloat(temp.form.expense_paid_amount);
           temp.form.expense_due = expense_due
           return expense_due
        }
    },

    methods:{
        updateExpense: function(){
            this.$Progress.start()
            var temp = this
            temp.form.expense_items = temp.expense_items;
            axios.put('/api/expenses/'+this.form.id,{
                expenses:temp.form
            })
            .then(function (response) {
                console.log(response)
              toastr.success('Updated Supplier Successfully');
              temp.$Progress.finish()
            })
            .catch(function (error) {
              toastr.error('Updated Supplier Failed')
              temp.$Progress.fail()
            });
        },

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
            })
            .catch(function (error) {
              toastr.error('Something is wrong Data Loaded')
            });
        },
    }
}
</script>
