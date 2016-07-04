<?php

Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::resource('group', 'GroupController');

Route::get('groups', function () {
    return view('groups.index');
});
