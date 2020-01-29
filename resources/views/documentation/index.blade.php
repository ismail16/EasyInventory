@extends('documentation.app') 
@section('title','Documentation') @section('content')
<div class="content-wrapper mt-0">
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="_card p-3">
                        <div id="documenter_content">
                            <section id="start">
                                <h1>Easy Inventory</h1>
                                <h3 style="font-size: 15px; margin:0;">Inventory Control and Inventory Management System - Version 1.0.1</h3>
                                 <h4  class="text-success">[ System is Fully Live Time. Developed by Vue, Laravel ]</h4>
                                <hr>
                                <p style="text-align: justify;">If you have any questions and You face any kind of problem during installation phase of Easy Inventory - <strong>Do Not Worry - We are here to help you!! Contact us directly at below information</strong>
                                    <br>
                                </p>
                                <p>E-mail Address : <b>ismail32cse@gmail.com</b></p>
                            </section>

                            <section id="Features" class="mb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>System Features</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="border-bottom">Easy Inventory Management System </h5>
                                    </div>
                                    <div class="col-md-5 border-left ml-4">
                                        <ul>
                                            <li class="border-bottom">Suppliers Management</li>
                                            <li class="border-bottom">Category Management</li>
                                            <li class="border-bottom">Warehouse Management</li>
                                            <li class="border-bottom">Products Management</li>
                                            <li class="border-bottom">Customers Management</li>
                                            <li class="border-bottom">Loan Management</li>
                                            <li class="border-bottom">Staff Management</li>
                                            <li class="border-bottom">Expense Management</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 border-left">
                                        <ul>
                                            <li class="border-bottom">Invoice System</li>
                                            <li class="border-bottom">Dailly Sales, Expense, Profit/Loss Report</li>
                                            <li class="border-bottom">Yearly Sales, Expense, Profit/Loss Report</li>
                                            <li class="border-bottom">Store Settings</li>
                                            <li class="border-bottom">Store Navbar and Sidebar Color Light and Durk are  available </li>
                                            <li class="border-bottom">Store Font Size Small and Lerge are available</li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                            <section id="install">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Installation</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <h5>Minimal Requirements</h5>
                                        <ul>
                                            <li>PHP &gt;= 7.1.3</li>
                                            <li>OpenSSL PHP Extension</li>
                                            <li>PDO PHP Extension</li>
                                            <li>Mbstring PHP Extension</li>
                                            <li>Tokenizer PHP Extension</li>
                                            <li>XML PHP Extension</li>
                                            <li>Ctype PHP Extension</li>
                                            <li>JSON PHP Extension</li>
                                            <li>BCMath PHP Extension</li>
                                        </ul>

                                        <h5>Follow these steps to install Easy Inventory.</h5>
                                        <ul>
                                            <strong>Step 1</strong>
                                            <li>Unzip the downloaded folder</li>
                                            <li>Copy the files from inside the folder : " Easy_Inventory " into your server</li>
                                            <strong>Step 2</strong>
                                            <li>Create Database, Database Username, Password.</li>
                                            <li>Then go to Your Server phpMyAdmin.</li>
                                            <li>import " <b>easyinventory_db.sql</b> " to database.</li>
                                            <strong>Step 3</strong>
                                            <li>Go to root folder open .env file </li>
                                            <li>
                                                DB_DATABASE= "Database Name"
                                                <br> DB_USERNAME= "Database User Name"
                                                <br> DB_PASSWORD= "Database password"
                                            </li>
                                            <li>All Done!</li>
                                        </ul>
                                    </div>

                                    <div class="col-md-7">
                                        <p><strong>Installation Step</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/phpMyAdmin.png') }}" width="">
                                    </div>
                                </div>
                            </section>

                            <section id="login">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Login Details:</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <p style="text-align: justify;">To log-in to admin panel - please use the following login credentials provided below.</p>
                                        <p style="text-align: justify;">
                                            <strong style="color: red">Please Note:</strong> Once you installed the system and you are on login page, if the login page not showing correctly OR not logging to system then you need to check again the .env file which is in side root of main folder, make sure your php have 7.1  version installed. if still problem exist you may contact us at <b>ismail32cse@gmail.com</b>, we will reply you as soon as possible.
                                            <br>
                                            <br>

                                        </p>
                                    </div>

                                    <div class="col-md-7">
                                        <strong>The login credentials provided below are for initial usage only - do not forget to update your password after first successful login.</strong>
                                        <p>After login to admin panel, you can create accounts for employees</p>
                                        <div class="row">
                                            <div class="col-12">

                                            </div>
                                            <div class="col-sm-4">
                                                <p><strong>UserID : <span class="text-danger">admin@email.com</span> </strong> </p>
                                                <p><strong>Password : <span class="text-danger">11111111</span></strong> </p>
                                            </div>
                                            <div class="col-sm-8">
                                                <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/login.jpg')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section id="admin_dashboard" class="pb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Admin Dashboard</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <ul>
                                            <li>Easy user interface and interactive design to facilitate admins</li>
                                            <li>View Total Category, Total Product, Total Sales, Total Customers.</li>
                                            <li>View Current Monthly Sales in Graph.</li>
                                            <li>View Recent Invoices</li>
                                            <li>View Total Revenue, Total Due, Total Expence, Total Profit</li>
                                        </ul>

                                        <strong>NOTE: First you need to add Suppliers, after Suppliers add Categories, then add Warehouse, and after Warehouse add Products then everything will work smoothly:)<br> <br>

                                        Because Products depends on Categories, Suppliers, Warehouse. Warehouse is the place where you keeps your products.</strong>

                                    </div>

                                    <div class="col-md-7">
                                        <p><strong>Administrator Dashabord</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/Dashboard.png')}}"> </li>

                                    </div>
                                </div>
                            </section>

                            <section id="supplier">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Supplier</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <p style="text-align: justify;"> Adding a new supplier in the system is very easy. you can add all related information of supplier. The facilities that Supplier management holds in Easy Inventory are listed below:
                                            <br>
                                            <br> To click <b>Supplier</b> from sidebar</p>
                                        <ul>
                                            <li><strong>Add New Supplier</strong></li>
                                            <li style="list-style: none; text-align: justify;"> You can easily add new Supplier in the system. The form is elaborate with all possible information you might need to add for a new supplier. During addition of new supplier you just have to provide the Supplier name ( <span class="text-danger">Name is required</span>), Supplier Contact Person Name, Email, Phone and Address. </li>
                                            <li><strong>Supplier List</strong></li>
                                            <li style="list-style: none; text-align: justify;"> You can see list of all supplier at a glance. You Can Edit, Delete From here </li>
                                        </ul>
                                        <br>
                                    </div>

                                    <div class="col-md-7">
                                        <p><strong>Add Supplier and Supplier List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/AddSuppliers.png')}}"> </li>
                                        <p id="SuppliersList"><strong>Supplier List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/Suppliers.png')}}">

                                    </div>
                                </div>
                            </section>

                            <section id="category">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Category</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <p style="text-align: justify;"> Adding a new Category in the system is very easy. You can just click on add category. and put the category name. click submit.
                                            <br>
                                            <br> Click to Category From sidebar </p>
                                        <ul>
                                            <li><strong>Categories List</strong></li>
                                            <li style="list-style: none; text-align: justify;"> You can see list of all Categories. You Can Edit, Delete From here</li>
                                        </ul>
                                        <br>
                                    </div>
                                    <div class="col-7">
                                        <p><strong>Add Category and Categories List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/AddCategory.png')}}">
                                        <p id="CategoriesList"><strong>Categories List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/Categories.png')}}">
                                    </div>
                                </div>

                            </section>

                            <section id="warehouse">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Warehouse</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <p style="text-align: justify;"> Adding a new warehouse in the system is very easy. You can just click on Warehouse. and put the warehouse name. click submit.
                                            <br>
                                            <br> Click to warehouse from Sidebar </p>
                                        <ul>

                                            <li><strong>Add New warehouse</strong></li>
                                            <li style="list-style: none; text-align: justify;"> You can easily add new warehouse in the system. </li>
                                            <li><strong>warehouse List</strong></li>
                                            <li style="list-style: none; text-align: justify;"> You can see list of all warehouse.  You Can Edit, Delete From here</li>
                                        </ul>
                                    </div>
                                    <div class="col-7">
                                        <p><strong>Add warehouse and warehouse List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/AddWarehouse.png')}}">

                                        <p id="warehouseList"><strong>Warehouse List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/Warehouse.png')}}">

                                    </div>
                                </div>

                            </section>

                            <section id="Products">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Products</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <p style="text-align: justify;"> Adding a new Product in the system is very easy. you can add all related information of Product. The facilities that Product management holds in Easy Inventory are listed below:
                                            <br>
                                            <br> Click to ProductsFrom sidebar </p>
                                        <ul>
                                            <li id="addProducts"><strong>Add New Product</strong></li>
                                            <li style="list-style: none; text-align: justify; "> You can easily add new Product in the system. The form is elaborate with all possible information you might need to add for a new Product. During addition of new Product you just have to provide the Product, Category, Warehouse, Mfg.Date, Exp.Date, Image, Detail, Quantity, Sell Price, Supplier Price, Model, SKU, Supplier. </li>
                                            <li><strong>Products List</strong></li>
                                            <li style="list-style: none; text-align: justify; "> You can see list of all Products. You Can View, Edit, Delete From here</li>
                                        </ul>
                                    </div>
                                    <div class="col-7">
                                        <p><strong>Add Product and Products List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/AddProduct.png')}}">

                                        <p id="ProductsList"><strong>Products List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/Products.png')}}">
                                        <p id="ViewProduct"><strong>View Products</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/viewProducts.png')}}">
                                    </div>
                                </div>

                            </section>

                            <section id="Customers">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Customers</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <p style="text-align: justify;"> Adding a new customer in the system is very easy. You can add all related information of a customer. The facilities that customer management holds in Easy Inventory are listed below:
                                            <br>
                                            <br> Click Customers from sidebar </p>
                                        <ul>
                                            <li><strong>Add New Customer</strong></li>
                                            <li style="list-style: none; text-align: justify; "> You can easily add new customer in the system. The form is elaborate with all possible information you might need to add for a new customer. During addition of new customer you just have to provide the Customer Name, Mobile #, Email, Address. </li>
                                            <li><strong>Customers List</strong></li>
                                            <li style="list-style: none; text-align: justify; "> You can see list of all customers. You Can Edit, Delete From here </li>
                                        </ul>
                                    </div>
                                    <div class="col-7">
                                        <p><strong>Add Customers</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/AddCustomer.png')}}"> </li>
                                        <p><strong>Customers List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/Customers.png')}}"> </li>
                                    </div>
                                </div>

                            </section>

                            <section id="Invoices">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Invoices</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <p style="text-align: justify;"> Adding a new Invoices in the system is very easy. The facilities that invoice management holds in Easy Inventory are listed below:
                                            <br>
                                            <br> Click Invoices From Sidebar </p>
                                        <ul>
                                            <li><strong>Add New Invoice</strong></li>
                                            <li style="list-style: none; text-align: justify; "> You can easily add new invoice in the system. The form is elaborate with all possible information you might need to add for a new invoice. You can search the customer name by putting the customer first name first alphabet in search box the system will automatically pull out the customer full name. if the customer is new all you will have to click on new customer name button and fill the name, Mobile, Address. </li>
                                            <li><strong>Invoice List</strong></li>
                                            <li style="list-style: none; text-align: justify; "> You can see list of all Invoice at a glance. </li>
                                            <li><strong>Print/View Invoice</strong></li>
                                            <li style="list-style: none; text-align: justify; "> once you created invoice then go to invoice view, Edit, Delete invoice and print. </li>
                                        </ul>
                                    </div>
                                    <div class="col-7">
                                        <p><strong>Add Invoice</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/AddInvoice.png')}}">
                                        <p><strong>Invoices List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/Invoices.png')}}">
                                        <p><strong>Print/View Invoice</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/Invoicesprintview.png')}}">
                                        
                                    </div>
                                </div>

                            </section>

                            <section id="ExpenseInvoices">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Expense Invoices</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <p style="text-align: justify;"> Adding a new Expense Invoices in the system is very easy. The facilities that invoice management holds in Easy Inventory are listed below:
                                            <br>
                                            <br> Click Expenses Invoices From Sidebar </p>
                                            
                                        <ul>
                                            <li><strong>Add New Expense Invoice</strong></li>
                                            <li style="list-style: none; text-align: justify; "> once you add expense type to the system then you can easily add new expense invoice in the system. add the Item info , Quantity, Rate, the system will automatially do calculation.</li>
                                            <li><strong>Expense Invoice List</strong></li>
                                            <li style="list-style: none; text-align: justify; "> You can see list of all expense invoice at a glance. </li>
                                            <li><strong>Print/View Expense Invoice</strong></li>
                                            <li style="list-style: none; text-align: justify; "> once you created invoice then go to invoice view, Edit, Delete invoice and print. </li>
                                        </ul>
                                    </div>
                                    <div class="col-7">
                                        <p><strong>Add Expense Invoice</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/AddExpense.png')}}">
                                        <p><strong>Expense Invoices List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/expenseinvoicesList.png')}}">
                                        <p><strong>Print/View Expense Invoice</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/expenseinvoiceInvoices.png')}}">
                                    </div>
                                </div>

                            </section>

                            <section id="Loan">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Loans</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                         <p style="text-align: justify;"> Adding a new Loans in the system is very easy. You can add all related information of a Loans. The facilities that Loans management holds in Easy Inventory are listed below:
                                            <br>
                                            <br> Click Loans from sidebar </p>
                                        <ul>
                                            <li><strong>Add New Loans</strong></li>
                                            <li style="list-style: none; text-align: justify; "> You can easily add new Loans in the system. The form is elaborate with all possible information you might need to add for a new Loans. During addition of new Loan you just have to provide the Loaner name, Loaner Mobile, Loaner Email, Taken date, End date Loaner Address. </li>
                                            <li><strong>Loans List</strong></li>
                                            <li style="list-style: none; text-align: justify; "> You can see list of all Loans. You Can View, Edit, Delete From here </li>
                                        </ul>

                                        </ul>
                                    </div>
                                    <div class="col-7">
                                        <p><strong>Add Loan</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/AddLoan.png')}}">
                                        <p><strong>Loans List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/LoansList.png')}}">
                                        <p><strong>View Loan Detail</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/Loansview.png')}}">
                                    </div>
                                </div>

                            </section>

                            <section id="Staff">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Staff</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <p style="text-align: justify;"> Adding a new Staff in the system is very easy. You can add all related information of a Staff. The facilities that staff management holds in Easy Inventory are listed below:
                                            <br>
                                            <br> Click Staff From Sidebar </p>
                                        <ul>
                                            <li><strong>Add New Staff</strong></li>
                                            <li style="list-style: none; text-align: justify; "> You can easily add new staff in the system. The form is elaborate with all possible information you might need to add for a new staff. During addition of new staff you just have to provide the Name, User Name, Phone, Address, User Type, Password. </li>
                                            <li><strong>User Type</strong></li>
                                            <li style="list-style: none; text-align: justify; ">There are 2 kind of User type,  Admin, saleman. admin can control full system, Salesman can only add and view product invoice only. while Accountant can add,edit,delete product invoices and expense invoices only. </li>
                                            <li><strong>Staff List</strong></li>
                                            <li style="list-style: none; text-align: justify; "> You can see list of all staff. You Can View, Edit, Delete From here</li>
                                        </ul>
                                    </div>
                                    <div class="col-7">
                                        <p><strong>Add Staff</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/AddStaff.png')}}">
                                        <p><strong>Staff List</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/Staff.png')}}">
                                    </div>
                                </div>

                            </section>

                            <section id="Reports">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Reports</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <p style="text-align: justify;"> Reports is an important feature every company needs Reports to see there Profit/Loss, Expense and sales. The various features the Reports provides are listed below:
                                            <br>
                                            <br> To view Reports go to Reports </p>
                                        <ul>
                                           <li class="border-bottom">Dailly Sales, Expense, Profit/Loss Report</li>
                                            <li class="border-bottom">Yearly Sales, Expense, Profit/Loss Report</li>
                                        </ul>
                                    </div>
                                    <div class="col-7">
                                        <p><strong>Sales Reports</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/SalesLedger.png')}}">
                                    </div>
                                </div>

                            </section>

                            <section id="Setting">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Company info Setting</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <p style="text-align: justify;"> Adding company info in the system is very easy. You have to add all related information of company in form.
                                            <br>
                                            <br> To view company info go to " <b>Setting</b> " </p>
                                    </div>
                                    <div class="col-7">
                                        <p><strong>Company-info</strong></p>
                                        <img class="img-fluid" src="{{ asset('backend_assets/dist/img/documentation/Company-info.png')}}">
                                    </div>
                                </div>
                            </section>

                            <section id="customer_support">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Customer Support</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p style="text-align: justify;"><strong>All the support related issue should be emailed directly to <span class="text-danger">ismail32cse@gmail.com</span> Please be informed that CodeCanyon comments page isn't for support.</strong>
                                            <br>Support is available from 6:00 PM - 1:00 AM (GMT+6), Sunday - Thursday. If you are having any difficulty in understanding the product or you have any question, We encourage you to contact us. Email us at <strong><span class="text-danger">ismail32cse@gmail.com</span></strong> for fast response. We will be glad to help you. </p>

                                    </div>

                                </div>

                            </section>

                            <section id="product_customization">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Product Customization</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p style="text-align: justify;"> <strong>Easy Inventory can be customize depending on your need. Our charges are affordable.</strong> We work and charge for customization as <span class="font-weight-bold text-danger">$12/hour</span>.  </p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>

@endsection