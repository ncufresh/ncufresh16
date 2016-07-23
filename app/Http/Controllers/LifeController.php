<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Life;

use App\Life_image;

use App\Life_link;
class LifeController extends Controller
{
	public function getTitle(){
	    $food = Life::where('topic','食')->get();
	    $housing = Life::where('topic','住')->get();

	   	return view('lives.overview', ['food' => $food, 'housing' => $housing]);
	}

	public function getContent($topic ,Life $content){
	    $image = Life_image::where('life_id',$content->id)->get();
	   	$num_of_pics = count($image);
	   	$more = Life_link::where('life_id',$content->id)->get();
	   	
	   	return view('lives.detail', [
	   		'content' => $content,
	   		 'image' => $image,
	   		 'num_of_pics' => $num_of_pics,
	   		 'more' => $more,
	     ]);
	}

	//Food, Clothing, Housing, Transportation, Education, Entertainment
}
