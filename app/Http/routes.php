<?php


use Illuminate\Http\Response;
use App\Http\Requests;
use App\Question_collection;//model
use App\Record_score;//model
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

// 後台
//************************************************************
Route::group( ['middleware' => 'admin'], function () {
    Route::get('/test', function () { return '管理員才可以進的路由都放這 包含新增之類的 不用急著丟'; });
    /*****************Q&A******************/
    Route::get('/Q&A/admin/', 'QandAController@indexAdmin');
    Route::get('/Q&A/admin/{Q}', 'QandAController@edit');
    Route::patch('/Q&A/content/{Q}', 'QandAController@update');
});
//************************************************************

// 註冊,登入頁
//************************************************************
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');
//************************************************************

// 首頁
//************************************************************
Route::get('/', 'HomeController@index');
Route::get('/admin', function(){
    return view('admin');
});
//************************************************************

// 公告
//************************************************************
Route::get('/ann', 'AnnouncementController@index');
Route::post('/ann', 'AnnouncementController@store');
Route::get('/ann/{ann}', 'AnnouncementController@show');
//************************************************************

// 新生必讀
//************************************************************
Route::group(['prefix' => 'doc'], function () {
    Route::get('/', 'DocumentController@index');
    # 大學部
    Route::group(['prefix' => 'under'], function () {
    	Route::get('/', 'DocumentController@underIndex');
		Route::post('/', 'DocumentController@underStore');
		Route::delete('/{under}', 'DocumentController@underDestroy');
		Route::get('/{under}/edit','DocumentController@underEdit');
		Route::patch('/{under}', 'DocumentController@underUpdate');
    });
	Route::get('/under', 'DocumentController@underIndex');
	Route::post('/under', 'DocumentController@underStore');
	Route::delete('/under/{under}', 'DocumentController@underDestroy');
	Route::get('/under/{under}/edit','DocumentController@underEdit');
	Route::patch('/under/{under}', 'DocumentController@underUpdate');
	# 研究所
	Route::group(['prefix' => 'graduate'], function () {
		Route::get('/', 'DocumentController@graduateIndex');
		Route::post('/', 'DocumentController@graduateStore');
		Route::delete('/{graduate}', 'DocumentController@graduateDestroy');
		Route::get('/{graduate}/edit','DocumentController@graduateEdit');
		Route::patch('/{graduate}', 'DocumentController@graduateUpdate');
    });
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
Route::get('smallgame','GameController@index');//引導到遊戲頁面
Route::get('leaderboard','GameController@leaderboard');//引導到排行榜頁面
Route::get('/smallgame_get/{id}','GameController@get_question');//取得問題
Route::get('/getScores','GameController@getScores');//取得分數
Route::post('/smallgame_post','GameController@post_score');//post 分數
Route::get('/add_question','GameController@addQuestion');//引導到新增、編輯、刪除問題的後台
Route::post('/add_question/add','GameController@add');//新增問題
Route::put('/add_question/add/{question_id?}','GameController@putOneQuestion');//編輯問題
Route::delete('/add_question/delete/{question_id?}','GameController@deleteOneQuestion');//刪除問題
Route::get('/getOneQuestion/{question_id?}','GameController@getOneQuestion');//取得問題



//************************************************************

// 新生Q&A
//************************************************************
//Route::resource('/Q&A', 'QandAController');
Route::post('/Q&A', 'QandAController@store');
Route::get('/Q&A/create', 'QandAController@create');
Route::get('/Q&A/personal', 'QandAController@indexPersonal');
Route::get('/Q&A/{classify}', 'QandAController@index');
Route::get('/Q&A/content/{Q}', 'QandAController@show');
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
