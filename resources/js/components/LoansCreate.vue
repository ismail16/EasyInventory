<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-md-3 float-left">
                                <p><router-link to="/dashboard"> Home </router-link> / Add New Loan</p>
                          </div>
                          <div class="col-md-6">

                          </div>
                          <div class="col-md-3">
                              <div class="d-inline-flex float-right">
                                <router-link to="/loan" class="btn btn-sm btn-primary float-right">
                                    <i class="nav-icon far fa-file-alt"></i> Loan List
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form @submit.prevent="addNewLoan">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Loaner Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input v-model="form.loaner_name" type="text" name="loaner_name"
                                            placeholder="Loaner name"
                                            
                                            class="form-control form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('loaner_name') }">
                                            <has-error :form="form" field="loaner_name"></has-error>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                       <label class="col-sm-3 form-control-label">Loaner Mobile <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input v-model="form.loaner_mobile" type="number" name="loaner_mobile"
                                            placeholder="Loaner Mobile"
                                            class="form-control form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('loaner_mobile') }">
                                            <has-error :form="form" field="loaner_mobile"></has-error>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                       <label class="col-sm-3 form-control-label">Loaner Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" v-model="form.loaner_email" placeholder="Loaner Email" class="form-control form-control-sm w-100">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                       <label class="col-sm-3 form-control-label">Loaner Address</label>
                                        <div class="col-sm-9">
                                            <textarea v-model="form.loaner_address" id="loaner_address" name="loaner_address" class="form-control" rows="2" placeholder="Loaner Address"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group row">
                                       <label class="col-sm-3 form-control-label">Loan Amount <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input v-model="form.loan_amount" type="number" name="loan_amount"
                                            placeholder="Loan Amount"
                                            class="form-control form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('loan_amount') }">
                                            <has-error :form="form" field="loan_amount"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Loan taken date</label>
                                        <div class="col-sm-9">
                                            <input type="text" v-model="form.loan_taken_date" name="" class="form-control-sm w-100 datetimepicker" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Loan end date</label>
                                        <div class="col-sm-9">    
                                            <input type="text" v-model="form.loan_end_date" name="" class="form-control-sm w-100 datetimepicker" autocomplete="off">                                    
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                       <label class="col-sm-3 form-control-label">Loan Detail</label>
                                        <div class="col-sm-9">
                                            <textarea v-model="form.loan_detail" id="loan_detail" name="loan_detail" class="form-control" rows="2" placeholder="Loan Detail"></textarea>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <router-link to="/loan" class="btn btn-sm btn-default float-left">
                                Back to Loan list
                            </router-link>

                            <button class="btn btn-sm btn-primary float-right" >
                                Save Loan
                            </button>
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
"use strict";
export default {
    data() {
        var today = new Date();
        var current_date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
        return {
            form: new Form({
                id : '',
                loaner_name : '',
                loaner_mobile : '',
                loaner_email : '',
                loaner_address : '',
                loan_amount : '',
                loan_taken_date : current_date,
                loan_end_date : current_date,
                loan_detail : '',
            }),
        }
    },

    mounted(){
    },

    computed: {
    },

    methods:{
        addNewLoan(){
            var temp = this
            temp.$Progress.start()
            temp.form.post('/api/loans')
            .then(function (response) {
                toastr.success('Saved Loan Successfully')
                temp.$Progress.finish()
            })
            .catch(function (error) {
              toastr.error('Saved Loan Failed')
              temp.$Progress.fail()
          });
        },
    }
}
</script>
