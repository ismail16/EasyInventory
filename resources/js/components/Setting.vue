<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-3 float-left">
                                    <p><router-link to="/dashboard"> Home </router-link> / Settings</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="updateSetting">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Store Name <i class="text-danger">*</i></label>
                                                <div class="col-sm-9">
                                                    <input type="text" v-model="form.store_name" placeholder="Store Name" class="form-control-sm w-100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                               <label for="inputPassword" class="col-sm-3 col-form-label">Brand Logo</label>
                                                <div class="col-sm-7 ml-2">
                                                    <input type="file" :src="form.store_logo" @change="uploadStore_logo" />
                                                </div>

                                                <div id="preview col-sm-2">
                                                    <img v-if="form.store_logo" :src="getImgUrl(form.store_logo)" class="img-fluid setting_logo"/>

                                                    <img v-else src="/images/logo.png" class="img-fluid setting_logo"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Owner Name <i class="text-danger">*</i></label>
                                                <div class="col-sm-9">
                                                    <input type="text" v-model="form.owner_name" placeholder="Store Name" class="form-control-sm w-100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                               <label for="inputPassword" class="col-sm-3 col-form-label">Owner Photo</label>
                                                <div class="col-sm-7 ml-2">
                                                    <input type="file" :src="form.owner_image" @change="uploadOwnerImage" />
                                                </div>

                                                <div id="preview col-sm-2">
                                                    <img v-if="form.owner_image" :src="getImgUrl1(form.owner_image)" class="img-fluid setting_logo"/>

                                                    <img v-else src="/images/default.png" class="img-fluid setting_logo"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                               <label class="col-sm-3 form-control-label">Store Mobile <i class="text-danger">*</i></label>
                                                <div class="col-sm-9">
                                                    <input type="number" v-model="form.store_mobile" placeholder="Store Mobile" class="form-control-sm w-100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                               <label class="col-sm-3 form-control-label">Store Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" v-model="form.store_email" placeholder="Store Email" class="form-control-sm w-100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                               <label class="col-sm-3 form-control-label">Store Website <i class="text-danger">*</i></label>
                                                <div class="col-sm-9">
                                                    <input type="text" v-model="form.store_website" placeholder="Store Website" class="form-control-sm w-100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                               <label class="col-sm-3 form-control-label">Store Currency <i class="text-danger">*</i></label>
                                                <div class="col-sm-9">
                                                    <input type="text" v-model="form.store_currency" placeholder="Ex: $/£/€/¥/₤/Rs/Bs/Tk" class="form-control-sm w-100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Navbar Color <i class="text-danger">*</i></label>
                                                <div class="col-sm-9">
                                                    <select v-model="form.navbar_color" name="navbar_color" class="form-control-sm w-100 w-100">
                                                         <option value="navbar-light">navbar-light</option>
                                                         <option value="navbar-dark">navbar-dark</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Sidebar Color <i class="text-danger">*</i></label>
                                                <div class="col-sm-9">
                                                    <select v-model="form.sidebar_color" name="sidebar_color" class="form-control-sm w-100 w-100">
                                                        <option value="sidebar-light-navy">sidebar-light</option>
                                                        <option value="sidebar-dark-primary">sidebar-dark</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Text Size <i class="text-danger">*</i></label>
                                                <div class="col-sm-9">
                                                     <select v-model="form.text_size" name="text_size" class="form-control-sm w-100 w-100" required>
                                                         <option value="text-sm">Small</option>
                                                         <option value="1">Lerge</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                               <label class="col-sm-3 form-control-label">Store Address</label>
                                                <div class="col-sm-9">
                                                    <textarea v-model="form.store_address" id="store_address" name="Store_address" class="form-control" rows="2" placeholder="Store Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-sm btn-success float-right" >
                                        Update Settings
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
        return {
            form: new Form({
                id : '',
                store_name : '',
                store_logo : '',
                owner_name : '',
                owner_image : '',
                store_mobile : '',
                store_email : '',
                store_website : '',
                store_currency : '',
                navbar_color : '',
                sidebar_color : '',
                text_size : 1,
                store_address : ''
            }),

            store_logo_url:'',
            owner_img_url:'',
        }
    },

    mounted(){
        this.getData();
    },

    computed: {

    },

    methods:{

        getImgUrl: function(image){
          var photo = "/images/store_logo/"+ image
          return photo
      }, 

      getImgUrl1: function(image){
          var photo = "/images/owner_image/"+ image
          return photo
      },


        uploadStore_logo(e) {
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
                this.store_logo_url = URL.createObjectURL(file);
            }
            reader.onloadend = (file) => {
                this.form.store_logo = reader.result
            }
            reader.readAsDataURL(file);
        },

        uploadOwnerImage(e) {
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
                this.owner_img_url = URL.createObjectURL(file);
            }
            reader.onloadend = (file) => {
                this.form.owner_image = reader.result
            }
            reader.readAsDataURL(file);
        },


        updateSetting: function(){
            this.$Progress.start()
            var temp = this
            temp.form.products = temp.products;
            axios.put('/api/setting/'+this.form.id,{
                setting:temp.form,
                store_logo_url:temp.store_logo_url,
                owner_img_url:temp.owner_img_url
            })
            .then(function (response) {
              toastr.success('Updated Supplier Successfully');
              temp.$Progress.finish()
              location.reload();
              window.location.href = "/admin/dashboard";
            })
            .catch(function (error) {
              toastr.error('Updated Supplier Failed')
              temp.$Progress.fail()
            });
        },

        getData(){
            var temp = this;
            axios.get('/api/setting/1')
            .then((response) => {
                temp.form = response.data;
            })
            .catch(function (error) {
                this.loadin = true; 
                toastr.error('Something is wrong Data Loaded')
            });
        },

    }
}
</script>
