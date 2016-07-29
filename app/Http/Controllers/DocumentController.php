<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Document;

class DocumentController extends Controller
{
    // 主頁面
    public function index(){
        // 先比對是否為大學部的資料、再分別對應到三個主要類別
        for($i=0;$i<3;$i++){
            $mainUnders[$i] = Document::where('position_of_screen',1) // 1 代表大學部
                                      ->where('position_of_main',''.($i+1))
                                      ->get();
        }  

        // 先比對是否為研究所的資料、再分別對應到兩個主要類別
        for($i=0;$i<2;$i++){
            $mainGraduates[$i] = Document::where('position_of_screen',2) // 2 代表研究所
                                         ->where('position_of_main',''.($i+1))
                                         ->get();
        }

        // 先比對是否為共同的資料、再分別對應到三個主要類別
        for($i=0;$i<3;$i++){
            $mainMixs[$i] = Document::where('position_of_screen',3) // 3 代表共同項目
                                         ->where('position_of_main',''.($i+1))
                                         ->get();
        }
        
        // 回傳網頁位置與資料
        return view('documents.index',
            [
                'mainUnders' => $mainUnders,
                'mainGraduates' => $mainGraduates,
                'mainMixs' => $mainMixs
            ]);
    }

    // 大學部
    public function underStore(Request $request){
    	// 新增一筆資料
    	$document = new Document; 
    	$document->title = $request->title;
    	$document->content = $request->content;
    	$document->position_of_screen = 1;
    	$document->position_of_main = $request->position_of_main;
    	// 儲存後返回
		$document->save();
		return redirect('/doc');
    }

    public function underDestroy(Request $request, Document $under) {
		$under->delete();
		return redirect('/doc');
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
		return redirect('/doc');
	}

    // 研究所
    public function graduateStore(Request $request){
    	// 新增一筆資料
    	$document = new Document;
    	// $->欄位 = $request->name
    	$document->title = $request->title;
    	$document->content = $request->content;
    	$document->position_of_screen = 2;
    	$document->position_of_main = $request->position_of_main;
    	// 儲存後返回
		$document->save();
		return redirect('/doc');
    }

    public function graduateDestroy(Request $request, Document $graduate) {
		$graduate->delete();
		return redirect('/doc');
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
		return redirect('/doc');
	}

    // 綜合
    public function mixStore(Request $request){
        // 新增一筆資料
        $document = new Document;
        // $->欄位 = $request->name
        $document->title = $request->title;
        $document->content = $request->content;
        $document->position_of_screen = 3;
        $document->position_of_main = $request->position_of_main;
        // 儲存後返回
        $document->save();
        return redirect('/doc');
    }

    public function mixDestroy(Request $request, Document $mix) {
        $mix->delete();
        return redirect('/doc');
    }

    public function mixEdit(Document $mix){
        return view('documents.mixedit',['mix'=>$mix]);
    }

    public function mixUpdate(Request $request, Document $mix){
        $mix->update([
            'title' => $request->title,
            'content' => $request->content,
            'position_of_main' => $request->position_of_main
        ]);
        return redirect('/doc');
    }
}
