<?php

Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');
Route::get('/campus','CampusController@index');
Route::get('/campus/guide','CampusController@guide');
Route::get('/campus/newData','CampusController@newData');
Route::get('/campus/create','CampusController@createData');

