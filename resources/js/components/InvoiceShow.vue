<template>
    <div class="container">
        <div id="invoice">
            <div class="invoice overflow-auto">
                <div id="printableArea">
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

                            <div class="col company-details text-right">
                                <div class="text-gray-light"><b>INVOICE TO:</b></div>
                                <h5 class="name">Name: {{form.customer_name}}</h5>
                                <div class="address">Phone: {{form.customer_phone}}</div>
                                <div class="email">Email: {{form.customer_email}}</div>
                                <div class="address">Date: {{form.invoice_date}}</div>
                                <div class="address">Address: {{form.customer_address}}</div>
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="table-responsive">
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
                                        <td class="text-center">
                                            <span>{{ product.product_name }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span>{{ product.product_quantity }}</span>
                                        </td>
                                        <td class="text-center"> 
                                            <span>{{ setting.store_currency }} {{ product.sell_price }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span>{{ setting.store_currency }} {{ product.product_quantity * product.sell_price }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-right" colspan="3">Discount:</td>
                                        <td class="text-center">
                                            <span>{{ setting.store_currency }} {{ form.discount }}</span>
                                        </td>
                                    </tr>

                                    <tr id="appssss">
                                        <td class="text-right" colspan="3">Grand Total:</td>
                                        <td class="text-center">
                                            <span>{{ setting.store_currency }} {{ grand_total_price }}</span>
                                        </td>
                                    </tr> 

                                    <tr v-show="total">
                                        <td class="text-right" colspan="3">Final Total:</td>
                                        <td class="text-center">
                                            <span>{{ setting.store_currency }} {{ total }}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-right" colspan="3">Paid Amount:</td>
                                        <td class="text-center">
                                            <span>{{ setting.store_currency }} {{form.paid_amount}}</span>
                                        </td>
                                    </tr>
                                    <tr v-show="due_amount">
                                        <td class="text-right" colspan="3">Due:</td>
                                        <td  class="text-center">
                                            <span>{{ setting.store_currency }} {{due_amount}}</span>
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
                        Invoice was created on a computer and is valid without the signature and seal.
                    </footer>
                </div>
                <div class="card-footer">
                    <router-link to="/invoice" class="btn btn-sm btn-default float-left">
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
"use strict";
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
            this.getSetting();
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

            getImgUrl: function(image){
                var photo = "/images/store_logo/"+ image
                return photo
            }, 
        }
    }
</script>
