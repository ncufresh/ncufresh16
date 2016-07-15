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

	public function getContent($topic ,Life $content){
	    $image = Life_image::where('life_id',$content->id)->get();
	   	$num_of_pics = count($image);
	   	if($content->topic == '住'){
	   		$more =  
		   	'
		   	 <a class="btn btn-default btn-block"  target="_blank" href="http://in.ncu.edu.tw/ncu7221/OSDS/">宿舍服務中心</a>
		 	 <a class="btn btn-default btn-block"  target="_blank" href="#">大一新生住宿意願調查</a>
		 	 <a class="btn btn-default btn-block" target="_blank" href="#">住宿Q&A</a> 
		 	';
	   	}
	   	return view('lives.detail', [
	   		'content' => $content,
	   		 'image' => $image,
	   		 'num_of_pics' => $num_of_pics,
	   		 'more' => $more,
	     ]);
	}

	//Food, Clothing, Housing, Transportation, Education, Entertainment
}
