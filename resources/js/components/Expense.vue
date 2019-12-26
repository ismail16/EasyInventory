<template>
    <div class="container">
        <section class="content mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 rounded-0" style="margin-bottom: 5px !important;">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-3 float-left">
                                    <p><a href="/">Home</a> / expense</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline ml-3 mr-2">
                                        <div class="input-group input-group-sm w-100">
                                            <select v-model="queryFiled" class="form-control w-25" id="fileds">
                                                <option value="expense_title">Expense Title</option>
                                                <option value="expense_due">Expense Due</option>
                                                <option value="expense_date">Expense Date</option>
                                                <option value="status">Status</option>
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
                                        <router-link to="/expense-create" class="btn btn-outline-primary btn-sm float-right">
                                            <i class="fa fa-plus"></i> Expense Create
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <table id="example1-" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.N</th>
                                        <th class="text-center">Expense Title</th>
                                        <th class="text-center">Expense Total Amount</th>
                                        <th class="text-center">Due Amount</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody v-if="expenses.length > 0 ">
                                    <tr v-for="(expense, index) in expenses">
                                        <td class="text-center">{{ index+1 }}</td>
                                        <td class="text-center">{{ expense.expense_title }}</td>
                                        <td class="text-center">{{ setting.store_currency }} {{ expense.expense_total_amount }}</td>
                                        <td class="text-center">{{ setting.store_currency }} {{ expense.expense_due }}</td>
                                        <td class="text-center">
                                            <span v-if="expense.status == 1" class="text-success">
                                                Active
                                            </span>
                                            <span v-else class="text-danger">
                                                Deactive
                                            </span>

                                        </td>
                                        <td class="text-center">
                                            <router-link :to="'/expense/'+ expense.id +'/show'" class="btn btn-xs btn-success mr-1 ml-1">
                                                <i class="fa fa-eye"></i>
                                            </router-link>
                                            <router-link :to="'/expense/'+ expense.id +'/edit'" class="btn btn-xs btn-success mr-1 ml-1">
                                                <i class="fa fa-edit"></i>
                                            </router-link>

                                            <button class="btn btn-xs btn-danger" @click.prevent="deleteexpense(expense.id)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>

                                <tbody v-else>
                                    <tr>
                                        <td colspan="8">
                                            <div class="p-3 mb-2">
                                                <h3 class="text-center text-danger">Opps!!</h3>
                                                <p class="text-center">Data expense not found</p>
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
    </div>
</template>

<script>
export default {
    data() {
        return {
            setting:'',

            query: "",
            queryFiled: "expense_title",
            expenses:{},

            pagination:{
                current_page: 1,
            },            
        }
    },

    watch:{
        query: function(newQ, old) {
            if (newQ === "") {
                this.getExpenses();
            } else {
                this.searchData();
            }
        }
    },

    mounted(){
        this.getSetting();
        this.getExpenses();
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

        getExpenses(){
            var temp = this;
            axios.get('/api/expenses?page='+this.pagination.current_page)
            .then((response) => {
                temp.expenses = response.data.data;
                temp.pagination = response.data.meta;
            })
            .catch(function (error) {
                this.loadin = true;
                toastr.error('Something is wrong Data Loaded')
            });
        },

        searchData() {
            var temp = this;
            axios.get("/api/search/expenses/" + temp.queryFiled + "/" + temp.query + "?page=" +
                temp.pagination.current_page
                )
            .then(response => {
                temp.expenses = response.data.data;
                temp.pagination = response.data.meta;
            })
            .catch(e => {
                console.log(e);
                toastr.error('Something is wrong Search Data')
            });
        },

        deleteexpense(id){
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
                    axios.delete('/api/expenses/'+id)
                    .then(function (response) {
                        toastr.success('Deleted expense Successfully')
                        temp.getData();
                    })
                    .catch(function (error) {
                        toastr.error('Delete expense Failed')
                    });
                }
            })
        },
    }
}
</script>
