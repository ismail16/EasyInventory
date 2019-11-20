<template>
  <div class="container">
    <section class="content mt-2 mb-0">
      <div class="row">
        <div class="col-12">
          <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">
            <div class="card-header pb-0">
              <div class="row">
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
                    <button class="btn btn-outline-primary btn-sm" @click="newModal">
                      <i class="fas fa-user-plus fa-fw"></i> Add New category
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body p-2">
              <table id="example1-" class="table table-bordered table-striped table-sm">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Category Name</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody v-if="categories.length > 0">
                  <tr v-for="(category, index) in categories">
                    <td class="text-center">{{ index+1 }}</td>
                    <td>{{ category.category_name }}</td>
                    <td class="text-center">{{ category.status }}</td>
                    <td class="text-center">{{ category.create_at | myDate }}</td>
                    <td class="text-center">
                      <a href="" class="btn btn-xs btn-success">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a class="btn btn-xs btn-success mr-1" @click.prevent="editModal(category)">
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

    <!-- Add Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
      <div class="modal-dialog  _modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New category</h5>
            <h5 v-show="editMode" class="modal-title" id="addNewLabel">Update category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editMode? updateCategory() : addNewCategory()">
            <div class="modal-body">
              <div class="form-group">
                <label>Category Name <span class="text-red">*</span></label>
                <input v-model="form.category_name" type="text" name="category_name"
                  placeholder="Category Name"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('category_name') }">
                  <has-error :form="form" field="category_name"></has-error>
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
        // el: '#category_app',
        data() {
          return {
            editMode: false,
            form: new Form({
              id : '',
              category_name : '',
              category_id : '',
            }),

            query: "",
            queryFiled: "category_name",
            categories:{},

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

          editModal(category){
            this.editMode = true;
            this.form.reset()
            $('#addNew').modal('show');
            this.form.fill(category);
          },

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
            temp.$Progress.start()
            temp.form.post('/api/categories')
            .then(function (response) {
              $('#addNew').modal('hide')
              temp.getData();
              toastr.success('Saved category Successfully'),
              temp.$Progress.finish()
            })
            .catch(function (error) {
              toastr.error('Saved category Failed')
              temp.$Progress.fail()
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
                      toastr.success('Deleted category Successfully')
                      temp.getData();
                    })
                    .catch(function (error) {
                      toastr.error('Delete category Failed')
                    });
                  }
                })
              },

              updateCategory(id){
                this.$Progress.start()
                var temp = this
                $('#addNew').modal('hide')
                this.form.put('/api/categories/'+this.form.id)
                .then(function (response) {
                  toastr.success('Updated category Successfully');
                  temp.getData();
                  temp.$Progress.finish()
                })
                .catch(function (error) {
                  toastr.error('Updated category Failed')
                  temp.$Progress.fail()
                });
              },
            },
          }
          </script>
