<template>
    <div class="container">


         <div id="invoice">
            <div class="invoice overflow-auto">
                <div style="min-width: 600px" id="printableArea">
                    <header>
                        <div class="row">
                            <div class="col">
                                <a target="_blank" href="/">
                                    <img src="http://lobianijs.com/lobiadmin/version/1.0/ajax/img/logo/lobiadmin-logo-text-64.png" width="200" data-holder-rendered="true" />
                                    </a>
                                    <div class="text-gray-light">INVOICE FROM:</div>
                                    <h5 class="name">Arboshiki</h5>
                                <div class="address">796 Silver Harbour, TX 79273, US</div>
                                <div class="email">john@example.com</div>
                            </div>

                            <div class="col company-details" style="text-align:right">
                                <div class="text-gray-light">INVOICE TO:</div>
                                <h5  class="name">supplier ID: {{form.supplier_id}}</h5>
                                <div class="address">Warehouse ID: {{form.warehouse_id}}</div>
                                <div class="address">Date: {{form.invoice_date }}</div>
                               
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-sm table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center">Item Information</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Rate</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(product, index) in product_arr">
                                        <td style="width: 320px" class="text-center">
                                            <span>{{ product.product_name }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span>{{ product.product_quantity }}</span>
                                        </td>
                                        <td class="text-center"> 
                                            <span>{{ product.supplier_price }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span>{{ product.product_quantity * product.supplier_price }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr id="appssss">
                                        <td colspan="3" style="text-align:right;">Grand Total:</td>
                                        <td class="text-center">
                                            <span>{{ grand_total_price }}</span>
                                        </td>
                                    </tr> 

                                    <tr>
                                        <td style="text-align:right;" colspan="3">Paid Amount:</td>
                                        <td class="text-center">
                                            <span>{{form.paid_amount}}</span>
                                        </td>
                                    </tr>
                                    <tr v-show="form.due_amount">
                                        <td style="text-align:right;" colspan="3">Due:</td>
                                        <td  class="text-center">
                                            <span>{{form.due_amount}}</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            
                            <div class="notices">
                                Thank you!
                                <div>NOTICE:</div>
                                <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                            </div>
                            
                        </div>                
                    </main>
                    <footer>
                        Invoice was created on a computer and is valid without the signature and seal.
                    </footer>
                </div>
                <div class="card-footer">
                    <router-link to="/supplier-invoice" class="btn btn-sm btn-default float-left">
                        Back to Invoice list
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
            form: new Form({
              id : '',
              product_arr:[],

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
            product_arr:[]
        }
    },

    mounted(){
        this.getSupplierInvoice();
    },

    computed: {

        grand_total_price: function() {
            var temp = this
            return temp.product_arr.reduce(function(carry, product) {
                let total = carry + (parseFloat(product.product_quantity) * parseFloat(product.supplier_price));
                temp.form.grand_total_price = total
                return total
            }, 0);
        },

        due_amount: function() {
           var temp = this
           let due_ammount = temp.grand_total_price - parseFloat(temp.form.paid_amount);
           temp.form.due_amount = due_ammount
           return due_ammount
        }
    },

    methods:{

        printInvoice: function() {

            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        },

        getImgUrl: function(image){
            var photo = "/images/supplier_invoice/"+ image
            return photo
        },

        getSupplierInvoice(){
            var temp = this;
            axios.get('/api/supllier-invoice/'+this.$route.params.id)
            .then((response) => {
              temp.form = response.data.supplierInvoice;
              temp.product_arr = response.data.supplierInvoiceProduct;
            })
            .catch(function (error) {
              toastr.error('Something is wrong Data Loaded')
            });
        },
    }
}
</script>
