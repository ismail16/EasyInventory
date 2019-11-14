<?php


Route::get('/', 'Frontend\PagesController@index')->name('index');

Auth::routes();

//=================== Admin Route ==========================
Route::group(['as'=>'admin.', 'prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['auth','admin']], function(){
	Route::get('/dashboard', 'PagesController@index')->name('dashboard');
	 Route::resource('supplier', 'SupplierController');
	// Route::get('getSuppliers', 'SupplierController@getSuppliers')->name('getSuppliers');
	Route::resource('category', 'CategoryController');
	Route::resource('supplier-invoice', 'SupplierInvoiceController');
});


Route::group(['as'=>'author.', 'prefix'=>'author','namespace'=>'Author', 'middleware'=>['auth','author']], function(){
    Route::get('/dashboard', 'PagesController@index')->name('dashboard');
});
