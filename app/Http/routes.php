<?php

// 註冊,登入頁
Route::auth();

// 旭
//************************************************************
// 首頁
Route::get('/', 'HomeController@index');
//************************************************************


Route::get('/campus','CampusController@index');
Route::get('/campus/guide','CampusController@guide');
Route::get('/campus/newData','CampusController@newData');
Route::get('/campus/create','CampusController@createData');
