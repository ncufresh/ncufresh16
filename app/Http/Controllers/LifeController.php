<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Life;

use App\Life_image;
class LifeController extends Controller
{
	public function getTitle(){
	    $food = Life::where('topic','食')->get();
	    $housing = Life::where('topic','住')->get();

	   	return view('lives.overview', ['food' => $food, 'housing' => $housing]);
	}

	public function getContent(Life $content){
	    $image = Life_image::where('life_id',$content->id)->get();
	   	return view('lives.housing', [
	   		'content' => $content,
	   		 'image' => $image,
	     ]);
	}

	//Food, Clothing, Housing, Transportation, Education, Entertainment
}
