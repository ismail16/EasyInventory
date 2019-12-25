<template>
    <div class="content-header pb-0">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
    export default {
        data() {
          return {
            settingaaaa:''
          }
        },
        props:['pagination', 'offset'],
        methods: {
           
        },
        computed: {
           getSetting(){
            var temp = this;
              axios.get('/api/setting/1')
                .then((response) => {
                  temp.settingaaaa = response.data;
              // temp.$store.commit('setSetting',response.data)
                  

                })
                .catch(function (error) {
                  this.loadin = true; 
                      toastr.error('Something is wrong Data Loaded')
                });
          },
        }
    }
</script>
