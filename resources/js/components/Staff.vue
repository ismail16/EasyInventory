<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="background-color: #f4f6f9; box-shadow: 0 0 0 rgba(0,0,0,0), 0 0 0 rgba(0,0,0,0)">
                        <div class="card-body pt-2 pr-1 pl-1 pb-0">
                            <div class="row" style="margin: 0px 0px; padding: 7px 0px;background-color: #fff; border: 1px solid #c2ccd6; border-bottom: 0;">
                                <div class="col-md-3 float-left">
                                    <p><a href="/">Home</a> / staffs</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline ml-3 mr-2">
                                        <div class="input-group input-group-sm w-100">
                                            <select v-model="queryFiled" class="form-control w-25" id="fileds">
                                                <option value="staff_name">staff Name</option>
                                                <option value="staff_contact_name">Contact Name</option>
                                                <option value="staff_email">Email</option>
                                                <option value="staff_phone">Phone</option>
                                                <option value="staff_address">Address</option>
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
                                            <i class="fas fa-user-plus fa-fw"></i> Add New staff
                                        </button>
                                    </div>
                               </div>
                            </div>
                           
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
                                <tbody v-if="staffs.length > 0 ">

                                    <tr v-for="(staff, index) in staffs">
                                        <td>{{ index+1 }}</td>
                                        <td>{{ staff.staff_name }}</td>
                                        <td>{{ staff.staff_user_name }}</td>
                                        <td>{{ staff.staff_phone }}</td>
                                        <td>{{ staff.staff_address }}</td>
                                        <td>{{ staff.user_type }}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-xs btn-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-xs btn-success mr-1" @click.prevent="editModal(staff)">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-xs btn-danger" @click.prevent="deletestaff(staff.id)">
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
                <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New staff</h5>
                <h5 v-show="editMode" class="modal-title" id="addNewLabel">Update staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form @submit.prevent="editMode? updatestaff() : addNewstaff()">
                    <div class="modal-body">
                        <div class="form-group mb-0 row">
                            <label class="col-sm-3 col-form-label">Name <span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <input v-model="form.staff_name" type="text" name="staff_name"
                                    placeholder="staff name"
                                    class="form-control form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('staff_name') }">
                                <has-error :form="form" field="staff_name"></has-error>
                            </div>
                        </div>

                        <div class="form-group mb-0 row">
                            <label class="col-sm-3 col-form-label">User Name <span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <input v-model="form.staff_user_name" type="text" name="staff_user_name"
                                    placeholder="User Name"
                                    class="form-control form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('staff_user_name') }">
                                <has-error :form="form" field="staff_user_name"></has-error>
                            </div>
                        </div>
                        <div class="form-group mb-0 row">
                            <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="number" v-model="form.staff_phone" id="staff_phone" name="staff_phone" class="form-control form-control-sm w-100" placeholder="staff Phone">
                            </div>
                        </div>
                        <div class="form-group mb-0 row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea v-model="form.staff_address" id="staff_address" name="staff_address" class="w-100" rows="2" placeholder="staff Address"></textarea>
                            </div>
                        </div>

                        <div class="form-group mb-0 row">
                            <label class="col-sm-3 col-form-label">User Type <span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <select v-model="form.user_type" class="form-control form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('user_type') }" name="user_type" id="fileds">
                                    <option value="1">Admin</option>
                                    <option value="2">Sales man</option>
                                </select>
                                <has-error :form="form" field="user_type"></has-error>
                            </div>
                        </div>
                        <div class="form-group mb-0 row">
                            <label class="col-sm-3 col-form-label">Password <span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <input v-model="form.staff_password" type="text" name="staff_password"
                                    placeholder="staff password"
                                    class="form-control form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('staff_password') }">
                                <has-error :form="form" field="staff_password"></has-error>
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
        // el: '#staff_app',
        data() {
            return {
                editMode: false,
                form: new Form({
                    id : '',
                    staff_name : '',
                    staff_user_name : '',
                    staff_email : '',
                    staff_phone : '',
                    staff_address : '',
                    user_type : '',
                }),
                query: "",
                queryFiled: "staff_name",
                staffs:{},
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
            editModal(staff){
                this.editMode = true;
                this.form.reset()
                $('#addNew').modal('show');
                this.form.fill(staff);
            },
            getData(){
                var temp = this;
                axios.get('/api/staffs?page='+this.pagination.current_page)
                  .then((response) => {
                    temp.staffs = response.data.data;
                    temp.pagination = response.data.meta;
                  })
                  .catch(function (error) {
                    this.loadin = true; 
                        toastr.error('Something is wrong Data Loaded')
                  });
            },
            searchData() {
                var temp = this;
                axios.get("/api/search/staffs/" + temp.queryFiled + "/" + temp.query + "?page=" +
                    temp.pagination.current_page
                    )
                    .then(response => {
                        temp.staffs = response.data.data;
                        temp.pagination = response.data.meta;
                    })
                    .catch(e => {
                        console.log(e);
                        toastr.error('Something is wrong Search Data')
                    });
            },
            addNewstaff(){
                var temp = this
                this.$Progress.start() 
                this.form.post('/api/staffs')
                .then(function (response) {
                    $('#addNew').modal('hide')
                    console.log(response.data)
                    temp.getData();
                    toastr.success('Saved staff Successfully'),
                    temp.$Progress.finish()
                })
                .catch(function (error) {
                    toastr.error('Saved staff Failed')
                    temp.$Progress.fail()
                });
            },
            deletestaff(id){
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
                     axios.delete('/api/staffs/'+id)
                        .then(function (response) {
                            toastr.success('Deleted staff Successfully')
                            temp.getData();
                        })
                        .catch(function (error) {
                            toastr.error('Delete staff Failed')
                        });
                  }
               })
            },
            updatestaff(id){
                this.$Progress.start() 
                var temp = this
                $('#addNew').modal('hide')
                this.form.put('/api/staffs/'+this.form.id)
                .then(function (response) {
                    toastr.success('Updated staff Successfully');
                    temp.getData();
                    temp.$Progress.finish()
                })
                .catch(function (error) {
                    toastr.error('Updated staff Failed')
                    temp.$Progress.fail()
                });
            },
        },
        
        
    }
</script>