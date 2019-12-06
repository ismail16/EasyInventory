<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('backend_assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('backend_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend_assets/dist/css/adminlte.min.css')}}">
    <!-- Toastr -->
<<<<<<< HEAD
  <link rel="stylesheet" href="{{ asset('backend_assets/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backend_assets/plugins/sweetalert2/sweetalert2.min.css')}}"> 

  <!-- Toastr -->
<!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles"> -->
=======
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .btn-group-xs > .btn, .btn-xs {
      padding: .25rem .4rem;
      font-size: .65rem;
      line-height: .5;
      border-radius: .2rem;
    }

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

    .fade.in {
      opacity: 1;
    }
    .modal.in .modal-dialog {
      -webkit-transform: translate(0, 0);
      -o-transform: translate(0, 0);
      transform: translate(0, 0);
    }
    .modal-backdrop .fade .in {
      opacity: 0.5 !important;
    }
    .modal-backdrop.fade {
        opacity: 0.5 !important;
    }

    .nav-link { display: block; padding: 5px 1rem !important; }
<<<<<<< HEAD
    .sidebar-nav ul li { border-bottom: 1px solid #545d67; }
=======
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888

  </style>
  <script src="https://www.johnhopkinspress.com/datetime_picker/jquery.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function () {

        //DatePicker Example
        $('#datetimepicker').datetimepicker({
            format:'Y-m-d H:i:s'
        });
      });
  </script>
  
  @stack('css')
  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper" id="app">
  <!-- Navbar -->