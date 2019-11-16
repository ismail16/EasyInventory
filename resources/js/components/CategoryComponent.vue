<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="background-color: #f4f6f9; box-shadow: 0 0 0 rgba(0,0,0,0), 0 0 0 rgba(0,0,0,0)">
                        <div class="card-body pt-2 pr-1 pl-1 pb-0">
                            <div class="row" style="margin: 0px 0px; padding: 7px 0px;background-color: #fff; border: 1px solid #c2ccd6; border-bottom: 0;">
                                <div class="col-md-3 float-left">
                                    <p><a href="/">Home</a> / Category</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline ml-3 mr-2">
                                        <div class="input-group input-group-sm w-100">
                                            <select v-model="queryFiled" class="form-control w-25" id="fileds">
                                                <option value="category_name">Category Name</option>
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

                                       <a href="" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#addModal">
                                            <i class="fa fa-plus"></i> Add Supplier
                                       </a>
                                   </div>
                               </div>
                            </div>
                           
                            <table id="example1-" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th class="">No</th>
                                    <th class="text-center">Category name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody v-if="categories.length > 0 ">

                                    <tr v-for="(category, index) in categories">
                                        <td>{{ index+1 }}</td>
                                        <td class="text-center">{{ category.category_name }}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-xs btn-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-xs btn-success mr-1" data-toggle="modal" data-target="#editModal" @click.prevent="editCategory(category)">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-xs btn-danger" @click.prevent="deleteCategory(category.id)">
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
        <div class="modal fade" id="addModal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <form class="form-horizontal" id="form_id" onsubmit="return validatorFormSubmit()">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Category</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body pb-0 pt-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Category Name <span class="text-red">*</span></label>
                                    <div class="">
                                        <input type="text" v-model="category_name" id="category_name" name="category_name" class="form-control" placeholder="Category Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                                Cancel
                            </button>
                            <button @click.prevent="addNewCategory()" type="submit" class="btn btn-primary btn-sm" data-dismiss="modal">
                                <i class="fa fa-plus"></i> ADD
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <form class="form-horizontal" onsubmit="return validatorFormEdit()">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Category</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body pb-0 pt-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Category Name <span class="text-red">*</span></label>
                                    <div class="">
                                        <input type="text" v-model="category_name" id="category_name" name="category_name" class="form-control" placeholder="Category Name">
                                    </div>
                                </div>
                                <input type="hidden" v-model="category_id">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                                Cancel
                            </button>

                            <button @click.prevent="updateCategory(category_id)" type="submit" class="btn btn-primary btn-sm" data-dismiss="modal">
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
            return{
                query: "",
                queryFiled: "category_name",
                categories:{},

                pagination:{
                    current_page: 1,
                },

                category_name : '',
                category_id : '',
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
            getData(){
                var temp = this;
                axios.get('/api/categories?page='+this.pagination.current_page)
                  .then((response) => {
                    temp.categories = response.data.data;
                    temp.pagination = response.data.meta;
                  })
                  .catch(function (error) {
                        toastr.error('Something is wrong Data Loaded')
                  });
            },

            searchData() {
                var temp = this;
                axios.get("/api/search/categories/" + temp.queryFiled + "/" + temp.query + "?page=" +
                    temp.pagination.current_page
                    )
                    .then(response => {
                        temp.categories = response.data.data;
                        temp.pagination = response.data.meta;
                    })
                    .catch(e => {
                        console.log(e);
                        toastr.error('Something is wrong Search Data')
                    });
            },

            addNewCategory(){
                var temp = this
                axios.post('/api/categories', {
                    category_name : temp.category_name,
                })
                .then(function (response) {
                    console.log(response.data)
                    temp.getData();
                    toastr.success('Saved Supplier Successfully'),
                    temp.category_name = ''
                })
                .catch(function (error) {
                    toastr.error('Saved Category Failed')
                });
            },

            deleteCategory(id){
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
                     axios.delete('/api/categories/'+id)
                        .then(function (response) {
                            toastr.success('Deleted Category Successfully')
                            temp.getData();
                        })
                        .catch(function (error) {
                            toastr.error('Delete Category Failed')
                        });
                  }
               })
            },

            editCategory(category){
                this.category_id = category.id,
                this.category_name = category.category_name
            },

            updateCategory(id){
                var temp = this
                axios.put('/api/categories/'+id, {
                    category_name : temp.category_name
                })
                .then(function (response) {
                    toastr.success('Updated Category Successfully');
                    temp.getData();
                })
                .catch(function (error) {
                    toastr.error('Updated Category Failed')
                });
            },
        }
    }
</script>
