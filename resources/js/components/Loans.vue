<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="background-color: #f4f6f9; box-shadow: 0 0 0 rgba(0,0,0,0), 0 0 0 rgba(0,0,0,0)">
                        <div class="card-body pt-2 pr-1 pl-1 pb-0">
                            <div class="row" style="margin: 0px 0px; padding: 7px 0px;background-color: #fff; border: 1px solid #c2ccd6; border-bottom: 0;">
                                <div class="col-md-3 float-left">
                                    <p><a href="/">Home</a> / loans</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline ml-3 mr-2">
                                        <div class="input-group input-group-sm w-100">
                                            <select v-model="queryFiled" class="form-control w-25" id="fileds">
                                                <option value="loaner_name">loaner_name</option>
                                                <option value="loaner_mobile">loaner_mobile</option>
                                                <option value="loaner_address">loaner_address</option>
                                                <option value="loan_amount">loan_amount</option>
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
                                        <router-link to="/loan-create" class="btn btn-sm btn-primary float-right">
                                            <i class="fa fa-plus"></i> Add New Loan
                                        </router-link>
                                    </div>
                               </div>
                            </div>
                           
                            <table id="example1-" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th class="text-center">S.N</th>
                                    <th class="text-center">loaner_name</th>
                                    <th class="text-center">loaner_mobile</th>
                                    <th class="text-center">loan_amount</th>
                                    <th class="text-center">loan_taken_date</th>
                                    <th class="text-center">loan_end_date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody v-if="loans.length > 0 ">

                                    <tr v-for="(loan, index) in loans">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">{{ loan.loaner_name }}</td>
                                        <td class="text-center">{{ loan.loaner_mobile }}</td>
                                        <td class="text-center">{{ loan.loan_amount }}</td>
                                        <td class="text-center">{{ loan.loan_taken_date }}</td>
                                        <td class="text-center">{{ loan.loan_end_date }}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-xs btn-success">
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
                            ></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

</template>

<script>
    export default {
        // el: '#supplier_app',
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
        },
        methods:{
            newModal(){
                this.editMode = false;
                this.form.reset()
                $('#addNew').modal('show');
            }, 
            editModal(supplier){
                this.editMode = true;
                this.form.reset()
                $('#addNew').modal('show');
                this.form.fill(supplier);
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
                  // title: '',
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