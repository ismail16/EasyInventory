@extends('admin.documentation.app') @section('title','Documentation') @section('content')

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
                                <hr>
                                <p style="text-align: justify;; width: 900px;">If you have any questions that are beyond the scope of this help report, please trip free to e-mail us.
                                    <br>
                                    <br> If you face any kind of problem during installation phase of Easy Inventory - <strong>Do Not Worry - We are here to help you!! Contact us directly at below information</strong>
                                    <br>
                                </p>
                                <p>E-mail Address : <b>ismail32cse@gmail.com</b></p>
                            </section>

                            <section id="install">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Installation</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h2>Minimal Requirements</h2>
                                        <ul>
                                            <li>MySQL 5.x or higher.</li>
                                            <li>PHP 7.0 or higher.</li>
                                            <li>GD library installed.</li>
                                            <li>extension=php_mysqli.dll should be installed</li>
                                            <li>Memory limit set up at least 64MB.</li>
                                            <li>Upload_max_filesize at least 10MB.</li>
                                        </ul>
                                    </div>

                                    <div class="col-md-6">

                                        <h2>Follow these steps to install Easy Inventory.</h2>
                                        <ul>
                                            <li><strong>Step 1</strong></li>
                                            <li>Unzip the downloaded folder</li>
                                            <li>Copy the files from inside the folder : "ismail32cse_1_0_1" into your server</li>
                                            <li><strong>Step 2</strong></li>
                                            <li>Create Database, Database Username, Password.</li>
                                            <li>Then go to Your Server phpMyAdmin.</li>
                                            <li>import ismail32cseDB.sql to database.</li>
                                            <li><strong>Step 3</strong></li>
                                            <li>Go back to files inside connection folder open connection.php</li>
                                            <li>Then enter hostname, username, password and database name.</li>
                                            <li>All Done!</li>
                                        </ul>
                                        <ul class="enlarge">
                                            <li style="list-style: none;">
                                                <p><strong>Installation Step</strong></p>
                                                <img src="assets/screenshots1/phpMyAdmin.png" width="750">
                                            </li>
                                        </ul>
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
                                    <div class="col-md-6">
                                        <p style="text-align: justify;">To log-in to admin panel - please use the following login credentials provided below.</p>
                                        <p style="text-align: justify;">
                                            <strong style="color: red">Please Note:</strong> Once you installed the system and you are on login page, if the login page not showing correctly OR not logging to system then you need to check again the connection file which is in side connection/connection.php, make sure your server have PHP-7 version installed. and (extension=php_mysqli.dll) should be enable on your server. if still problem exist you may contact us at ismail32cse@gmail.com, we will reply you as soon as possible.
                                            <br>
                                            <br>

                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <strong>The login credentials provided below are for initial usage only - do not forget to update your password after first successful login.</strong>
                                        <p>After login to admin panel, you can create accounts for employees</p>
                                        <table class="login_table">
                                            <tbody>
                                                <tr style="border-bottom: 1px solid #8dba60;">
                                                    <th style="text-align: center; border-right: 1px solid #8dba60;">Admin Panel</th>
                                                </tr>
                                                <tr>
                                                    <td style="border-right: 1px solid #8dba60;">
                                                        <p><strong>Username : </strong> admin</p>
                                                        <p><strong>Password : </strong> 123456</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div>
                                            <br>
                                            <p><strong>Login Panel</strong></p>
                                            <img src="assets/screenshots1/login.jpg">
                                            <br>
                                        </div>

                                    </div>
                                </div>
                            </section>

                            <section id="admin_dashboard">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                            <h3>Admin Dashboard</h3>
                                            <hr class="notop">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                            <li>Easy user interface and interactive design to facilitate admins</li>
                                            <li>View Total Receivable, Total Received Amount, Total Discount Given, Total Revenue.</li>
                                            <li>View Total Invoice, Total Sales.</li>
                                            <li>View 365 Days Sales in chart (percentage).</li>
                                            <li>View Sold Products Types, Total Sold Pro. Qty.</li>
                                            <li>View Total Items in Stock, Total Item Categories.</li>
                                            <li>View Total Customer and Total Supplier.</li>
                                            <li>View Recent Invoices and quick links to invoices.</li>
                                            <li>Search invoice through quick search box.</li>
                                        </ul>
                                        <br>

                                    </div>

                                    <div class="col-md-6">
                                        <strong>NOTE: First you need to add Suppliers, after Suppliers add Categories, then add Warehouse, and after Warehouse add Products then everything will work smoothly:)<br>
												<br>
											Because Products depends on Categories, Categories depends on Suppliers, Warehouse is the place where you keeps your products.</strong>
                                        <br>
                                        <ul class="enlarge">
                                            <li style="list-style: none;">
                                                <p><strong>Administrator Dashabord</strong></p>
                                                <img src="assets/screenshots1/Dashboard.png"> </li>
                                        </ul>

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
                                    <div class="col-md-6">
                                        <p style="text-align: justify;"> Adding a new supplier in the system is very easy. you can add all related information of supplier. The facilities that Supplier management holds in Easy Inventory are listed below:
                                            <br>
                                            <br> To view Supplier go to Supplier &gt; Manage Supplier </p>
                                        <ul>
                                            <li><strong>Add New Supplier</strong></li>
                                            <li style="list-style: none; text-align: justify; width: 500px;"> You can easily add new Supplier in the system. The form is elaborate with all possible information you might need to add for a new supplier. During addition of new supplier you just have to provide the Supplier Name/Compant name, Supplier company Contact Person Name, Email,Phone and Address. </li>
                                            <li><strong>Supplier List</strong></li>
                                            <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all supplier at a glance. </li>
                                        </ul>
                                        <br>
                                    </div>

                                    <div class="col-md-6">
                                        <ul class="enlarge">
                                            <li style="list-style: none;">
                                                <p><strong>Add Supplier and Supplier List</strong></p>
                                                <img src="assets/screenshots1/AddSuppliers.png"> </li>
                                            <li style="list-style: none;">
                                                <p id="SuppliersList"><strong>Supplier List</strong></p>
                                                <img src="assets/screenshots1/Suppliers.png"> </li>
                                            <li style="list-style: none;">
                                                <p id="ViewSuppliers"><strong>View Suppliers</strong></p>
                                                <img src="assets/screenshots1/ViewSuppliers.png"> </li>
                                        </ul>

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
                                     <div class="col-6">
                                         <p style="text-align: justify;; width: 900px;"> Adding a new Category in the system is very easy. You can just click on add category. and put the category name. click submit.
                                    <br>
                                    <br> To view Category go to Category &gt; Manage Categories </p>
                                <ul>
                                    <li><strong>Categories List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all Categories at a glance. </li>
                                </ul>
                                <br>
                                    </div>
                                     <div class="col-6">
                                        <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p><strong>Add Category and Categories List</strong></p>
                                        <img src="assets/screenshots1/AddCategory.png"> </li>
                                    <li style="list-style: none;">
                                        <p id="CategoriesList"><strong>Categories List</strong></p>
                                        <img src="assets/screenshots1/Categories.png"> </li>
                                </ul>
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
                                     <div class="col-6">
                                        <p style="text-align: justify;; width: 900px;"> Adding a new warehouse in the system is very easy. You can just click on add warehouse. and put the warehouse name. click submit.
                                    <br>
                                    <br> To view warehouse go to warehouse &gt; Manage warehouse </p>
                                <ul>

                                    <li><strong>Add New warehouse</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can easily add new warehouse in the system. </li>
                                    <li><strong>warehouse List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all warehouse at a glance. </li>
                                </ul>
                                    </div>
                                     <div class="col-6">
                                        <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p><strong>Add warehouse and warehouse List</strong></p>
                                        <img src="assets/screenshots1/AddWarehouse.png"> </li>
                                    <li style="list-style: none;">
                                        <p id="warehouseList"><strong>Warehouse List</strong></p>
                                        <img src="assets/screenshots1/Warehouse.png"> </li>
                                </ul>
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
                                     <div class="col-6">
                                        <p style="text-align: justify;; width: 900px;"> Adding a new Product in the system is very easy. you can add all related information of Product. The facilities that Product management holds in Easy Inventory are listed below:
                                    <br>
                                    <br> To view Products go to Products &gt; Manage Products </p>
                                <ul>
                                    <li id="addProducts"><strong>Add New Product</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can easily add new Product in the system. The form is elaborate with all possible information you might need to add for a new Product. During addition of new Product you just have to provide the Product, Category, Warehouse, Mfg.Date, Exp.Date, Image, Detail, Quantity, Sell Price, Supplier Price, Model, SKU, Supplier. </li>
                                    <li><strong>Products List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all Products at a glance. </li>
                                    <li><strong>Export all Products</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can Export all Products to CVS, PDF, Excel file. plus you can print is as well. </li>
                                </ul>
                                    </div>
                                     <div class="col-6">
                                         <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p><strong>Add Product and Products List</strong></p>
                                        <img src="assets/screenshots1/AddProduct.png"> </li>
                                    <li style="list-style: none;">
                                        <p id="ProductsList"><strong>Products List</strong></p>
                                        <img src="assets/screenshots1/Products.png"> </li>
                                    <li style="list-style: none;">
                                        <p id="ViewProduct"><strong>View Products</strong></p>
                                        <img src="assets/screenshots1/viewProducts.png"> </li>
                                    <p id="ExportProducts"><strong>Export all Products</strong></p>
                                    <img src="assets/screenshots1/Products.png">
                                </ul>
                                    </div>
                                </div>
                               
                            </section>


                            <section id="ExpireProducts">
                                <div class="row">
                                    <div class="col-12">
                                         <div class="page-header">
                                    <h3>Expire Products</h3>
                                    <hr class="notop">
                                </div>
                                    </div>
                                     <div class="col-6">
                                         <p style="text-align: justify;; width: 900px;"> Easy Inventory system make your life very easy. the system move the products to expire products section automatically when the product expirey date has been passed. The facilities that Expire Products management holds in Easy Inventory are listed below:
                                    <br>
                                    <br> To view Expire Products go to Expire Products &gt; Manage Expire Products </p>
                                <ul>
                                    <li><strong>View Expire Product</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can easily view Expire Products in the system.</li>
                                    <li><strong>Export all Expire Products</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can Export all Expire Products to CVS, PDF, Excel file. plus you can print is as well. </li>
                                </ul>
                                    </div>
                                     <div class="col-6">
                                        <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p id="ExpireProductsList"><strong>Expire Products List</strong></p>
                                        <img src="assets/screenshots1/ExpireProducts.png"> </li>
                                    <li style="list-style: none;">
                                        <p id="ViewExpireProduct"><strong>View Expire Product</strong></p>
                                        <img src="assets/screenshots1/viewExpireProducts.png"> </li>
                                    <p id="ExportExpireProduct"><strong>Export all Expire Products</strong></p>
                                    <img src="assets/screenshots1/ExpireProducts.png">
                                </ul>
                                    </div>
                                </div>
                                
                            </section>

                            <section id="DeadStock">
                                 <div class="row">
                                    <div class="col-12">
                                         <div class="page-header">
                                    <h3>Dead Stock Products</h3>
                                    <hr class="notop">
                                </div>
                                    </div>
                                     <div class="col-6">
                                         <p style="text-align: justify;; width: 900px;"> A term used to describe merchandise that was never sold to or used by consumers before being removed from sale, usually because it was outdated. In Easy Inventory system Moving Products to Dead Stock Products management is very easy. all you will have to click on the Dead Stock button in products management.
                                    <br>
                                    <br> To view Dead Stock Products go to Dead Stock &gt; Dead Stock Products </p>
                                <ul>
                                    <li><strong>View Dead Stock Products</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can easily view Dead Stock Products in the system.</li>
                                </ul>
                                    </div>
                                     <div class="col-6">
                                         <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p id="ExpireProductsList"><strong>Dead Stock Products List</strong></p>
                                        <img src="assets/screenshots1/DeadStockProducts.png"> </li>

                                </ul>
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
                                     <div class="col-6">
                                         <p style="text-align: justify;; width: 900px;"> Adding a new customer in the system is very easy. You can add all related information of a customer. The facilities that customer management holds in Easy Inventory are listed below:
                                    <br>
                                    <br> To view customers go to Customers &gt; Manage Customers </p>
                                <ul>
                                    <li><strong>Add New Customer</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can easily add new customer in the system. The form is elaborate with all possible information you might need to add for a new customer. During addition of new customer you just have to provide the Customer Name, Mobile #, Email, Billing Address. </li>
                                    <li><strong>Customers List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all customers at a glance. </li>
                                    <li><strong>Credit Customers Invoices List List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all credit customers invoices list at a glance. </li>
                                    <li><strong>Paid Customers Invoices List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all paid customers invoices list at a glance. </li>
                                </ul>
                                    </div>
                                     <div class="col-6">
                                          <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p><strong>Add Customers</strong></p>
                                        <img src="assets/screenshots1/AddCustomer.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Customers List</strong></p>
                                        <img src="assets/screenshots1/Customers.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Credit Customers Invoices List</strong></p>
                                        <img src="assets/screenshots1/CreditCustomersInvoices.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Paid Customers Invoices List</strong></p>
                                        <img src="assets/screenshots1/PaidCustomersInvoices.png"> </li>
                                </ul>
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
                                     <div class="col-6">
                                         <p style="text-align: justify;; width: 900px;"> Adding a new Invoices in the system is very easy. The facilities that invoice management holds in Easy Inventory are listed below:
                                    <br>
                                    <br> To view invoice go to Invoices &gt; Manage Invoices </p>
                                <ul>
                                    <li><strong>Add New Invoice</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can easily add new invoice in the system. The form is elaborate with all possible information you might need to add for a new invoice. You can search the customer name by putting the customer first name first alphabet in search box the system will automatically pull out the customer full name. if the customer is new all you will have to click on new customer name button and fill the name, Mobile, Address. </li>
                                    <li><strong>Invoice List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all Invoice at a glance. </li>
                                    <li><strong>Print/View Invoice</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> once you created invoice then go to invoice management click view invoice and print. </li>
                                    <li><strong>Credit Invoices List List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all credit invoices list at a glance. </li>
                                    <li><strong>Paid Invoices List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all paid invoices list at a glance. </li>
                                </ul>
                                    </div>
                                     <div class="col-6">
                                        <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p><strong>Add Invoice</strong></p>
                                        <img src="assets/screenshots1/AddInvoice.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Invoices List</strong></p>
                                        <img src="assets/screenshots1/Invoices.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Print/View Invoice</strong></p>
                                        <img src="assets/screenshots1/Invoicesprintview.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Paid Invoices List</strong></p>
                                        <img src="assets/screenshots1/PaidInvoices.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>UnPaid Invoices List</strong></p>
                                        <img src="assets/screenshots1/UnpaidInvoices.png"> </li>
                                </ul>
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
                                     <div class="col-6">
                                        <p style="text-align: justify;; width: 900px;"> Adding a new Expense Invoices in the system is very easy. The facilities that invoice management holds in Easy Inventory are listed below:
                                    <br>
                                    <br> To view invoice go to Expenses &gt; Manage Expense Invoices </p>
                                <ul>
                                    <li><strong>Add Expense Type</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> before creating expense invoice you must have to add expense type. to make sure what kind of expanse invoice you are going to create. </li>
                                    <li><strong>Add New Expense Invoice</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> once you add expense type to the system then you can easily add new expense invoice in the system. add the Item info , Quantity, Rate, the system will automatially do calculation.</li>
                                    <li><strong>Expense Invoice List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all expense invoice at a glance. </li>
                                    <li><strong>Print/View Expense Invoice</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> once you created expense invoice then go to expense invoice management click view invoice and print. </li>
                                    <li><strong>Credit Expense Invoices List List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all credit expense invoices list at a glance. </li>
                                    <li><strong>Paid Expense Invoices List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all paid expense invoices list at a glance. </li>
                                </ul>
                                    </div>
                                     <div class="col-6">
                                        <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p><strong>Add Expense Type</strong></p>
                                        <img src="assets/screenshots1/AddExpenseType.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Expense Type List</strong></p>
                                        <img src="assets/screenshots1/ExpenseTypes.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Add Expense Invoice</strong></p>
                                        <img src="assets/screenshots1/AddExpense.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Expense Invoices List</strong></p>
                                        <img src="assets/screenshots1/expenseinvoicesList.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Print/View Expense Invoice</strong></p>
                                        <img src="assets/screenshots1/expenseinvoiceInvoices.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Paid Expense Invoices List</strong></p>
                                        <img src="assets/screenshots1/Paid-expanse-Invoices.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>UnPaid Expense Invoices List</strong></p>
                                        <img src="assets/screenshots1/Unpaid-expense-Invoices.png"> </li>
                                </ul>
                                    </div>
                                </div>
                                
                                
                            </section>
                            <!-- Expense Invoices Section End -->

                            <!-- Loan Section Start -->
                            <section id="Loan">
                                 <div class="row">
                                    <div class="col-12">
                                         <div class="page-header">
                                    <h3>Loans</h3>
                                    <hr class="notop">
                                </div>
                                    </div>
                                     <div class="col-6">
                                         <p style="text-align: justify;; width: 900px;"> Loan Management system is very easy and usefull section in Easy Inventory which makes your lif very easy. The facilities that loan management holds in Easy Inventory are listed below:
                                    <br>
                                    <br> To view loan go to loan &gt; Manage loan </p>
                                <ul>
                                    <li><strong>Add Loaner </strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> before creating loan you must have to add loaner Name. </li>
                                    <li><strong>Add Loan</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> once you add loaner Name to the system then you can easily loan contract in the system with all terms and conditions. add the Contract Loan Amount, Loan Contract Date, Loan Contract End-Date, Detail info in the form.</li>
                                    <li><strong>Loans List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all Loans at a glance. </li>
                                    <li><strong>View Loan Detail</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> once you created Loan then go to Loan management click view and to see the contract detail. </li>

                                </ul>
                                    </div>
                                     <div class="col-6">
                                        <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p><strong>Add Loaner</strong></p>
                                        <img src="assets/screenshots1/Addloaner.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Loaners List</strong></p>
                                        <img src="assets/screenshots1/Loaners.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Add Loan</strong></p>
                                        <img src="assets/screenshots1/AddLoan.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Loans List</strong></p>
                                        <img src="assets/screenshots1/LoansList.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>View Loan Detail</strong></p>
                                        <img src="assets/screenshots1/Loansview.png"> </li>
                                </ul>
                                    </div>
                                </div>
                                
                            </section>
                            <!-- Loan Section End -->

                            <!-- Staff Section Start -->
                            <section id="Staff">
                                 <div class="row">
                                    <div class="col-12">
                                        <div class="page-header">
                                    <h3>Staff</h3>
                                    <hr class="notop">
                                </div>
                                    </div>
                                     <div class="col-6">
                                        <p style="text-align: justify;; width: 900px;"> Adding a new Staff in the system is very easy. You can add all related information of a Staff. The facilities that staff management holds in Easy Inventory are listed below:
                                    <br>
                                    <br> To view Staff go to Staff &gt; Manage Staff </p>
                                <ul>
                                    <li><strong>Add New Staff</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can easily add new staff in the system. The form is elaborate with all possible information you might need to add for a new staff. During addition of new staff you just have to provide the User Name, Full Name, Password, User Type. </li>
                                    <li><strong>User Type</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;">There are 3 kind of User type, Super Admin, saleman, Accountant, Super admin can control full system, Salesman can only add and view product invoice only. while Accountant can add,edit,delete product invoices and expense invoices only. </li>
                                    <li><strong>Staff List</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> You can see list of all staff at a glance. </li>
                                </ul>
                                    </div>
                                     <div class="col-6">
                                         <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p><strong>Add Staff</strong></p>
                                        <img src="assets/screenshots1/AddStaff.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Staff List</strong></p>
                                        <img src="assets/screenshots1/Staff.png"> </li>
                                </ul>
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
                                     <div class="col-6">
                                        <p style="text-align: justify;; width: 900px;"> Reports is an important feature every company needs Reports to see there Profit/Loss, Expense and sales. The various features the Reports provides are listed below:
                                    <br>
                                    <br> To view Reports go to Reports </p>
                                <ul>
                                    <li><strong>Profit/Loss Reports</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> To view Profit/Loss Ledger all you will have to click on Profit/Loss Ledger. by default its shows current month reports. </li>
                                    <li><strong>Sales Reports</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> To view Sales Ledger all you will have to click on Sales Ledger. by default its shows current month reports. </li>
                                    <li><strong>Expense Reports</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> To view Expense Ledger all you will have to click on Expense Ledger. by default its shows current month reports. </li>
                                    <li><strong>Start &amp; End Date Reports</strong></li>
                                    <li style="list-style: none; text-align: justify; width: 500px;"> Set start and end date for any reports and click GET button - you ll easily get reports from start and end dates. </li>
                                </ul>
                                    </div>
                                     <div class="col-6">
                                         <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p><strong>Profit/Loss Reports</strong></p>
                                        <img src="assets/screenshots1/ProfitLossLedger.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Sales Reports</strong></p>
                                        <img src="assets/screenshots1/SalesLedger.png"> </li>
                                    <li style="list-style: none;">
                                        <p><strong>Expense Reports</strong></p>
                                        <img src="assets/screenshots1/ExpenseLedger.png"> </li>
                                </ul>
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
                                     <div class="col-6">
                                         <p style="text-align: justify;; width: 900px;"> Adding company info in the system is very easy. You have to add all related information of company in form.
                                    <br>
                                    <br> To view company info go to Setting &gt; Company-info </p>
                                <br> you can set your currency sign, go to Setting &gt; Company-info
                                <p></p>
                                    </div>
                                     <div class="col-6">
                                         <ul class="enlarge">
                                    <li style="list-style: none;">
                                        <p><strong>Company-info</strong></p>
                                        <img src="assets/screenshots1/Company-info.png"> </li>
                                </ul>
                                    </div>
                                </div>
                            </section>
                            <!-- Company Setting Section End -->

                            <!-- Support Section Start -->
                            <section id="customer_support">
                                 <div class="row">
                                    <div class="col-12">
                                         <div class="page-header">
                                    <h3>Customer Support</h3>
                                    <hr class="notop">
                                </div>
                                    </div>
                                     <div class="col-6">
                                        <p style="text-align: justify;; width: 900px;"><strong>All the support related issue should be emailed directly to ismail32cse@gmail.com Please be informed that CodeCanyon comments page isn't for support.</strong></p>
                                   
                                    </div>
                                     <div class="col-6">
                                         <br>
                                    <p><br> Support is available from 9:00 AM - 6:00 PM (GMT+5), Monday - Saturday.
                                    <br>
                                    <br> If you are having any difficulty in understanding the product or you have any question, We encourage you to contact us. Email us at ismail32cse@gmail.com for fast response. We will be glad to help you. </p>
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
                                         <p style="text-align: justify;; width: 900px;"> <strong>Easy Inventory can be customize depending on your need. Our charges are affordable.</strong>
                                    <br>
                                    <br> We work and charge for customization as $10/hour.
                                    <br>
                                    <br> A fixed price quote can be generated if you provide all the details of customization. </p>
                                    </div>
                                </div>
                               
                               
                            </section>
                            <!-- Customization Section End -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>

@endsection