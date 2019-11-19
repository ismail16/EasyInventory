<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3 float-left">
                                    <p><a href="/">Home</a> / Suppliers</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline ml-3 mr-2">
                                        <div class="input-group input-group-sm w-100">
                                            <select v-model="queryFiled" class="form-control w-25" id="fileds">
                                                <option value="supplier_name">Supplier Name</option>
                                                <option value="supplier_contact_name">Contact Name</option>
                                                <option value="supplier_email">Email</option>
                                                <option value="supplier_phone">Phone</option>
                                                <option value="supplier_address">Address</option>
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
                                            <i class="fas fa-user-plus fa-fw"></i> Add New Supplier
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
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Contact Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody v-if="suppliers.data">
                                    <tr v-for="(supplier, index) in suppliers.data">
                                        <td>{{ index+1 }}</td>
                                        <td>{{ supplier.supplier_name }}</td>
                                        <td>{{ supplier.supplier_contact_name }}</td>
                                        <td>{{ supplier.supplier_email }}</td>
                                        <td>{{ supplier.supplier_phone }}</td>
                                        <td class="text-center">{{ supplier.create_at | myDate }}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-xs btn-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-xs btn-success mr-1" @click.prevent="editModal(supplier)">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-xs btn-danger" @click.prevent="deleteSupplier(supplier.id)">
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

<!--                            <pagination v-if="pagination.last_page > 1"-->
<!--                                :pagination="pagination"-->
<!--                                :offset="5"-->
<!--                                @paginate="query === '' ? getData() : searchData()"-->
<!--                            ></pagination>-->
                        </div>
                        <div class="card-footer pb-0">
                            <div class="float-right">
                                <pagination :data="suppliers" @pagination-change-page="getResults"></pagination>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Add Modal -->
       <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New Supplier</h5>
                <h5 v-show="editMode" class="modal-title" id="addNewLabel">Update Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form @submit.prevent="editMode? updateSupplier() : addNewSupplier()">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name <span class="text-red">*</span></label>
                            <div class="col-sm-10">
                                <input v-model="form.supplier_name" type="text" name="supplier_name"
                                    placeholder="supplier_name"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('supplier_name') }">
                                <has-error :form="form" field="supplier_name"></has-error>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Contact Name</label>
                            <div class="col-sm-10">
                                <input type="text" v-model="form.supplier_contact_name" id="supplier_contact_name" name="supplier_contact_name" class="form-control" placeholder="Supplier Contact Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" v-model="form.supplier_email" id="supplier_email" name="supplier_email" class="form-control" placeholder="Supplier Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="number" v-model="form.supplier_phone" id="supplier_phone" name="supplier_phone" class="form-control" placeholder="Supplier Phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea v-model="form.supplier_address" id="supplier_address" name="supplier_address" class="form-control" rows="3" placeholder="Supplier Address"></textarea>
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
        // el: '#supplier_app',
        data() {
            return {
                editMode: false,
                form: new Form({
                    id : '',
                    supplier_name : '',
                    supplier_contact_name : '',
                    supplier_email : '',
                    supplier_phone : '',
                    supplier_address : '',
                    supplier_id : '',
                }),

                query: "",
                queryFiled: "supplier_name",
                suppliers:{},

                paginat: 1,
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

            editModal(supplier){
                this.editMode = true;
                this.form.reset()
                $('#addNew').modal('show');
                this.form.fill(supplier);
            },

            getResults(page = 1) {
                axios.get('/api/suppliers?page=' + page)
                    .then(response => {
                        this.suppliers = response.data;
                    });
            },

            getData(){
                var temp = this;
                axios.get('/api/suppliers')
                  .then((response) => {
                    temp.suppliers = response.data;
                  })
                  .catch(function (error) {

                  });
            },

            searchData() {
                var temp = this;
                axios.get("/api/search/suppliers/" + temp.queryFiled + "/" + temp.query + "?page=" +
                    temp.paginat
                    )
                    .then(response => {
                        console.log(response.data)
                        temp.suppliers = response.data;
                        temp.paginat = response.data.last_page;
                    })
                    .catch(e => {
                        console.log(e);
                        toastr.error('Something is wrong Search Data')
                    });
            },

            addNewSupplier(){
                var temp = this
                this.$Progress.start()
                $('#addNew').modal('hide')

                this.form.post('/api/suppliers')
                .then(function (response) {
                    console.log(response.data)
                    temp.getData();
                    toastr.success('Saved Supplier Successfully'),
                    temp.$Progress.finish()
                })
                .catch(function (error) {
                    toastr.error('Saved Supplier Failed')
                    temp.$Progress.fail()
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
                     axios.delete('/api/suppliers/'+id)
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

            updateSupplier(id){
                this.$Progress.start()
                var temp = this
                $('#addNew').modal('hide')
                this.form.put('/api/suppliers/'+this.form.id)
                .then(function (response) {
                    toastr.success('Updated Supplier Successfully');
                    temp.getData();
                    temp.$Progress.finish()
                })
                .catch(function (error) {
                    toastr.error('Updated Supplier Failed')
                    temp.$Progress.fail()
                });
            },
        },

        mounted(){
            this.getData();
        },

        
    }
</script>
