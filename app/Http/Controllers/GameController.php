<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;
use App\Http\Requests;
use App\Question_collection;//model
use App\Smallgame_score;//model
use App\Record_score;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Auth;

class GameController extends Controller
{
    public function index(){
         $personal_scores=Record_score::all();
         $total_scores=Record_score::all();
         $username=Auth::user()->name;
         $personal_scores = DB::table('record_scores')->where('name', $username)->orderBy('score','DESC')->get();//拿到名字為admin的分數(原始個人分數)
         ////////////////bug
         $total_scores=DB::table('record_scores')->orderBy('score','DESC')->get();//拿到原始全部的分數
         /*
         */
    	return view('smallgame.smallgame',array('personal_scores'=>$personal_scores,'total_scores'=>$total_scores));
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
        $scores=Record_score::all();
        return response()->json($scores); //為何跟Rounter的寫法需要不一樣?
    }


    public function addQuestion(){//開啟新增問題頁面
        $questions=Question_collection::all();

        return view('smallgame.add_question')->with('questions',$questions);;
    }

    public function add(Request $request){
        $encrypter = app('Illuminate\Encryption\Encrypter');
        $encrypted_token = $encrypter->encrypt(csrf_token());
        $scores = Question_collection::create([
            'question'=>$request->question,
            'selection_1'=>$request->selection_1,
            'selection_2'=>$request->selection_2,
            'answer'=>$request->answer
            ]);
        return response()->json($scores);

    }

    public function getOneQuestion($question_id){
        $aQuestion=Question_collection::find($question_id);

        return response()->json($aQuestion);
    }

    public function putOneQuestion(Request $request,$question_id){
        $questions = Question_collection::find($question_id);//create a new model instance 

        $questions->question = $request->question;
        $questions->selection_1 = $request->selection_1;
        $questions->selection_2 = $request->selection_2;
        $questions->answer = $request->answer;
        

        $questions->save();//call the save method  , the method can input data into the database

        return response()->json($questions);
    }
    public function deleteOneQuestion($question_id){
        $question = Question_collection::destroy($question_id);
        return response()->json($question);
    }   

}
