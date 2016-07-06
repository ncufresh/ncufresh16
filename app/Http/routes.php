<?php

// 註冊,登入頁
Route::auth();

// 旭
//************************************************************
// 首頁
Route::get('/', 'HomeController@index');
Route::get('/ann', 'AnnouncementController@index');
Route::post('/ann', 'AnnouncementController@store');
Route::get('/ann/{ann}', 'AnnouncementController@show');
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
// Route::resource('/groups/departments', 'DepartmentController');
// Route::resource('/groups/clubs', 'ClubController');
#首頁
Route::get('groups', function () {
    return view('groups.index');
});
#社團
Route::get('/groups/clubs', 'ClubController@index');
Route::post('/groups/clubs', 'ClubController@store');
Route::get('/groups/clubs/create', 'ClubController@create');
Route::get('/groups/clubs/{clubs_kind}', 'ClubController@show');
#系所
Route::get('/groups/departments', 'DepartmentController@index');
Route::post('/groups/departments', 'DepartmentController@store');
Route::get('/groups/departments/create', 'DepartmentController@create');
// #各社團
// Route::get('/groups/clubs/{clubs_id}/create', 'AllclubController@create');
// Route::get('/groups/clubs/{clubs_id}', 'AllclubController@index');
// Route::post('/groups/clubs/{clubs_id}', 'AllclubController@store');

#各系所
// Route::get('/groups/clubs', 'AlldepartmentController@index');
// Route::post('/groups/clubs', 'AlldepartmentController@store');
// Route::get('/groups/clubs/create', 'AlldepartmentController@create');

//************************************************************

// 小遊戲
//************************************************************
Route::get('smallgame', function(){
	return view('smallgame');
});
Route::get('/smallgame_try',function(){
	$try=App\Question_collection::find(1);
	echo $try -> question;

});
Route::get('customer',function(){  //為什麼資料表的名稱被限制為cutomers??
	$customer = App\Customer::find(1); //find("這裡面是裝primaryKey")， _
	//假如model檔裡沒有initialize，php預設primaryKey  的attribute會被稱為"id"
	echo '<pre>';
	print_r($customer);
});

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
