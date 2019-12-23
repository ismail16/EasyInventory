<template>
    <div class="container">
        <!-- hukTnOztP5tzBwH5jwVKqztE7OR6heUccNGizTPXp9QFTphl4pr4atir501a -->
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-md-3 float-left">
                                <p><a href="/">Home</a> / Add New Product</p>
                          </div>
                          <div class="col-md-6">

                          </div>
                          <div class="col-md-3">
                              <div class="d-inline-flex float-right">
                                <router-link to="/product" class="btn btn-sm btn-primary float-right">
                                    <i class="nav-icon fab fa-product-hunt"></i> Products list
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <form @submit.prevent="addNewProduct">
                <div class="card-body" style="background-color: #f6f6f7;">
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                     <div class="form-group row">
                                        <label class="col-sm-2 form-control-label" style="margin-right:-43px;">Title(Name) <i class="text-danger">*</i> </label>
                                        <div class="col-sm-10">
                                            <input type="" name="" v-model="form.product_name" class="form-control-sm" style="width:105%">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="form-control-label col-sm-3">Category <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <select id="supplier_id" v-model="form.category_id" name="supplier_id" class="form-control-sm w-100 w-100" required>
                                                 <option v-for="category in categories" :value="category.id">{{ category.category_name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>  

                                <div class="col-md-6">
                                     <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Select Supplier <i class="text-danger">*</i></label>
                                    <div class="col-sm-9">
                                        <select id="supplier_id" v-model="form.supplier_id" name="supplier_id" class="form-control-sm w-100 w-100" required>
                                             <option v-for="supplier in suppliers" :value="supplier.id">{{ supplier.supplier_name }}</option>
                                        </select>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="warehouse_id" class="col-sm-3 form-control-label">Product Qty <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                           <input type="" name="product_qty" v-model="form.product_qty" class="form-control-sm w-100 w-100" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="warehouse_id" class="col-sm-3 form-control-label">Warehouse </label>
                                        <div class="col-sm-9">
                                            <select id="warehouse_id" v-model="form.warehouse_id" name="warehouse_id" class="form-control-sm w-100 w-100" data-plugin="select2">
                                                <option v-for="warehouse in warehouses" :value="warehouse.id">{{ warehouse.warehouse_name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="warehouse_id" class="col-sm-3 form-control-label">Supplier Price <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                           <input type="" name="" v-model="form.supplier_price" class="form-control-sm w-100 w-100" required>
                                        </div>
                                    </div>
                                </div>   

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="warehouse_id" class="col-sm-3 form-control-label">Sell Price </label>
                                        <div class="col-sm-9">
                                           <input type="" name="" v-model="form.sell_price" class="form-control-sm w-100 w-100">
                                        </div>
                                    </div>
                                </div>    

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"> Make Date</label>
                                        <div class="col-sm-9">    
                                            <input type="date" v-model="form.mfg_date" name="" class="form-control-sm w-100" :class="{ 'is-invalid': form.errors.has('mfg_date') }" autocomplete="off">

                                            <has-error :form="form" field="mfg_date"></has-error>                                  
                                            <!-- <datetime format="DD/MM/YYYY h:i:s" v-model="form.mfg_date" :class="{ 'is-invalid': form.errors.has('mfg_date') }" autocomplete="off"></datetime>
                                            <has-error :form="form" field="mfg_date"></has-error> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Expired Date</label>
                                        <div class="col-sm-9">                                      
                                            <datetime format="DD/MM/YYYY h:i:s" v-model="form.exp_date"  :class="{ 'is-invalid': form.errors.has('exp_date') }" autocomplete="off"></datetime>
                                            <has-error :form="form" field="exp_date"></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="warehouse_id" class="col-sm-3 form-control-label">Model </label>
                                        <div class="col-sm-9">
                                           <input type="" name="detail" v-model="form.model" class="form-control-sm w-100">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="form-control-label col-sm-3">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" :src="form.image" @change="uploadImage" class="form-control-sm w-100 w-100"/>
                                        </div>

                                        <div id="preview col-sm-2">
                                            <img v-if="img_url" :src="img_url" class="img-fluid" style="max-height: 50px; max-width: 50px;"/>
                                        </div>
                                    </div>
                                </div>    

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="warehouse_id" class="-col-sm-3 form-control-label">Product Detail </label>
                                        <div class="col-sm-9" style="margin-left: 32px;">
                                            <textarea rows="3" v-model="form.product_detail" cols="127"></textarea>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>

                </div>
                <div class="card-footer">
                    <router-link to="/product" class="btn btn-sm btn-default float-left">
                        Back to Product list
                    </router-link>

                    <button class="btn btn-sm btn-success float-right" >
                        Create Product
                    </button>
                </div>
                </form>
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
    name: 'imageUpload',

    data() {
        return {
            form: new Form({
                product_name : '',
                category_id : '',
                supplier_id : '',
                warehouse_id : '',
                product_qty : '',
                supplier_price : '',
                sell_price : '',
                mfg_date : new Date().toLocaleString('en-BD'),
                exp_date : new Date().toLocaleString('en-BD'),
                model : '',
                image : '',
                product_detail : '',              
            }), 

            img_url: '',
            suppliers:{},
            categories:{},
            warehouses:{}
        }
    },

    mounted(){
        this.getCategories();
        this.getSuppliers();
        this.getWarehouses();
    },

    computed: {
    },

    methods:{

        addNewProduct(){
            var temp = this
            temp.$Progress.start()
            temp.form.post('/api/products')
            .then(function (response) {
                console.log(response)
                toastr.success('Saved Product Successfully')
                temp.$Progress.finish()
            })
            .catch(function (error) {
                toastr.error('Saved Product Failed')
                temp.$Progress.fail()
          });
        },

        uploadImage(e) {
            let file = e.target.files[0];
            let reader = new FileReader();
            let limit = 1024 * 1024 * 2;
            if(file['size'] > limit){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'You are uploading a large file',
                })
                return false;
            }else{
                file = e.target.files[0]
                this.img_url = URL.createObjectURL(file);
            }
            reader.onloadend = (file) => {
                this.form.image = reader.result
            }
            reader.readAsDataURL(file);
        },

        getCategories(){
            var temp = this;
            axios.get('/api/categories')
            .then((response) => {
              temp.categories = response.data.data;
          })
            .catch(function (error) {
              toastr.error('Something is wrong Data Loaded')
          });
        },

        getSuppliers(){
            var temp = this;
            axios.get('/api/suppliers')
            .then((response) => {
              temp.suppliers = response.data.data;
          })
            .catch(function (error) {
              toastr.error('Something is wrong Data Loaded')
          });
        },

        getWarehouses(){
            var temp = this;
            axios.get('/api/warehouses')
            .then((response) => {
                temp.warehouses = response.data.data;
            })
            .catch(function (error) {
                toastr.error('Something is wrong Data Loaded')
            });
        },
    }
}
</script>
