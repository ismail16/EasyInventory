<template>
    <div class="container">
        <div id="invoice">
            <div class="invoice overflow-auto">
                <div style="min-width: 600px" id="printableArea">
                    <header>
                        <div class="row">
                            <div class="col-2">
                                <div class="text-gray-light"><b>INVOICE FROM:</b></div>
                                <img v-if="setting.store_logo" :src="getImgUrl(setting.store_logo)" lass="img-fluid" width="50" data-holder-rendered="true"/>
                                <img v-else src="/images/logo.png" class="img-fluid" width="50" data-holder-rendered="true"/>
                            </div>
                            <div class="col">                                
                                <h5 class="name">{{ setting.store_name }}</h5>
                                <div class="address">{{ setting.store_address }}</div>
                                <div class="email">{{ setting.store_mobile }}</div>
                                <div class="email">{{ setting.store_email }}</div>
                            </div>

                            <div class="col company-details" style="text-align:right">
                                <div class="text-gray-light"><b>INVOICE TO:</b></div>
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
                                            <span>{{ setting.store_currency }} {{ product.supplier_price }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span>{{ setting.store_currency }} {{ product.product_quantity * product.supplier_price }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr id="appssss">
                                        <td colspan="3" style="text-align:right;">Grand Total:</td>
                                        <td class="text-center">
                                            <span>{{ setting.store_currency }} {{ grand_total_price }}</span>
                                        </td>
                                    </tr> 

                                    <tr>
                                        <td style="text-align:right;" colspan="3">Paid Amount:</td>
                                        <td class="text-center">
                                            <span>{{ setting.store_currency }} {{form.paid_amount}}</span>
                                        </td>
                                    </tr>
                                    <tr v-show="form.due_amount">
                                        <td style="text-align:right;" colspan="3">Due:</td>
                                        <td  class="text-center">
                                            <span>{{ setting.store_currency }} {{form.due_amount}}</span>
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
                product_arr:[],
                setting:'',
            }
        },

        mounted(){
            this.getSupplierInvoice();
            this.getSetting();
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

            getSetting(){
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
