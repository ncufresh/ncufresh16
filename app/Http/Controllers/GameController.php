<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Question_collection;//model


class GameController extends Controller
{
    public function index(){
    	return view('smallgame');
    }
    public function get_question($id){
    	$question=Question_collection::find($id);
    	return response()->json($question); //為何跟Rounter的寫法需要不一樣?
    }
}
