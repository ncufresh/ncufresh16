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
Route::resource('group', 'GroupController');

Route::get('groups', function () {
    return view('groups.index');
});
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
