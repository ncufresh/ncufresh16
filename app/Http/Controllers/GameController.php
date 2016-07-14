<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;
use App\Http\Requests;
use App\Question_collection;//model
use App\Smallgame_score;//model
use App\Record_score;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GameController extends Controller
{
    public function index(){
    	return view('smallgame.smallgame');
    }
    public function leaderboard(){
        return view('smallgame.Leaderboard');
    }

    public function get_question($id){
    	$question=Question_collection::all();
    	return response()->json($question); //為何跟Rounter的寫法需要不一樣?
    }
    
    public function post_score(Request $request){
    	$encrypter = app('Illuminate\Encryption\Encrypter');
        $encrypted_token = $encrypter->encrypt(csrf_token());
        $scores = Record_score::create([
            'name'=>$request->name,
            'score'=>$request->score
            ]);
        return response()->json($scores);
    }
    public function getScores(){//取得分數
        $scores=Question_collection::all();
        return response()->json($question); //為何跟Rounter的寫法需要不一樣?
    }
}
