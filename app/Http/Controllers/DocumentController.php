<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Document;

class DocumentController extends Controller
{
	/* 大學部 */
    public function undergraduate(){
    	// 先比對是否為大學部的資料
    	$unders = Document::where('is_graduate',false);
    	// 分別對應到三個主要類別後儲存
    	$unders1 = $unders->where('position_of_main','1')->get();
    	$unders2 = $unders->where('position_of_main','2')->get();
    	$unders3 = $unders->where('position_of_main','3')->get();
    	// 回傳大學部的網頁位置與三個主類別中的子類別
		return view('documents.undergraduate',
		[
			'unders1' => $unders1,
			'unders2' => $unders2,
			'unders3' => $unders3,
		]);
    }

    /* 研究所 */
    public function graduate(){
    	// 先比對是否為研究所的資料
    	$graduates = Document::where('is_graduate',true);
    	// 分別對應到三個主要類別後儲存
    	$graduates1 = $graduates->where('position_of_main','1')->get();
    	$graduates2 = $graduates->where('position_of_main','2')->get();
    	$graduates3 = $graduates->where('position_of_main','3')->get();
    	// 回傳研究所的網頁位置與三個主類別中的子類別
		return view('documents.graduate',
		[
			'graduates1' => $graduates1,
			'graduates2' => $graduates2,
			'graduates3' => $graduates3,
		]);
    }
}
