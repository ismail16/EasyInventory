<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0 mb-1">

                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-3 float-left">
                                    <p><router-link to="/dashboard"> Home </router-link> / Invoice</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline ml-3 mr-2">
                                        <div class="input-group input-group-sm w-100">
                                            <select v-model="queryFiled" class="form-control w-25" id="fileds">
                                                <option value="customer_name">Customer Name</option>
                                                <option value="customer_mobile">Customer Mobile</option>
                                                <option value="customer_email">Email</option>
                                                <option value="customer_address">Address</option>
                                            </select>
                                            <input class="form-control w-50" v-model="query" type="search" placeholder="Search" aria-label="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-default" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-inline-flex float-right">
                                        <router-link to="/invoice-create" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i> Customer Invoice
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-2">
                            <div class="table-responsive-sm">
                                <table id="example1-" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center">S.N</th>
                                            <th class="text-center">Customer Name</th>
                                            <th class="text-center">Customer Mobile</th>
                                            <th class="text-center">Customer Email</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Paid</th>
                                            <th class="text-center">Due</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="Invoices.length > 0 ">

                                        <tr v-for="(Invoice, index) in Invoices">
                                            <td class="text-center">{{ index+1 }}</td>
                                            <td class="text-center">{{ Invoice.customer_name }}</td>
                                            <td class="text-center">{{ Invoice.customer_phone }}</td>
                                            <td class="text-center">{{ Invoice.customer_email }}</td>
                                            <td class="text-center">{{ setting.store_currency }} {{ Invoice.grand_total_price }}</td>
                                            <td class="text-center">
                                                <span v-if="Invoice.paid_amount == Invoice.grand_total_price" class="text-success">
                                                    Full paid
                                                </span>
                                                <span v-else class="text-primary">
                                                    {{ setting.store_currency }} {{ Invoice.paid_amount }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span v-if="Invoice.due_amount == 0.00" class="text-success">
                                                    Full paid
                                                </span>
                                                <span v-else class="text-danger">
                                                    {{ setting.store_currency }} {{ Invoice.due_amount }}
                                                </span>
                                            </td>
                                            <td class="text-center">{{ Invoice.invoice_date }}</td>

                                            <td class="text-center">
                                                <span v-if="Invoice.status == 1" class="text-success">
                                                    Active
                                                </span>
                                                <span v-else class="text-danger">
                                                    Deactive
                                                </span>

                                            </td>
                                            <td class="text-center">
                                                <router-link :to="'/invoice/'+ Invoice.id +'/show'" class="btn btn-xs btn-success mr-1 ml-1">
                                                    <i class="fa fa-eye"></i>
                                                </router-link>

                                                <router-link :to="'/invoice/'+ Invoice.id +'/edit'" class="btn btn-xs btn-success mr-1 ml-1">
                                                    <i class="fa fa-edit"></i>
                                                </router-link>

                                                <button class="btn btn-xs btn-danger" @click.prevent="deleteSupplier(Invoice.id)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tbody v-else-if="Invoices.length == 0">
                                        <tr>
                                            <td colspan="10">
                                                <div class="p-3 mb-2">
                                                    <h3 class="text-center text-danger">Opps!!</h3>
                                                    <p class="text-center">Data not found</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <td colspan="10">
                                                <div class="d-flex flex-column align-items-center justify-content-center p-5">
                                                    <div class="row">
                                                       <div class="spinner-border" role="status">
                                                       </div>
                                                    </div>
                                                    <div class="row">
                                                      <strong>Loading...</strong>
                                                    </div>
                                                </div> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer pb-0 pt-0">
                            <div class="float-right">
                                <pagination-component v-if="pagination.last_page > 1"
                                    :pagination="pagination"
                                    :offset="5"
                                    @paginate="query === '' ? getData() : searchData()"
                                    >
                                </pagination-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
"use strict";
export default {
    data() {
        return {
            query: "",
            queryFiled: "customer_name",
            Invoices:{},

            pagination:{
                current_page: 1,
            },
            setting:''
        }
    },

    watch:{
        query: function(newQ, old) {
            if (newQ === "") {
                this.getData();
            } else {
                this.searchData();
            }
        }
    },

    mounted(){
        this.getData();
        this.getSetting();
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

        getImgUrl: function(image){
            var photo = "/images/invoice/"+ image
            if (image != 'default.png') {
                return photo
            }else{
                return "/images/invoice/"+ 'default.png'
            }
            return photo
        },


        getData(){
            var temp = this;
            axios.get('/api/invoices')
            .then((response) => {
                temp.Invoices = response.data.data;
                temp.pagination = response.data.meta;
            })
            .catch(function (error) {
                this.loadin = true;
                toastr.error('Something is wrong Data Loaded')
            });
        },

        searchData() {
            var temp = this;
            axios.get("/api/search/invoices/" + temp.queryFiled + "/" + temp.query + "?page=" +
                temp.pagination.current_page
                )
            .then(response => {
                temp.Invoices = response.data.data;
                temp.pagination = response.data.meta;
            })
            .catch(e => {
                toastr.error('Something is wrong Search Data')
            });
        },

        deleteSupplier(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success btn-sm',
                    cancelButton: 'btn btn-danger  btn-sm mr-2',
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                text: "Are you sure Delete ?",
                icon: 'question',
                position: 'top-end',
                width: '18rem',
                padding: '10px',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    var temp = this
                    axios.delete('/api/invoices/'+id)
                    .then(function (response) {
                        toastr.success('Deleted Supplier Successfully')
                        temp.getData();
                    })
                    .catch(function (error) {
                        toastr.error('Delete Supplier Failed')
                    });
                }
            })
        },
    }
}
</script>
