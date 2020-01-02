<template>
    <div class="container">
        <div id="invoice">
            <div class="invoice overflow-auto">
                <div id="printableArea">
                    <header>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-gray-light text-center">
                                    <h3>Expense Information</h3>
                                    <hr>
                                </div>
                                <div class="text-gray-light text-right">
                                    <h5 class="name">Date Of Expense: <b>{{expense.expense_date}}</b></h5>
                                </div>
                                <h5 class="name">Expense Title: <b>{{expense.expense_title}}</b></h5>
                                
                                <h5 class="name">Expense Detail: <b>{{expense.expense_detail}}</b></h5>
                                
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="table-responsive mt-2">
                            <table class="table table-bordered table-sm table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center">Expense Purpose</th>
                                        <th class="text-center">Epense Quantity</th>
                                        <th class="text-center">Expense Amount</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(purpose, index) in expense_purpose">
                                        <td class="text-center w-50">
                                            <span>{{ purpose.expense_purpose }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span>{{ purpose.expense_quantity }}</span>
                                        </td>
                                        <td class="text-center"> 
                                            <span>{{ setting.store_currency }} {{ purpose.expense_amount }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span>{{ setting.store_currency }} {{ purpose.expense_quantity * purpose.expense_amount }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr id="appssss">
                                        <td colspan="3" class="text-right">Grand Total:</td>
                                        <td class="text-center">
                                            <span>{{ setting.store_currency }} {{ expense.expense_total_amount }}</span>
                                        </td>
                                    </tr> 

                                    <tr>
                                        <td class="text-right" colspan="3">Paid Amount:</td>
                                        <td class="text-center">
                                            <span>{{ setting.store_currency }} {{ expense.expense_paid_amount }}</span>
                                        </td>
                                    </tr>
                                    <tr v-show="expense.expense_due">
                                        <td class="text-right" colspan="3">Due:</td>
                                        <td  class="text-center">
                                            <span>{{ setting.store_currency }} {{ expense.expense_due }}</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        
                            <div class="notices">
                                Thank you!
                            </div>
                        </div>                
                    </main>
                    <footer>
                        Expense was created on a computer and is valid without the signature and seal.
                    </footer>
                </div>
                <div class="card-footer">
                    <router-link to="/expense" class="btn btn-sm btn-default float-left">
                        Back to Expense list
                    </router-link>

                    <button class="btn btn-sm btn-info float-right" v-on:click="printInvoice">
                       <i class="fa fa-print"></i> Print
                    </button>
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
            expense: '',
            expense_purpose: [],
            setting:'',
        }
    },

    mounted(){
        this.getExpenses();
        this.getSettings();
    },

    computed: {

    },

    methods:{

        printInvoice: function() {

            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        },

        getExpenses(){
            var temp = this;
            axios.get('/api/expenses/'+this.$route.params.id)
            .then((response) => {
              temp.expense = response.data.expense
              temp.expense_purpose = response.data.expense_items;
            })
            .catch(function (error) {
              toastr.error('Something is wrong Data Loaded')
            });
        },

        getSettings(){
            var temp = this;
            axios.get('/api/setting/1')
              .then((response) => {
                temp.setting = response.data;
              })
              .catch(function (error) {
                this.loadin = true; 
                    toastr.error('Something is wrong Data Loaded')
              });
        },
        
    }
}
</script>
