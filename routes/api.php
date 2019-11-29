<?php

use Illuminate\Http\Request;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::apiResource('suppliers','Api\SupllierController');
Route::get('search/suppliers/{field}/{query}','Api\SupllierController@search');

Route::apiResource('categories','Api\CategoryController');
Route::get('search/categories/{field}/{query}','Api\CategoryController@search');

Route::apiResource('warehouses','Api\WarehouseController');
Route::get('search/warehouses/{field}/{query}','Api\WarehouseController@search');

Route::apiResource('supllier-invoice','Api\SupllierInvoiceController');
Route::get('search/supllier-invoice/{field}/{query}','Api\SupllierInvoiceController@search');

Route::apiResource('products','Api\ProductController');
Route::get('search/products/{field}/{query}','Api\ProductController@search');
