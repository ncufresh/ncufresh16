<?php

// 註冊,登入頁
Route::auth();

// 旭
//************************************************************
// 首頁
Route::get('/', 'HomeController@index');
//************************************************************

// 校園導覽
//************************************************************
Route::get('/campus','CampusController@index');
Route::get('/campus/guide','CampusController@guide');
Route::get('/campus/newData','CampusController@newData');
Route::get('/campus/create','CampusController@createData');
Route::post('/campus/newData/Building','CampusController@createBuilding');
Route::get('/campus/newData/Building/{bid?}','CampusController@getBuilding');
Route::put('/campus/newData/Building/{bid?}','CampusController@putBuilding');
Route::delete('/campus/newData/Building/{bid?}', 'CampusController@dropBuilding');
//************************************************************

// 系所社團
//************************************************************
Route::resource('group', 'GroupController');

Route::get('groups', function () {
    return view('groups.index');
});
//************************************************************

// 小遊戲
//************************************************************
Route::get('/smallgame', 'HomeController@index');
//************************************************************
