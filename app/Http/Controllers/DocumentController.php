<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Document;

class DocumentController extends Controller
{
    // mixed
    public function index(){
        // 先比對是否為大學部的資料、再分別對應到三個主要類別
        for($i=0;$i<3;$i++){
            $mainUnders[$i] = Document::where('is_graduate',false)
                                      ->where('position_of_main',''.($i+1))
                                      ->get();
        }  

        // 先比對是否為研究所的資料、再分別對應到三個主要類別
        for($i=0;$i<3;$i++){
            $mainGraduates[$i] = Document::where('is_graduate',true)
                                         ->where('position_of_main',''.($i+1))
                                         ->get();
        }

        for($i=0;$i<=3;$i++){
            $count[$i] = 0;
        }
        
        // 回傳網頁位置與資料
        return view('documents.index',
            [
                'mainUnders' => $mainUnders,
                'mainGraduates' => $mainGraduates,
                'count' => $count
            ]);
    }
	/* 大學部 */
    public function underIndex(){
    	// 先比對是否為大學部的資料、再分別對應到三個主要類別
    	for($i=0;$i<3;$i++){
    		$mainUnders[$i] = Document::where('is_graduate',false)
    								  ->where('position_of_main',''.($i+1))
    								  ->get();
    	}
        $count[0] = $count[1] = 0;
    	// 回傳大學部的網頁位置與三個主類別中的子類別
		return view('documents.under',
            [
                'mainUnders' => $mainUnders,
                'count' => $count
            ]);
    }

    public function underStore(Request $request){
    	// 新增一筆資料
    	$document = new Document; 
    	$document->title = $request->title;
    	$document->content = $request->content;
    	$document->is_graduate = false;
    	$document->position_of_main = $request->position_of_main;
    	// 儲存後返回
		$document->save();
		return redirect('/doc/under');
    }

    public function underDestroy(Request $request, Document $under) {
		$under->delete();
		return redirect('/doc/under');
	}

	public function underEdit(Document $under){
		return view('documents.underedit',['under'=>$under]);
	}

	public function underUpdate(Request $request, Document $under){
		$under->update([
			'title' => $request->title,
			'content' => $request->content,
			'position_of_main' => $request->position_of_main
		]);
		return redirect('/doc/under');
	}

    /* 研究所 */
    public function graduateIndex(){
    	// 先比對是否為研究所的資料、再分別對應到三個主要類別
    	for($i=0;$i<3;$i++){
    		$mainGraduates[$i] = Document::where('is_graduate',true)
    									 ->where('position_of_main',''.($i+1))
    									 ->get();
    	}
        $count[0] = $count[1] = 0;
    	// 回傳研究所的網頁位置與三個主類別中的子類別
		return view('documents.graduate',
            [
                'mainGraduates' => $mainGraduates,
                'count' => $count
            ]);
    }

    public function graduateStore(Request $request){
    	// 新增一筆資料
    	$document = new Document;
    	// $->欄位 = $request->name
    	$document->title = $request->title;
    	$document->content = $request->content;
    	$document->is_graduate = true;
    	$document->position_of_main = $request->position_of_main;
    	// 儲存後返回
		$document->save();
		return redirect('/doc/graduate');
    }

    public function graduateDestroy(Request $request, Document $graduate) {
		$graduate->delete();
		return redirect('/doc/graduate');
	}

	public function graduateEdit(Document $graduate){
		return view('documents.graduateedit',['graduate'=>$graduate]);
	}

	public function graduateUpdate(Request $request, Document $graduate){
		$graduate->update([
			'title' => $request->title,
			'content' => $request->content,
			'position_of_main' => $request->position_of_main
		]);
		return redirect('/doc/graduate');
	}
}
