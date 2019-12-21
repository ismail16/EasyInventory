
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>@yield('title')</title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('backend_assets/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ asset('backend_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('backend_assets/dist/css/adminlte.min.css')}}">

  	<!-- Google Font: Source Sans Pro -->
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  	<link rel="stylesheet" href="{{ asset('css/customs.css')}}"> 

	</head>

	<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">

		<?php $setting = \App\Models\Setting::orderBy('id','desc')->first(); ?>
		<div class="wrapper">
	 		<!-- <nav class="main-header navbar navbar-expand navbar-light">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="{{ route('admin.dashboard') }}" class="nav-link bg-light">
							<i class="fas fa-tachometer-alt text-warning"></i> Back To Dashboard
						</a>
					</li>
				</ul>

			</nav>  -->

			<aside class="main-sidebar elevation-4 {{$setting->sidebar_color}}">
				<a href="{{ route('admin.dashboard') }}" class="brand-link bg-light">
					<img src="{{ asset('/images/store_logo/'.$setting->store_logo) }}" alt="Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
					<span class="brand-text font-weight-light">Documentation</span>
				</a>

				<div class="sidebar"> 
					<nav class="mt-2 sidebar-nav">
						
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

							<li class="nav-item">
								<a href="#start" title="Start" class="nav-link">
									<i class="nav-icon  fab fa-accessible-icon"></i>
									<p>Start</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#install" title="Installation" class="nav-link">
									<i class="nav-icon fas fa-tools"></i>
									<p>Installation</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#login" title="Initial Login Details" class="nav-link">
									<i class="nav-icon fas fa-lock-open"></i>
									<p>Initial Login Details</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#admin_dashboard"  title="Admin Dashboard" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>Admin Dashboard</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#supplier" title="Suppliers" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>Suppliers</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#category" title="Categories" class="nav-link">
									<i class="nav-icon fas fa-th-large"></i>
									<p>Categories</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#warehouse" title="Warehouse" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p> Warehouse</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#Products" title="Products" class="nav-link">
									<i class="nav-icon fab fa-product-hunt"></i>
									<p>Products</p>
								</a>
							</li> 

							<li class="nav-item">
								<a href="#Invoices" title="Suppliers Invoice" class="nav-link">
									<i class="nav-icon far fa-file-alt"></i>
									<p>Suppliers Invoice</p>
								</a>
							</li> 

							<li class="nav-item">
								<a href="#Customers" title="Customers" class="nav-link">
									<i class="nav-icon fas fa-user-friends"></i>
									<p>Customers</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#Invoices" title="Invoice" class="nav-link">
									<i class="nav-icon far fa-file-alt"></i>
									<p>Invoice</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#ExpenseInvoices" title="Expenses" class="nav-link">
									<i class="nav-icon fas fa-dollar-sign"></i>
									<p>Expenses</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#Loan" title="Loan" class="nav-link">
									<i class="nav-icon far fa-money-bill-alt"></i>
									<p>Loan</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#Staff" title="Staff" class="nav-link">
									<i class="nav-icon fas fa-users-cog"></i>
									<p>Staff</p>
								</a>
							</li> 
						</ul>
						<a href="{{ route('admin.dashboard') }}" title="Admin Dashboard" class="nav-link bg-light">
							<i class="fas fa-tachometer-alt text-warning"></i> Back To Dashboard
						</a>
					</nav>
				</div>
				<div class="sidebar"> 
					<nav class="mt-2 sidebar-nav">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							
							<li><a href="#start" class="current">Start</a></li>
							<li><a href="#install" title="Installation">Installation</a></li>
							<li><a href="#login" title="Initial Login Details">Initial Login Details</a></li>    
							<li><a href="#admin_dashboard" title="Admin Dashboard">Admin Dashboard</a></li>
							<li><a href="#supplier_hr" title="Supplier"><h3>Supplier</h3></a></li>
							<li><a href="#supplier" title="Supplier">Add New Supplier</a></li>
							<li><a href="#SuppliersList" title="Suppliers List">Suppliers List </a></li>
							<li><a href="#ViewSuppliers" title="View Suppliers">View Suppliers</a></li>    
							<!-- <li><a href="#category" title="Category"><h3>Category</h3></a></li> -->
							<li><a href="#addcategory" title="Add Category">Add Category</a></li>
							<li><a href="#CategoriesList" title="Categories List">Categories List</a></li>
							<!-- <li><a href="#warehouse" title="Warehouse"><h3>Warehouse</h3></a></li> -->
							<li><a href="#addwarehouse" title="Add Warehouse">Add Warehouse</a></li>
							<li><a href="#warehouseList" title="Warehouse List">Warehouse List</a></li>
							<!-- <li><a href="#Products" title="Products"><h3>Products</h3></a></li> -->
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
							<!-- <li><a href="#Customers" title="Customers"><h3>Customers</h3></a></li> -->
							<li><a href="#Customers" title="Add Customers">Add Customers</a></li>
							<li><a href="#Customers" title="Customers List">Customers List</a></li>
							<li><a href="#Customers" title="Credit Customers List">Credit Customers List</a></li>
							<li><a href="#Customers" title="Paid  Customers List">Paid  Customers List</a></li>
							<!-- <li><a href="#Invoices" title="Invoices"><h3>Invoices</h3></a></li> -->
							<li><a href="#Invoices" title="Add Invoices">Add Invoice</a></li>
							<li><a href="#Invoices" title="Invoices List">Invoices List</a></li>
							<li><a href="#Invoices" title="UnPaid Invoices List">UnPaid Invoices List</a></li>
							<li><a href="#Invoices" title="Paid Invoices List">Paid Invoices List</a></li>
							<!-- <li><a href="#ExpenseInvoices" title="Expense Invoices"><h3>Expense Invoices</h3></a></li> -->
							<li><a href="#ExpenseInvoices" title="Add Expense Type">Add Expense Type</a></li>
							<li><a href="#ExpenseInvoices" title="Manage Expense Invoics">Manage Expense Invoice</a></li>
							<li><a href="#ExpenseInvoices" title="Add Expense Invoics">Add Expense Invoice</a></li>
							<li><a href="#ExpenseInvoices" title="Expense Invoices List">Expense Invoices List</a></li>
							<li><a href="#ExpenseInvoices" title="UnPaid Expense Invoice List">UnPaid Expense Invoices List</a></li>
							<li><a href="#ExpenseInvoices" title="Paid Expense Invoices List">Paid Expense Invoices List</a></li>
							<!-- <li><a href="#Loan" title="Loan"><h3>Loan</h3></a></li> -->
							<li><a href="#Loan" title="Add Loaner Type">Add Loaner Type</a></li>
							<li><a href="#Loan" title="Manage Loaner Type">Manage Loaner Type</a></li>
							<li><a href="#Loan" title="Add Loan">Add Loan</a></li>
							<li><a href="#Loan" title="Manage Loan List">Manage Loan List</a></li>
							<!-- <li><a href="#Staff" title="Staff"><h3>Staff</h3></a></li> -->
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

		<!-- ChartJS -->
		<script src="{{ asset('backend_assets/plugins/chart.js/Chart.min.js') }}"></script>

		<script src="{{ mix('js/app.js') }}"></script>
		
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

