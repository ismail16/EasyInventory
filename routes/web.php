<?php


Route::get('/', 'Frontend\PagesController@index')->name('index');

Auth::routes();

Route::group(['as'=>'admin.', 'prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['auth','admin']], function(){
	Route::get('/dashboard', 'PagesController@index')->name('dashboard');
});


Route::group(['as'=>'author.', 'prefix'=>'author','namespace'=>'Author', 'middleware'=>['auth','author']], function(){
    Route::get('/dashboard', 'PagesController@index')->name('dashboard');
});
