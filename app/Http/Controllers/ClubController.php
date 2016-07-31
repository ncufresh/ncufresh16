<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// use Request;

use App\Club;



class ClubController extends Controller
{
    public function index(){
		$clubs = Club::all();
		return view('clubs.index', [
             'clubs' => $clubs,
        ]); 
	}

	public function create()
    {
        //   	$test = array();

        //   	for($i=1 ; $i<10 ;$i++){
        //   		$test[]=$i;
        //   	}
        //   	//字串
        //   	$testt = json_encode($test);
        //   	//陣列
        //   	$testtt = json_decode($testt);
    	// return $testtt[0];

       return view('clubs.create');
    }

	
	public function store(Request $request)
	{
		
    	
    	//上傳照片
    	// $clubfile = $request->file('clubs_file');
    	// $upload = public_path().'/clubs_file/';
    	// $filename = $clubfile->getClientOriginalName();
    	// $success = $clubfile->move($upload,$filename);
    	// if($success){

    	// 	$club = new Club;
    	// 	$club->clubs_kind = $request->clubs_kind;
    	// 	$club->clubs_intro = $request->clubs_intro;
    	// 	$club->clubs_file = $filename;
    	// 	$club->save();
    	// 	return redirect('/groups/clubs');

    	// }

    	$club = new Club;
    	$club->clubs_kind = $request->clubs_kind;
    	$club->clubs_intro = $request->clubs_intro;
    	$club->clubs_file = $request->clubs_file;
    	$club->clubs_summary = $request->clubs_summary;
    	$club->clubs_activity = $request->clubs_activity;
    	$club->clubs_join = $request->clubs_join;
    	$club->clubs_photo = json_encode($request->clubs_photo);//字串
    	$club->save();
    	return redirect('/groups/clubs/'.$club->clubs_kind);

    	
    	
	}

	public function destroy($id)
	{
    	$clubs = Club::find($id);
        $clubs->delete();
        return redirect('/groups/clubs');
        
	}

	public function show($id)
	{
		$clubs = Club::where('clubs_kind',$id)->get();
		return view('clubs.show', [
	        'clubs' => $clubs
	    ]);
	}
	public function edit($id)
	{
		$clubs = Club::find($id);
		return view('clubs.edit',compact('clubs'));	    
	} 

	public function update(Request $request, $id)
	{
	    $clubs = Club::find($id);
        // 沒辦法用all() 因為clubs_photo要先json_encode
        // $input = Request::all();
        // $clubs->fill($input)->save();
        // $clubs = update($request->all());
        // $clubs = $request->all();
		$clubs->clubs_intro = $request->clubs_intro;
    	$clubs->clubs_file = $request->clubs_file;
    	$clubs->clubs_summary = $request->clubs_summary;
    	$clubs->clubs_activity = $request->clubs_activity;
    	$clubs->clubs_join = $request->clubs_join;
    	$clubs->clubs_photo = json_encode($request->clubs_photo);
    	$clubs->save();
        return redirect('/groups/clubs/'.$clubs->clubs_kind);
	}

	// public function upload()
	// {
	// 	//取得上傳檔案的資料
	// 	$file = Input::file('clubs_file');
	// 	//取得檔案副檔名
 //    	$extension = $file->getClientOriginalExtension();
 //    	//避免檔名相同，產生新檔名
 //    	$file_name = strval(time()).str_random(5).'.'.$extension;

 //    	$destination_path = public_path().'/clubs_file/';

 //    	if (Input::hasFile('clubs_file')) 
 //    	{
 //        	$upload_success = $file->move($destination_path, $file_name);
 //        	echo "img upload success!";
 //    	}
 //    	else
 //    	{
 //        	echo "img upload failed!";
 //    	}

    	
	// }

	// public function uploadFile()
	// {
	// 	return view('clubs.file');
	// }

	// public function uploadToFrom()
	// {
	// 	if (Request::hasFile('file')) {
	//         //取得原來檔案名稱與副檔名
	//         $rename = $this->file_rename(Request::file('file')->getClientOriginalName(),true);
	//         //把檔案移動要的路徑,並且把原來名稱取回去
	//         Request::file('file')->move(public_path('temp'), $rename);
 //       	}else {
 //        	return 'not file';
 //       	}
	// }

	// public function file_rename($file_name,$get_title = false)//取出副檔名或者取出完整檔名
 //   	{
 //       //計算一下有幾個.
 //       $count = substr_count($file_name, '.');
 //       //以.來切割字串成為array
 //       $name = explode('.', $file_name);
 //       //判斷是否傳回檔名否則回傳副檔名
 //       if($get_title){
 //           return $name[0] . '.' . $name[$count];
 //       }else{
 //           return '.'.$name[$count];
 //       }
 //   	}
	

	
}
