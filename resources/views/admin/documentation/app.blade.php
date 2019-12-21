
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
	<link rel="stylesheet" href="{{ asset('backend_assets/plugins/toastr/toastr.min.css')}}">
	<link rel="stylesheet" href="{{ asset('backend_assets/plugins/sweetalert2/sweetalert2.min.css')}}"> 

	<!-- Toastr -->
		<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
	  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles"> -->
	  	<!-- Google Font: Source Sans Pro -->
	  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	  	<link rel="stylesheet" href="{{ asset('css/customs.css')}}"> 

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

		<?php $setting = \App\Models\Setting::orderBy('id','desc')->first(); ?>
		<div class="wrapper" id="app">

	{{-- 		<nav class="main-header navbar navbar-expand {{$setting->navbar_color}}">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<router-link to="/dashboard" class="nav-link bg-light mr-2">
							<i class="nav-icon far fa-file-alt text-warning"></i> Documentation
						</router-link>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<router-link to="/setting" class="nav-link bg-light mr-2 ">
							<i class="nav-icon fas fa-cogs text-danger"></i> Setting
						</router-link>
					</li>

					<li class="nav-item d-none d-sm-inline-block">
						<router-link to="/report" class="nav-link bg-light">
							<i class="fas fa-chart-line text-success"></i> Reports
						</router-link>
					</li>
				</ul>

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
							LN<i class="fas fa-angle-down"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right p-0">
							<a href="#" class="dropdown-item active">
								<i class="flag-icon flag-icon-us mr-2"></i> English
							</a>
							<a href="#" class="dropdown-item">
								<i class="flag-icon flag-icon-de mr-2"></i> German
							</a>
							<a href="#" class="dropdown-item">
								<i class="flag-icon flag-icon-fr mr-2"></i> French
							</a>
							<a href="#" class="dropdown-item">
								<i class="flag-icon flag-icon-es mr-2"></i> Spanish
							</a>
						</div>
					</li>
				</ul>
			</nav> --}}

			<aside class="main-sidebar elevation-4 {{$setting->sidebar_color}}">
				<a href="{{ route('admin.dashboard') }}" class="brand-link">
					<img src="{{ asset('/images/store_logo/'.$setting->store_logo) }}" alt="Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
					<span class="brand-text font-weight-light">{{ $setting->store_name }}</span>
				</a>
				<div class="sidebar"> 
					<nav class="mt-2 sidebar-nav">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							{{-- <ul id="documenter_nav"> --}}
								<li><a href="#start" class="current">Start</a></li>
								<li><a href="#install" title="Installation">Installation</a></li>
								<li><a href="#login" title="Initial Login Details">Initial Login Details</a></li>    
								<li><a href="#admin_dashboard" title="Admin Dashboard">Admin Dashboard</a></li>
								<li><a href="#supplier_hr" title="Supplier"><h3>Supplier</h3></a></li>
								<li><a href="#supplier" title="Supplier">Add New Supplier</a></li>
								<li><a href="#SuppliersList" title="Suppliers List">Suppliers List </a></li>
								<li><a href="#ViewSuppliers" title="View Suppliers">View Suppliers</a></li>    
								<li><a href="#category" title="Category"><h3>Category</h3></a></li>
								<li><a href="#addcategory" title="Add Category">Add Category</a></li>
								<li><a href="#CategoriesList" title="Categories List">Categories List</a></li>
								<li><a href="#warehouse" title="Warehouse"><h3>Warehouse</h3></a></li>
								<li><a href="#addwarehouse" title="Add Warehouse">Add Warehouse</a></li>
								<li><a href="#warehouseList" title="Warehouse List">Warehouse List</a></li>
								<li><a href="#Products" title="Products"><h3>Products</h3></a></li>
								<li><a href="#addProducts" title="Add Products">Add Products</a></li>
								<li><a href="#ProductsList" title="Products List">Products List</a></li>
								<li><a href="#ViewProduct" title="View Product">View Product</a></li>
								<li><a href="#ExportProducts" title="Export Products">Export Products</a></li>
								<li><a href="#ExpireProducts" title="Expire Products"><h3>Expire Products</h3></a></li>    
								<li><a href="#ExpireProductsList" title="Expire Products List">Expire Products List</a></li>
								<li><a href="#ViewExpireProduct" title="View Expire Product">View Expire Product</a></li>
								<li><a href="#ExportExpireProduct" title="Export Expire Product">Export Expire Product</a></li>
								<li><a href="#DeadStock" title="Dead Stock Products"><h3>Dead Stock Products</h3></a></li>
								<li><a href="#DeadStock" title="Dead Stock Products">View Dead Stock Products</a></li>
								<li><a href="#Customers" title="Customers"><h3>Customers</h3></a></li>
								<li><a href="#Customers" title="Add Customers">Add Customers</a></li>
								<li><a href="#Customers" title="Customers List">Customers List</a></li>
								<li><a href="#Customers" title="Credit Customers List">Credit Customers List</a></li>
								<li><a href="#Customers" title="Paid  Customers List">Paid  Customers List</a></li>
								<li><a href="#Invoices" title="Invoices"><h3>Invoices</h3></a></li>
								<li><a href="#Invoices" title="Add Invoices">Add Invoice</a></li>
								<li><a href="#Invoices" title="Invoices List">Invoices List</a></li>
								<li><a href="#Invoices" title="UnPaid Invoices List">UnPaid Invoices List</a></li>
								<li><a href="#Invoices" title="Paid Invoices List">Paid Invoices List</a></li>
								<li><a href="#ExpenseInvoices" title="Expense Invoices"><h3>Expense Invoices</h3></a></li>
								<li><a href="#ExpenseInvoices" title="Add Expense Type">Add Expense Type</a></li>
								<li><a href="#ExpenseInvoices" title="Manage Expense Invoics">Manage Expense Invoice</a></li>
								<li><a href="#ExpenseInvoices" title="Add Expense Invoics">Add Expense Invoice</a></li>
								<li><a href="#ExpenseInvoices" title="Expense Invoices List">Expense Invoices List</a></li>
								<li><a href="#ExpenseInvoices" title="UnPaid Expense Invoice List">UnPaid Expense Invoices List</a></li>
								<li><a href="#ExpenseInvoices" title="Paid Expense Invoices List">Paid Expense Invoices List</a></li>
								<li><a href="#Loan" title="Loan"><h3>Loan</h3></a></li>
								<li><a href="#Loan" title="Add Loaner Type">Add Loaner Type</a></li>
								<li><a href="#Loan" title="Manage Loaner Type">Manage Loaner Type</a></li>
								<li><a href="#Loan" title="Add Loan">Add Loan</a></li>
								<li><a href="#Loan" title="Manage Loan List">Manage Loan List</a></li>
								<li><a href="#Staff" title="Staff"><h3>Staff</h3></a></li>
								<li><a href="#Staff" title="Staff">Manage Staff</a></li>
								<li><a href="#Reports" title="Reports"><h3>Reports</h3></a></li>
								<li><a href="#Reports" title="Reports">Profit/Loss Reports</a></li>
								<li><a href="#Reports" title="Reports">Sales Reports</a></li>
								<li><a href="#Reports" title="Reports">Expense Reports</a></li>
								<li><a href="#Setting" title="Setting"><h3>Setting</h3></a></li>
								<li><a href="#Setting" title="Company Info">Company Info</a></li>
								<li><a href="#Setting" title="Currency Setting">Currency Setting</a></li>    
								<li><a href="#customer_support" title="Customer Support"><h3>Customer Support</h3></a></li>
								<li><a href="#product_customization" title="Product Customization"><h3>Product Customization</h3></a></li>  
						</ul>
					</nav>
				</div>
			</aside>

			
			@yield('content')


			<footer class="main-footer" style="position: relative;">
				<strong>Copyright &copy; 2019 <a href="{{'/'}}">{{ $setting->store_name }}</a>.</strong>
				All rights reserved.
				<div class="float-right d-none d-sm-inline-block">
					<b>Version</b> 1.0.0
				</div>
			</footer>

		</div>
		<!-- ./wrapper -->

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
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->


		<script src="{{ mix('js/app.js') }}"></script>


		<link rel="stylesheet" type="text/css" href="https://www.johnhopkinspress.com/datetime_picker/jquery.datetimepicker.min.css"/>
		<script src="https://www.johnhopkinspress.com/datetime_picker/bootstrap.min.js"></script>
		<script src="https://www.johnhopkinspress.com/datetime_picker/jquery.datetimepicker.js"></script>

		<!-- PAGE SCRIPTS -->
		{{-- <script src="{{ asset('backend_assets/dist/js/pages/dashboard2.js') }}"></script> --}}

		
		@stack('scripts')
		<script>
			$('#printInvoice').click(function(){
	            // Popup($('.invoice')[0].outerHTML);
	            // function Popup(data) 
	            // {
	            	window.print();
	                // return true;
	            // }
	        });
	    </script>
	</body>
	</html>

