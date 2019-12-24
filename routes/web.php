<?php


Route::get('/', 'Frontend\PagesController@index')->name('index');

Auth::routes();

//=================== Admin Route ==========================
Route::group(['as'=>'admin.', 'prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['auth','admin']], function(){
	Route::get('/dashboard', 'PagesController@index')->name('dashboard');
	Route::get('/documentation', 'PagesController@documentation')->name('documentation');
});


Route::group(['as'=>'author.', 'prefix'=>'author','namespace'=>'Author', 'middleware'=>['auth','author']], function(){
    Route::get('/dashboard', 'PagesController@index')->name('dashboard');
});


// Route::get('{path}',"HomeController@index")->where('path','([-a-z0-9_\s]+)');
Route::any('{query}','HomeController@index')->where('query', '.*');