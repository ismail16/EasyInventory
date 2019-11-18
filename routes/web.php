<?php


Route::get('/', 'Frontend\PagesController@index')->name('index');

// Route::any('/', function () {
//     return redirect()->route('profile');
// });

Auth::routes();

//=================== Admin Route ==========================
Route::group(['as'=>'admin.', 'prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['auth','admin']], function(){
	Route::get('/dashboard', 'PagesController@index')->name('dashboard');

	// Route::any('/', function () {
	//     return redirect()->route('dashboard');
	// });
	// Route::get('/supplier', 'PagesController@supplier')->name('supplier');
	// Route::get('/category', 'PagesController@category')->name('category');
	// Route::get('/warehouse', 'PagesController@warehouse')->name('warehouse');
	// Route::get('/supplier-invoice', 'PagesController@supplier_invoice')->name('supplier_invoice');
	// Route::get('/supplier-invoice-create', 'PagesController@supplier_invoice_create')->name('supplier_invoice_create');
	// Route::post('/supplier-invoice-store', 'PagesController@supplier_invoice_store')->name('supplier_invoice_store');
	// Route::get('/supplier-invoice-edit', 'PagesController@supplier_invoice_edit')->name('supplier_invoice_edit');


	
	 // Route::resource('supplier', 'SupplierController');
	// Route::get('getSuppliers', 'SupplierController@getSuppliers')->name('getSuppliers');
	// Route::resource('category', 'CategoryController');
	// Route::resource('supplier-invoice', 'SupplierInvoiceController');
});


Route::group(['as'=>'author.', 'prefix'=>'author','namespace'=>'Author', 'middleware'=>['auth','author']], function(){
    Route::get('/dashboard', 'PagesController@index')->name('dashboard');
});


Route::group(['as'=>'admin.', 'prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['auth','admin']], function(){
	Route::get('/dashboard', 'PagesController@index')->name('dashboard');

	// Route::any('/', function () {
	//     return redirect()->route('dashboard');
	// });
	// Route::get('/supplier', 'PagesController@supplier')->name('supplier');
	// Route::get('/category', 'PagesController@category')->name('category');
	// Route::get('/warehouse', 'PagesController@warehouse')->name('warehouse');
	// Route::get('/supplier-invoice', 'PagesController@supplier_invoice')->name('supplier_invoice');
	// Route::get('/supplier-invoice-create', 'PagesController@supplier_invoice_create')->name('supplier_invoice_create');
	// Route::post('/supplier-invoice-store', 'PagesController@supplier_invoice_store')->name('supplier_invoice_store');
	// Route::get('/supplier-invoice-edit', 'PagesController@supplier_invoice_edit')->name('supplier_invoice_edit');


	
	 // Route::resource('supplier', 'SupplierController');
	// Route::get('getSuppliers', 'SupplierController@getSuppliers')->name('getSuppliers');
	// Route::resource('category', 'CategoryController');
	// Route::resource('supplier-invoice', 'SupplierInvoiceController');
});

// Route::group([
//     'middleware' => ['auth','admin'],
// ], function() {
// 	Route::get('{path}','Admin\PagesController@index')->where( 'path', '([A-z\d-/_.]+)?' );
// });

Route::get('{path}','Admin\PagesController@dassss')->where( 'path', '([A-z\d-/_.]+)?' );