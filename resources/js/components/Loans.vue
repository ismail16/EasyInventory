<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">

                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-3 float-left">
                                    <p><router-link to="/dashboard"> Home </router-link> / Loans</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline ml-3 mr-2">
                                        <div class="input-group input-group-sm w-100">
                                            <select v-model="queryFiled" class="form-control w-25" id="fileds">
                                                <option value="loaner_name">Loaner Name</option>
                                                <option value="loaner_mobile">Loaner Mobile</option>
                                                <option value="loaner_address">Loaner Address</option>
                                                <option value="loan_amount">Loan Amount</option>
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
                                        <router-link to="/loan-create" class="btn btn-outline-primary btn-sm">
                                            <i class="fa fa-plus"></i> Add New Loan
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-2">
                            <table id="example1-" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.N</th>
                                        <th class="text-center">Loaner Name</th>
                                        <th class="text-center">Loaner Mobile</th>
                                        <th class="text-center">Loan Amount</th>
                                        <th class="text-center">Loan Taken Date</th>
                                        <th class="text-center">Loan End Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody v-if="loans.length > 0 ">

                                    <tr v-for="(loan, index) in loans">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">{{ loan.loaner_name }}</td>
                                        <td class="text-center">{{ loan.loaner_mobile }}</td>
                                        <td class="text-center">{{ setting.store_currency }} {{ loan.loan_amount }}</td>
                                        <td class="text-center">{{ loan.loan_taken_date }}</td>
                                        <td class="text-center">{{ loan.loan_end_date }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-success" @click.prevent="showModal(loan)">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <router-link :to="'/loan/'+ loan.id +'/edit'" class="btn btn-xs btn-success mr-1 ml-1">
                                                <i class="fa fa-edit"></i>
                                            </router-link>
                                            <button class="btn btn-xs btn-danger" @click.prevent="deleteLoan(loan.id)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>

                                <tbody v-else>
                                    <tr>
                                        <td colspan="7">
                                            <div class="p-3 mb-2">
                                                <h3 class="text-center text-danger">Opps!!</h3>
                                                <p class="text-center">Data not found</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            <pagination v-if="pagination.last_page > 1"
                                :pagination="pagination"
                                :offset="5"
                                @paginate="query === '' ? getData() : searchData()"
                                >
                            </pagination>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div  class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">Show Loan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" v-if="loan">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Loaner Name : <b>{{loan.loaner_name}}</b></h4>
                                <h4 class="card-title">Loan amount : <b> {{ setting.store_currency }} {{loan.loan_amount}}</b></h4>
                                <h4 class="card-title">Loaner mobile : <b>{{loan.loaner_mobile}}</b></h4>
                                <h4 class="card-title">Loaner email : <b>{{loan.loaner_email}}</b></h4>
                                <h4 class="card-title">Loan taken date : <b>{{loan.loan_taken_date}}</b></h4>
                                <h4 class="card-title">Loan end date : <b>{{loan.loan_end_date}}</b></h4>
                                <h4 class="card-title">Loaner address : </h4>
                                <span>{{loan.loaner_address}}</span>
                                <h4 class="card-title">Loan detail : </h4>
                                <span>{{loan.loan_detail}}</span>

                            </div>
                        </div>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    </div>
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

                }),
                query: "",
                queryFiled: "loaner_name",
                loans:{},
                pagination:{
                    current_page: 1,
                },
                setting:'',
                loan:''
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

            showModal(loan){
                this.loan = loan;
                $('#showModal').modal('show');
            },

            getData(){
                var temp = this;
                axios.get('/api/loans?page='+this.pagination.current_page)
                .then((response) => {
                    temp.loans = response.data.data;
                    temp.pagination = response.data.meta;
                })
                .catch(function (error) {
                    this.loadin = true; 
                    toastr.error('Something is wrong Data Loaded')
                });
            },
            searchData() {
                var temp = this;
                axios.get("/api/search/loans/" + temp.queryFiled + "/" + temp.query + "?page=" +
                    temp.pagination.current_page
                    )
                .then(response => {
                    temp.loans = response.data.data;
                    temp.pagination = response.data.meta;
                })
                .catch(e => {
                    console.log(e);
                    toastr.error('Something is wrong Search Data')
                });
            },

            deleteLoan(id){
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
                        axios.delete('/api/loans/'+id)
                        .then(function (response) {
                            toastr.success('Deleted loan Successfully')
                            temp.getData();
                        })
                        .catch(function (error) {
                            toastr.error('Delete loan Failed')
                        });
                    }
                })
            },
        },
    }
</script>