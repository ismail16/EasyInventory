@extends('admin.layouts.master')
@section('title', 'Add Supplier')

@push('css')
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
    <div class="content-wrapper mb-0" id="app">
        <supplier-invoice-component></supplier-invoice-component>
    </div>
@endsection
@push('scripts')

@endpush