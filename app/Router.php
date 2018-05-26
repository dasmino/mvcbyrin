<?php 

include 'App.php';

Route::get('/home/', 'CoreController@test');
Route::get('/product/{id}', 'ProductController@index');
Route::get('/test/', 'ProductController@index');
// Route::post('/test/', 'CoreController@test');
