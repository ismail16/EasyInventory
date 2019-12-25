<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-md-3 float-left">
                              <p><a href="/">Home</a> / customers</p>
                            </div>
                            <div class="col-md-6">
                               <div class="form-inline ml-3 mr-2">
                                    <div class="input-group input-group-sm w-100">
                                        <select v-model="queryFiled" class="form-control w-25" id="fileds">
                                            <option value="customer_name">customer Name</option>
                                            <option value="customer_contact_name">Contact Name</option>
                                            <option value="customer_email">Email</option>
                                            <option value="customer_phone">Phone</option>
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
                                    <button class="btn btn-outline-primary btn-sm" @click="newModal">
                                        <i class="fas fa-user-plus fa-fw"></i> Add New customer
                                    </button>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="card-body p-2">
                            
                           
                            <table id="example1-" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th class="text-center">S.N</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody v-if="customers.length > 0 ">

                                    <tr v-for="(customer, index) in customers">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">{{ customer.customer_name }}</td>
                                        <td class="text-center">{{ customer.customer_phone }}</td>
                                        <td class="text-center">{{ customer.customer_email }}</td>
                                        <td class="text-center">{{ customer.customer_address }}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-xs btn-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-xs btn-success mr-1" @click.prevent="editModal(customer)">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-xs btn-danger" @click.prevent="deletecustomer(customer.id)">
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



        <!-- Add Modal -->
       <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New customer</h5>
                <h5 v-show="editMode" class="modal-title" id="addNewLabel">Update customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form @submit.prevent="editMode? updatecustomer() : addNewcustomer()">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name <span class="text-red">*</span></label>
                            <div class="col-sm-10">
                                <input v-model="form.customer_name" type="text" name="customer_name"
                                    placeholder="customer_name"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('customer_name') }">
                                <has-error :form="form" field="customer_name"></has-error>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" v-model="form.customer_email" id="customer_email" name="customer_email" class="form-control" placeholder="customer Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="number" v-model="form.customer_phone" id="customer_phone" name="customer_phone" class="form-control" placeholder="customer Phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea v-model="form.customer_address" id="customer_address" name="customer_address" class="form-control" rows="3" placeholder="customer Address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button v-show="!editMode" type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Create
                        </button>
                        <button v-show="editMode" type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-sync"></i> Update
                        </button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>

</template>

<script>
    export default {
        // el: '#customer_app',
        data() {
            return {
                editMode: false,
                form: new Form({
                    id : '',
                    customer_name : '',
                    customer_contact_name : '',
                    customer_email : '',
                    customer_phone : '',
                    customer_address : '',
                    customer_id : '',
                }),
                query: "",
                queryFiled: "customer_name",
                customers:{},
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
        methods:{
            newModal(){
                this.editMode = false;
                this.form.reset()
                $('#addNew').modal('show');
            }, 
            editModal(customer){
                this.editMode = true;
                this.form.reset()
                $('#addNew').modal('show');
                this.form.fill(customer);
            },
            getData(){
                var temp = this;
                axios.get('/api/customers?page='+this.pagination.current_page)
                  .then((response) => {
                    temp.customers = response.data.data;
                    temp.pagination = response.data.meta;
                  })
                  .catch(function (error) {
                    this.loadin = true; 
                        toastr.error('Something is wrong Data Loaded')
                  });
            },
            searchData() {
                var temp = this;
                axios.get("/api/search/customers/" + temp.queryFiled + "/" + temp.query + "?page=" +
                    temp.pagination.current_page
                    )
                    .then(response => {
                        temp.customers = response.data.data;
                        temp.pagination = response.data.meta;
                    })
                    .catch(e => {
                        console.log(e);
                        toastr.error('Something is wrong Search Data')
                    });
            },
            addNewcustomer(){
                var temp = this
                this.$Progress.start() 
                $('#addNew').modal('hide')
                this.form.post('/api/customers')
                .then(function (response) {
                    console.log(response.data)
                    temp.getData();
                    toastr.success('Saved customer Successfully'),
                    temp.$Progress.finish()
                })
                .catch(function (error) {
                    toastr.error('Saved customer Failed')
                    temp.$Progress.fail()
                });
            },
            deletecustomer(id){
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
                     axios.delete('/api/customers/'+id)
                        .then(function (response) {
                            toastr.success('Deleted customer Successfully')
                            temp.getData();
                        })
                        .catch(function (error) {
                            toastr.error('Delete customer Failed')
                        });
                  }
               })
            },
            updatecustomer(id){
                this.$Progress.start() 
                var temp = this
                $('#addNew').modal('hide')
                this.form.put('/api/customers/'+this.form.id)
                .then(function (response) {
                    toastr.success('Updated customer Successfully');
                    temp.getData();
                    temp.$Progress.finish()
                })
                .catch(function (error) {
                    toastr.error('Updated customer Failed')
                    temp.$Progress.fail()
                });
            },
        },
        mounted(){
            this.getData();
        },
        
    }
</script>