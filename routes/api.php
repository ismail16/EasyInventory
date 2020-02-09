<?php

use Illuminate\Http\Request;


Route::apiResource('suppliers','Api\SupllierController');
Route::get('search/suppliers/{field}/{query}','Api\SupllierController@search');
Route::get('allSupplier','Api\SupllierController@allSupplier');

Route::apiResource('categories','Api\CategoryController');
Route::get('search/categories/{field}/{query}','Api\CategoryController@search');
Route::get('allCategory','Api\CategoryController@allCategory');

Route::apiResource('warehouses','Api\WarehouseController');
Route::get('search/warehouses/{field}/{query}','Api\WarehouseController@search');
Route::get('allWarehouse','Api\WarehouseController@allWarehouse');

Route::apiResource('loans','Api\LoanController');
Route::get('search/loans/{field}/{query}','Api\LoanController@search');
Route::get('allLoan','Api\LoanController@allLoan');

Route::apiResource('staffs','Api\StaffController');
Route::get('search/staffs/{field}/{query}','Api\StaffController@search');
Route::get('allStaff','Api\StaffController@allStaff');

Route::apiResource('supllier-invoice','Api\SupllierInvoiceController');
Route::get('search/supllier-invoice/{field}/{query}','Api\SupllierInvoiceController@search');
Route::get('allSupplierInvoice','Api\SupllierInvoiceController@allSupplierInvoice');

Route::apiResource('invoices','Api\InvoiceController');
Route::get('getThisMonthInvoices/{month}','Api\InvoiceController@getThisMonthInvoices');
Route::get('getThisYearInvoices/{year}','Api\InvoiceController@getThisYearInvoices');
Route::get('search/invoices/{field}/{query}','Api\InvoiceController@search');
Route::get('allInvoice','Api\InvoiceController@allInvoice');

Route::apiResource('products','Api\ProductController');
Route::get('search/products/{field}/{query}','Api\ProductController@search');
Route::get('allProduct','Api\ProductController@allProduct');

Route::apiResource('customers','Api\CustomerController');
Route::get('search/customers/{field}/{query}','Api\CustomerController@search');
Route::get('allCustomer','Api\CustomerController@allCustomer');

Route::apiResource('expenses','Api\ExpenseController');
Route::get('getThisMonthExpenses/{month}','Api\ExpenseController@getThisMonthExpenses');
Route::get('search/expenses/{field}/{query}','Api\ExpenseController@search');
Route::get('allExpense','Api\ExpenseController@allExpense');


Route::apiResource('setting','Api\SettingController');