@extends('admin.layouts.master')
@section('title', 'Add Supplier')

@push('css')
    <link rel="stylesheet" href="{{ asset('backend_assets/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush

@section('content')
    <div class="content-wrapper" id="supplier_app">
        <section class="content-header pb-2 pt-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <a href="" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#addModal">
                                    <i class="fa fa-plus"></i> Add Supplier
                                </a>
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $supplier->supplier_name }}</td>
                                            <td>{{ $supplier->supplier_contact_name }}</td>
                                            <td>{{ $supplier->supplier_email }}</td>
                                            <td>{{ $supplier->supplier_phone }}</td>
                                            <td>{!! $supplier->supplier_address !!}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.supplier.show',$supplier->id) }}" class="btn btn-xs btn-success">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-xs btn-success" @click.prevent="editSupplier({{$supplier}})" data-toggle="modal" data-target="#editModal">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-xs btn-danger" @click.prevent="deleteSupplier({{$supplier->id}})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Add Modal -->
        <div class="modal fade" id="addModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Supplier</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" v-model="supplier_name" id="supplier_name" name="supplier_name" class="form-control" placeholder="Supplier Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Contact Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" v-model="supplier_contact_name" id="supplier_contact_name" name="supplier_contact_name" class="form-control" placeholder="Supplier Contact Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" v-model="supplier_email" id="supplier_email" name="supplier_email" class="form-control" placeholder="Supplier Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" v-model="supplier_phone" id="supplier_phone" name="supplier_phone" class="form-control" placeholder="Supplier Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea v-model="supplier_address" id="supplier_address" name="supplier_address" class="form-control" rows="3" placeholder="Supplier Address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Cancel
                            </button>
                            <button @click.prevent="addNewSupplier()" type="submit" class="btn btn-primary"  data-dismiss="modal">
                                <i class="fa fa-plus"></i> Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Supplier</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" v-model="supplier_name" id="supplier_name" name="supplier_name" class="form-control" placeholder="Supplier Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Contact Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" v-model="supplier_contact_name" id="supplier_contact_name" name="supplier_contact_name" class="form-control" placeholder="Supplier Contact Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" v-model="supplier_email" id="supplier_email" name="supplier_email" class="form-control" placeholder="Supplier Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" v-model="supplier_phone" id="supplier_phone" name="supplier_phone" class="form-control" placeholder="Supplier Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea v-model="supplier_address" id="supplier_address" name="supplier_address" class="form-control" rows="3" placeholder="Supplier Address"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" v-model="supplier_id">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Cancel
                            </button>
                            <button @click.prevent="updateSupplier(supplier_id)" type="submit" class="btn btn-primary"  data-dismiss="modal">
                                <i class="fa fa-plus"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal -->

@endsection
@push('scripts')
    <script>
        var supplier_app = new Vue({
            el: '#supplier_app',
            data() {
                return{
                    supplier_name : '',
                    supplier_contact_name : '',
                    supplier_email : '',
                    supplier_phone : '',
                    supplier_address : '',
                    supplier_id : '',
                }
            },

            mounted(){
                // this.addNewSupplier()
            },

            methods:{
                addNewSupplier(){
                    axios.post('/admin/supplier', {
                        supplier_name : this.supplier_name,
                        supplier_contact_name : this.supplier_contact_name,
                        supplier_email : this.supplier_email,
                        supplier_phone : this.supplier_phone,
                        supplier_address : this.supplier_address,
                    })
                    .then(function (response) {
                        toastr.success('Saved Supplier Successfully')
                        setTimeout(function(){
                            location.reload();
                        }, 700);
                    })
                },

                deleteSupplier(id){

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {

                        if (result.value) {
                            axios.delete('supplier/'+id)
                                .then(function (response) {
                                    toastr.success('Deleted Supplier Successfully')
                                    setTimeout(function(){
                                        location.reload();
                                    }, 700);
                                })
                                .catch(function (error) {
                                    toastr.error('Delete Supplier Failed')
                                });
                            // swalWithBootstrapButtons.fire(
                            //     'Deleted!',
                            //     'Your file has been deleted.',
                            //     'success'
                            // )
                        }
                    })

                    // Swal.fire({
                    //     title: 'Are Sure want to delete',
                    //     icon: 'question',
                    //     iconHtml: '?',
                    //     cancelButtonText: 'No',
                    //     confirmButtonText: 'Yes',
                    //     showCancelButton: true,
                    //     showCloseButton: true
                    // })
                    // axios.delete('supplier/'+id)
                    // .then(function (response) {
                    //     toastr.success('Deleted Supplier Successfully')
                    //     setTimeout(function(){
                    //         location.reload();
                    //     }, 700);
                    // })
                    // .catch(function (error) {
                    //     toastr.error('Delete Supplier Failed')
                    // });
                },
                editSupplier(supplier){
                    this.supplier_id = supplier.id,
                    this.supplier_name = supplier.supplier_name,
                    this.supplier_contact_name = supplier.supplier_contact_name,
                    this.supplier_email = supplier.supplier_email,
                    this.supplier_phone = supplier.supplier_phone,
                    this.supplier_address = supplier.supplier_address
                },

                updateSupplier(id){
                    axios.put('/admin/supplier/'+id, {
                        supplier_name : this.supplier_name,
                        supplier_contact_name : this.supplier_contact_name,
                        supplier_email : this.supplier_email,
                        supplier_phone : this.supplier_phone,
                        supplier_address : this.supplier_address,
                    })
                    .then(function (response) {
                        console.log(response.data)
                        toastr.success('Updated Supplier Successfully')
                        setTimeout(function(){
                            location.reload();
                        }, 700);
                    })
                },
            }
        })
    </script>
    <!-- DataTables -->
    <script src="{{ asset('backend_assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>

@endpush