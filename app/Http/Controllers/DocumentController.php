<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Document;

class DocumentController extends Controller
{
    public function undergraduate(){
    	$unders1 = Document::where('position_of_main','1')->get();
    	$unders2 = Document::where('position_of_main','2')->get();
    	$unders3 = Document::where('position_of_main','3')->get();
		return view('documents.undergraduate', [
			'unders1' => $unders1,
			'unders2' => $unders2,
			'unders3' => $unders3,
		]);
    }

    public function graduate(){
    	$graduates1 = Document::where('position_of_main','1')->get();
    	$graduates2 = Document::where('position_of_main','2')->get();
    	$graduates3 = Document::where('position_of_main','3')->get();
		return view('documents.graduate', [
			'graduates1' => $graduates1,
			'graduates2' => $graduates2,
			'graduates3' => $graduates3,
		]);
    }
}
