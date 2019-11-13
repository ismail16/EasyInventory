@extends('admin.layouts.master')
@section('title', 'Add Supplier')

@push('css')
    <link rel="stylesheet" href="{{ asset('backend_assets/plugins/datatables/dataTables.bootstrap4.css')}}">
    <style>
        .swal2-icon {
            position: relative;
            box-sizing: content-box;
            justify-content: center;
            width: 2em;
            height: 2em;
            margin: 10px auto;
            border: .25em solid transparent;
            border-radius: 50%;
            font-family: inherit;
            line-height: 2em;
            cursor: default;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .swal2-icon .swal2-icon-content {
            display: flex;
            align-items: center;
            font-size: 34px;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper mb-0" id="supplier_app">
        <section class="content-header pb-2 pt-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"> @yield('title')</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <supplier-component></supplier-component>   
    </div>
@endsection
@push('scripts')
    
    <!-- DataTables -->
    <script src="{{ asset('backend_assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function () {
            // $('.editBtn').click(function(){
            //     $('.addNewSupplier').hide();
            //     $('.updateSupplier').show()
            //     $('.modal-title').text('Edit Supplier');
            // });
            // $('.addNewBtn').click(function(){
            //     $('.updateSupplier').hide()
            //     $('.addNewSupplier').show();
            //     $('.modal-title').text('Add New Supplier');
            // });

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