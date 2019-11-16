@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper" id="app1">
        <section class="content-header pb-1 pt-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <example-component></example-component>
                </div>
            </div>
        </section>
    </div>
@endsection