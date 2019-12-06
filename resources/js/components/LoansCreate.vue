<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-md-3 float-left">
                                <p><a href="/">Home</a> / Add New Loan</p>
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
                <div class="card-body" style="background-color: #f6f6f7;">
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
<<<<<<< HEAD
                                            <input type="email" v-model="form.loaner_email" placeholder="Loaner Email" class="form-control form-control-sm w-100">
=======
                                            <input type="email" v-model="form.loaner_email" placeholder="Loaner Email" class="form-control-sm w-100">
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
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

<<<<<<< HEAD
                                    <div class="form-group row mb-2">
=======
                                    <div class="form-group row mb-1">
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Loan taken date</label>
                                        <div class="col-sm-9">                                      
                                            <datetime format="DD/MM/YYYY h:i:s" width="300px" v-model="form.loan_taken_date" placeholder="Loan taken date" class="w-100"></datetime>
                                        </div>
                                    </div>

<<<<<<< HEAD
                                    <div class="form-group row mb-2">
=======
                                    <div class="form-group row mb-1">
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Loan end date</label>
                                        <div class="col-sm-9">                                      
                                            <datetime format="DD/MM/YYYY h:i:s" width="300px" v-model="form.loan_end_date" placeholder="Loan end date" class="w-100"></datetime>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                       <label class="col-sm-3 form-control-label">Loan Detail</label>
                                        <div class="col-sm-9">
<<<<<<< HEAD
                                            <textarea v-model="form.loan_detail" id="loan_detail" name="loan_detail" class="form-control" rows="2" placeholder="Loan Detail"></textarea>
=======
                                            <textarea v-model="form.loan_detail" id="loan_detail" name="loan_detail" class="form-control" rows="3" placeholder="Loan Detail"></textarea>
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <router-link to="/loan" class="btn btn-sm btn-default float-left">
                                Back to Loan list
                            </router-link>

                            <button class="btn btn-sm btn-success float-right" >
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
import datetime from 'vuejs-datetimepicker'
export default {

    components: { datetime },

    data() {
        return {
            form: new Form({
                id : '',
                loaner_name : '',
                loaner_mobile : '',
                loaner_email : '',
                loaner_address : '',
                loan_amount : '',
                loan_taken_date : new Date().toLocaleString(),
                loan_end_date : new Date().toLocaleString(),
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
                console.log(response)
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
