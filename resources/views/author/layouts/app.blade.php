
<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@yield('title')</title>
		<link rel="shortcut icon" type="image/ico" href="{{ asset('/images/store_logo/'. \App\Models\Setting::orderBy('id','desc')->first()->store_logo) }}" />
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="{{ asset('backend_assets/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="{{ asset('backend_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('backend_assets/dist/css/adminlte.min.css')}}">
		<!-- Toastr -->
		<link rel="stylesheet" href="{{ asset('backend_assets/plugins/toastr/toastr.min.css')}}">
		<link rel="stylesheet" href="{{ asset('backend_assets/plugins/sweetalert2/sweetalert2.min.css')}}"> 
	  	<!-- Google Font: Source Sans Pro -->
	  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	  	<script src="{{ asset('backend_assets/plugins/datetime_picker/jquery.min.js')}}"></script>
	  	<!-- customs css and js -->
	  	<link rel="stylesheet" href="{{ asset('css/customs.css')}}"> 
	  	<script src="{{ asset('js/customs.js')}}"></script>
	  	<!-- pushing css -->
		@stack('css')
	</head>
	<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
		<?php $setting = \App\Models\Setting::orderBy('id','desc')->first(); ?>
		<div class="wrapper" id="app">
			<nav class="main-header navbar navbar-expand {{$setting->navbar_color}}">
			    <ul class="navbar-nav">
			    	<li class="nav-item">
			        	<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
			      	</li>
			    </ul>
			    <ul class="navbar-nav ml-auto">
			      	<li class="nav-item">
			        	<ul class="navbar-nav ml-auto">
							<li class="nav-item dropdown">
								<a href="#" class="_dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<img src="{{ asset('/images/owner_image/'.$setting->owner_image) }}" class="img-circle" alt="User Image" width="30" style="margin: 5px 10px 0px 10px;">
								</a>
								<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
									<span class="dropdown-item dropdown-header">
										<img src="{{ asset('/images/owner_image/'.$setting->owner_image) }}" width="100" class="img-circle" alt="User Image">
										<p>
											{{ $setting->owner_name }} <br>
											{{ $setting->store_mobile }}
										</p>
									</span>
									<div class="dropdown-divider"></div>
									<div class="container">
										<div class="row">
											<div class="d-flex justify-content-start" style="width: 50%">
												<a href="#" class="btn btn-default btn-flat">Profile</a>
											</div>
											<div class="d-flex justify-content-end" style="width: 50%">
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="_display: none;">
													@csrf
													<button type="submit" class="btn btn-default btn-flat">Sign out</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link text-red font-weight-bold" data-toggle="dropdown" href="#">
									ENG
								</a>
							</li>
						</ul>
			    	</li>
			    </ul>
			</nav>

			<aside class="main-sidebar elevation-4 {{$setting->sidebar_color}}">
				<a href="{{ route('admin.dashboard') }}" class="brand-link">
					<img src="{{ asset('/images/store_logo/'.$setting->store_logo) }}" alt="Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
					<span class="brand-text font-weight-light">{{ $setting->store_name }}</span>
				</a>
				<div class="sidebar"> 
					<nav class="mt-2 sidebar-nav">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<li class="nav-item">
					            <a href="{{ route('admin.dashboard') }}" class="nav-link router-link-active" >
					              <i class="nav-icon fas fa-tachometer-alt"></i><p> Dashboard </p>
					            </a>
					        </li>
						</ul>
					</nav>
				</div>
			</aside>

			@yield('content')

			<footer class="main-footer" style="position: relative;">
				<strong>Copyright &copy; 2019 <a href="{{ route('admin.dashboard') }}">{{ $setting->store_name }}</a>.</strong>
				All rights reserved.
				<div class="float-right d-none d-sm-inline-block">
					<b>Version</b> 1.0.0
				</div>
			</footer>
		</div>

		<!-- jQuery -->
		<script src="{{ asset('backend_assets/plugins/jquery/jquery.min.js') }}"></script>
		<!-- Bootstrap -->
		<script src="{{ asset('backend_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<!-- overlayScrollbars -->
		<script src="{{ asset('backend_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('backend_assets/dist/js/adminlte.js') }}"></script>
		<!-- OPTIONAL SCRIPTS -->
		<script src="{{ asset('backend_assets/dist/js/demo.js') }}"></script>


		<!-- jQuery Mapael -->
		<script src="{{ asset('backend_assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
		<script src="{{ asset('backend_assets/plugins/raphael/raphael.min.js') }}"></script>
		<script src="{{ asset('backend_assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
		<script src="{{ asset('backend_assets/plugins/jquery-mapael/maps/world_countries.min.js') }}"></script>
		<!-- ChartJS -->
		<script src="{{ asset('backend_assets/plugins/chart.js/Chart.min.js') }}"></script>

		<!-- Toastr -->
		<script src="{{ asset('backend_assets/plugins/toastr/toastr.min.js')}}"></script>
		<script src="{{ asset('backend_assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

		<script src="{{ mix('js/app.js') }}"></script>

		<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/plugins/datetime_picker/jquery.datetimepicker.min.css')}}"/>
		<script src="{{ asset('backend_assets/plugins/datetime_picker/jquery.datetimepicker.js')}}"></script>

		<!-- PAGE SCRIPTS -->
		{{-- <script src="{{ asset('backend_assets/dist/js/pages/dashboard2.js') }}"></script> --}}

		<!-- pushing js -->
		@stack('scripts')
	</body>
</html>

