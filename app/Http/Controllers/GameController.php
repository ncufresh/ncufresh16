<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;
use App\Http\Requests;
use App\Question_collection;//model
use App\Smallgame_score;//model
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GameController extends Controller
{
    public function index(){
    	return view('smallgame');
    }
    public function get_question($id){
    	$question=Question_collection::all();
    	return response()->json($question); //為何跟Rounter的寫法需要不一樣?
    }
    
    public function post_score(Request $request){
    	$scores = Smallgame_score::create($request->all());
        return response()->json($scores);
        
    	//return response()->json($score);//??
    }
}
