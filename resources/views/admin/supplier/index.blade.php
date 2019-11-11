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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                    <div class="col-sm-6 pr-0">
                        <a href="" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i> Add Supplier
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <button class="swalDefaultSuccess">Click me</button>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped table-sm">

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
                                            <a href="{{ route('admin.supplier.edit',$supplier->id) }}" class="btn btn-xs btn-success">
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

        <div class="modal fade" id="myModal">
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
                            <button type="submit" class="btn btn-primary" @click.prevent="addNewSupplier()" data-dismiss="modal">
                                <i class="fa fa-plus"></i> Add
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

       <script type="text/javascript">
          // $(function() {
          //   const Toast = Swal.mixin({
          //     toast: true,
          //     position: 'top-end',
          //     showConfirmButton: false,
          //     timer: 3000
          //   });

          toastr.success('Have fun storming the castle!', 'Miracle Max Says')

        
            $('.swalDefaultSuccess').click(function() {

                console.log('jjjjj')
               // toastr["success"]("Inconceivable!")
               // toastr.options = {
               //    "closeButton": false,
               //    "debug": false,
               //    "newestOnTop": false,
               //    "progressBar": false,
               //    "positionClass": "toast-bottom-left",
               //    "preventDuplicates": false,
               //    "onclick": null,
               //    "showDuration": "300",
               //    "hideDuration": "1000",
               //    "timeOut": "5000",
               //    "extendedTimeOut": "1000",
               //    "showEasing": "swing",
               //    "hideEasing": "linear",
               //    "showMethod": "fadeIn",
               //    "hideMethod": "fadeOut"
               //  }
                              // Toast.fire({
              //   type: 'success',
              //   title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              // })
            });

          // });

        var supplier_app = new Vue({
            el: '#supplier_app',

            data() {
                return{
                    supplier_name : '',
                    supplier_contact_name : '',
                    supplier_email : '',
                    supplier_phone : '',
                    supplier_address : ''
                }
            },

            mounted(){
                this.addNewSupplier()
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
                        console.log(response.data, 'then');
                        // location.reload();
                        toastr.success('Have fun storming the castle!', 'Miracle Max Says')
                    })
                    .catch(function (error) {
                       
                    });
                },
                deleteSupplier(id){
                    axios.delete('supplier/'+id)
                        .then(function (response) {
                            console.log(response.data, 'then');
                            location.reload();
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        });
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
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>

@endpush