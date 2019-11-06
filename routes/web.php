<?php


Route::get('/', 'Frontend\PagesController@index')->name('index');

Auth::routes();

Route::group(['as'=>'admin.', 'prefix'=>'/admin','namespace'=>'Admin'],function(){
	Route::get('/', 'PagesController@index')->name('dashboard');
});



