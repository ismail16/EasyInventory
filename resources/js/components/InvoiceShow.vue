<template>
    <div class="container">
        <div id="invoice">
            <div class="invoice overflow-auto">
                <div style="min-width: 600px" id="printableArea">
                    <header>
                        <div class="row">
                            <div class="col">
                                <div class="text-gray-light">INVOICE FROM:</div>
                                    <img v-if="setting.store_logo" :src="getImgUrl(setting.store_logo)" lass="img-fluid" width="50" data-holder-rendered="true"/>

                                    <img v-else src="/images/logo.png" class="img-fluid" width="50" data-holder-rendered="true"/>
                                    
                                    <h5 class="name">{{ setting.store_name }}</h5>
                                <div class="address">{{ setting.store_address }}</div>
                                <div class="email">{{ setting.store_mobile }}</div>
                                <div class="email">{{ setting.store_email }}</div>
                            </div>

                            <div class="col company-details" style="text-align:right">
                                <div class="text-gray-light">INVOICE TO:</div>
                                <h5 class="name">Name: {{form.customer_name}}</h5>
                                <div class="address">Phone: {{form.customer_phone}}</div>
                                <div class="email">Email: {{form.customer_email}}</div>
                                <div class="address">Date: {{form.invoice_date | myDate }}</div>
                                <div class="address">Address: {{form.customer_address}}</div>
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
                                            <span>{{ product.sell_price }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span>{{ product.product_quantity * product.sell_price }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td style="text-align:right;" colspan="3">Discount:</td>
                                        <td class="text-center">
                                            <span>{{ form.discount }}</span>
                                        </td>
                                    </tr>

                                    <tr id="appssss">
                                        <td colspan="3" style="text-align:right;">Grand Total:</td>
                                        <td class="text-center">
                                            <span>{{ grand_total_price }}</span>
                                        </td>
                                    </tr> 

                                    <tr v-show="total">
                                        <td colspan="3" style="text-align:right;">Final Total:</td>
                                        <td class="text-center">
                                            <span>{{ total }}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="text-align:right;" colspan="3">Paid Amount:</td>
                                        <td class="text-center">
                                            <span>{{form.paid_amount}}</span>
                                        </td>
                                    </tr>
                                    <tr v-show="due_amount">
                                        <td style="text-align:right;" colspan="3">Due:</td>
                                        <td  class="text-center">
                                            <span>{{due_amount}}</span>
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
              customer_name : '',
              customer_phone : '',
              customer_email : '',
              customer_address : '',
              invoice_date :'',

              products:[],

              grand_total_price : '',
              discount : '',
              paid_amount : '',
              due_amount : 0
            }),

            product_arr: [],
            setting:'',
        }
    },

    mounted(){
        this.getInvoice();
        this.getSettings();
    },

    computed: {

        grand_total_price: function() {
            var temp = this
            return temp.product_arr.reduce(function(carry, product) {
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

        printInvoice: function() {

            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        },

        getInvoice(){
            var temp = this;
            axios.get('/api/invoices/'+this.$route.params.id)
            .then((response) => {
              temp.form = response.data.Invoice
              temp.product_arr = response.data.InvoiceProduct;
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
        getImgUrl: function(image){
          var photo = "/images/store_logo/"+ image
          return photo
          console.log(photo)
        }, 

    }
}
</script>
