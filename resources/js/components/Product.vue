<template>
    <div class="container">
        <section class="content mt-2 mb-0">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0 mb-0">

                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-3 float-left">
                                    <p><router-link to="/dashboard"> Home </router-link> / products</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline ml-3 mr-2">
                                        <div class="input-group input-group-sm w-100">
                                            <select v-model="queryFiled" class="form-control w-25" id="fileds">
                                                <option value="product_name">Product Name</option>
                                                <option value="supplier_price">Supplier Price</option>
                                                <option value="sell_price">Sell Price</option>
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
                                        <router-link to="/product-create" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i> Add New Product
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-2">
                            <div class="table-responsive-sm">
                                <table id="example1-" class="table table-bordered table-striped table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Title(Name)</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Supplier Price</th>
                                            <th class="text-center">Sell Price</th>
                                            <th class="text-center">Make of Date</th>
                                            <th class="text-center">Expired Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="products.length > 0">
                                        <tr v-for="(product, index) in products">
                                            <td class="text-center">{{ index+1 }}</td>
                                            <td class="text-center">{{ product.product_name }}</td>
                                            <td class="text-center">
                                                <img v-if="product.image" :src="getImgUrl(product.image)"  class="img-fluid table_img" alt="image">
                                                <img v-else src="/images/product/default.png"  class="img-fluid table_img" alt="image">
                                            </td>
                                            <td class="text-center">{{ setting.store_currency }} {{ product.supplier_price }}</td>
                                            <td class="text-center">{{ setting.store_currency }} {{ product.sell_price }}</td>
                                            <td class="text-center">{{ product.mfg_date }}</td>
                                            <td class="text-center">{{ product.exp_date }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-xs btn-success" @click.prevent="showModal(product)">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <router-link :to="'/product/'+ product.id +'/edit'" class="btn btn-xs btn-success mr-1 ml-1">
                                                    <i class="fa fa-edit"></i>
                                                </router-link>
                                                <button class="btn btn-xs btn-danger" @click.prevent="deleteproduct(product.id)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tbody v-else-if="products.length == 0">
                                        <tr>
                                            <td colspan="9">
                                                <div class="p-3 mb-2">
                                                    <h3 class="text-center text-danger">Opps!!</h3>
                                                    <p class="text-center">Data not found</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <td colspan="9">
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

        <div  class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">Show Product Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" v-if="product">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 border">
                                        <span class="h5">Title(Name) : <b>{{ product.product_name }}</b></span>
                                    </div>

                                    <div class="col-md-6 border">
                                         <span class="h5">Category ID : <b>{{ product.category_id }}</b></span>
                                    </div>

                                    <div class="col-md-6 border">
                                         <span class="h5">Supplier ID : <b>{{ product.supplier_id }}</b></b></span>
                                    </div>

                                    <div class="col-md-6 border">
                                         <span class="h5">Product Qty : <b>{{ product.product_qty }}</b></span>
                                    </div>

                                    <div class="col-md-6 border">
                                         <span class="h5">Warehouse ID : <b>{{ product.warehouse_id }}</b></span>
                                    </div>


                                    <div class="col-md-6 border">
                                         <span class="h5">Supplier Price : <b> {{ setting.store_currency }} {{ product.supplier_price }}</b></span>
                                    </div>

                                    <div class="col-md-6 border">
                                         <span class="h5">Sell Price : <b>{{ setting.store_currency }} {{ product.sell_price }}</b></span>
                                    </div>

                                    <div class="col-md-6 border">
                                         <span class="h5">Make Of Date : <b>{{ product.mfg_date }}</b></span>
                                    </div>

                                    <div class="col-md-6 border">
                                         <span class="h5">Expired : <b>{{ product.exp_date }}</b></span>
                                    </div>

                                    <div class="col-md-6 border">
                                         <span class="h5">Model : <b>{{ product.model }}</b></span>
                                    </div>
                                     <div class="col-md-6 border">
                                        <span class="h5">Image :  </span>
                                        <img v-if="product.image" :src="getImgUrl(product.image)"  class="img-fluid table_img" alt="image">
                                        <img v-else src="/images/product/default.png"  class="img-fluid table_img" alt="image">
                                    </div>

                                    <div class="col-md-12 border">
                                        <span class="h5">Product Details : <b>{{ product.product_detail }}</b></span>
                                    </div>
                                    
                                </div>

                            </div>

                            </div>
                        </div>   
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
            query: "",
            queryFiled: "product_name",
            products:{},

            pagination:{
                current_page: 1,
            },
            setting:'',

            product:'',
            loading: true
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

        showModal(product){
            this.product = product;
            $('#showModal').modal('show');
        },

        getImgUrl: function(image){
            var photo = "/images/product/"+ image
            return photo
            console.log(photo)
        },

        getData(){
            var temp = this;
            axios.get('/api/products?page='+this.pagination.current_page)
            .then((response) => {
                temp.products = response.data.data;
                temp.pagination = response.data.meta;
                temp.loadin = false;
            })
            .catch(function (error) {
                temp.loadin = false;
                toastr.error('Something is wrong Data Loaded')
            });
        },

        searchData() {
            var temp = this;
            axios.get("/api/search/products/" + temp.queryFiled + "/" + temp.query + "?page=" +
                temp.pagination.current_page
                )
            .then(response => {
                temp.products = response.data.data;
                temp.pagination = response.data.meta;
                console.log(response.data.data)
                temp.loadin = false;
            })
            .catch(e => {
                console.log(e);
                toastr.error('Something is wrong Search Data')
            });
        },

        addNewproduct(){
            var temp = this
            temp.$Progress.start()
            temp.form.post('/api/products')
            .then(function (response) {
                $('#addNew').modal('hide')
                temp.getData();
                toastr.success('Saved product Successfully'),
                temp.$Progress.finish()
            })
            .catch(function (error) {
                toastr.error('Saved product Failed')
                temp.$Progress.fail()
            });
        },

        deleteproduct(id){
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
                    axios.delete('/api/products/'+id)
                    .then(function (response) {
                        console.log(response.data)
                        toastr.success('Deleted product Successfully')
                        temp.getData();
                    })
                    .catch(function (error) {
                        toastr.error('Delete product Failed')
                    });
                }
            })
        },

        updateproduct(id){
            this.$Progress.start()
            var temp = this
            $('#addNew').modal('hide')
            this.form.put('/api/products/'+this.form.id)
            .then(function (response) {
                toastr.success('Updated product Successfully');
                temp.getData();
                temp.$Progress.finish()
            })
            .catch(function (error) {
                toastr.error('Updated product Failed')
                temp.$Progress.fail()
            });
        },
    },
}
</script>
