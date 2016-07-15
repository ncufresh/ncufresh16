<?php


use Illuminate\Http\Response;
use App\Http\Requests;
use App\Question_collection;//model
use App\Record_score;//model
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

// 註冊,登入頁
Route::auth();

// 旭
//************************************************************
// 首頁
Route::get('/', 'HomeController@index');
Route::get('/ann', 'AnnouncementController@index');
Route::post('/ann', 'AnnouncementController@store');
Route::get('/ann/{ann}', 'AnnouncementController@show');
Route::group( ['middleware' => 'admin'], function () {
    Route::get('/test', function () { return '嗨!我是管理員'; });
});
//************************************************************

// 校園導覽
//************************************************************
Route::get('/campus','CampusController@index');
Route::get('/campus/guide','CampusController@guide');
Route::get('/campus/newData','CampusController@newData');
//oldfunction
Route::get('/campus/create','CampusController@createData');
//新增建築物
Route::post('/campus/newData/Building','CampusController@createBuilding');
//編輯建築物 查詢建築資料
Route::get('/campus/newData/Building/{bid?}','CampusController@getBuilding');
//編輯建築物 更新建築物資料
Route::put('/campus/newData/Building/{bid?}','CampusController@putBuilding');
//刪除資料
Route::delete('/campus/newData/Building/{bid?}', 'CampusController@dropBuilding');
//編輯圖片 查詢圖片資料
Route::get('/campus/newData/Building/img/{imgid?}', 'CampusComtroller@getBuildingImg');
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
Route::get('smallgame','GameController@index');
Route::get('/smallgame_get/{id}','GameController@get_question');
//Route::post('/smallgame_post','GameController@post_score');
Route::post('/smallgame_post',function(Request $request){
	$encrypter = app('Illuminate\Encryption\Encrypter');
	$encrypted_token = $encrypter->encrypt(csrf_token());

    $scores = Record_score::create([
    	'name'=>$request->name,
    	'score'=>$request->score
    	]);
    return response()->json($scores);
});

//************************************************************

// 新生Q&A
//************************************************************
//Route::resource('/Q&A', 'QandAController');
Route::post('/Q&A', 'QandAController@store');
Route::get('/Q&A/create', 'QandAController@create');
Route::get('/Q&A/admin/', 'QandAController@indexAdmin');
Route::get('/Q&A/personal', 'QandAController@indexPersonal');
Route::get('/Q&A/{classify}', 'QandAController@index');
Route::get('/Q&A/content/{Q}', 'QandAController@show');
Route::get('/Q&A/admin/{Q}', 'QandAController@edit');
Route::patch('/Q&A/content/{Q}', 'QandAController@update');
Route::delete('/Q&A/{Q}', 'QandAController@destroy');
//************************************************************


// 個人專區
//************************************************************
Route::resource('/personal', 'PersonalController');
//************************************************************




// 影音專區
//************************************************************
Route::get('/videos','videocontroller@index');
//Route::get('/video/')
//************************************************************

// 中大生活
//************************************************************
Route::get('/life','LifeController@getTitle');
Route::get('/life/{topic}/{content}','LifeController@getContent');

//************************************************************
