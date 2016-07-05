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
//************************************************************

// 系所社團
//************************************************************
//Route::resource('group', 'GroupController');

Route::get('groups', function () {
    return view('groups.index');
});
//************************************************************

// 小遊戲
//************************************************************
Route::get('/smallgame', 'HomeController@index');
//************************************************************

// 新生Q&A
//************************************************************
//Route::resource('/Q&A', 'QandAController');
Route::post('/Q&A', 'QandAController@store');
Route::get('/Q&A/create', 'QandAController@create');
Route::get('/Q&A/{classify}', 'QandAController@index');
Route::get('/Q&A/content/{id}', 'QandAController@show');
Route::delete('/Q&A/{dd}', 'QandAController@destroy');

//************************************************************