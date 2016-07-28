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
	    $food = Life::where('topic','food')->get();
	    $housing = Life::where('topic','housing')->get();
	    $transportation = Life::where('topic','transportation')->get();
	    $education = Life::where('topic','education')->get();
	    $entertainment = Life::where('topic','entertainment')->get();

	   	return view('lives.overview', ['food' => $food, 'housing' => $housing, 'transportation' => $transportation, 'education' => $education, 'entertainment' => $entertainment]);
	}

	

	public function getContent($topic ,Life $content){
	    $image = Life_image::where('life_id',$content->id)->get();
	    
	   	$num_of_pics = count($image);
	   	$more = Life_link::where('life_id',$content->id)->get();
	 	// if(isset($image)==TRUE){
	 	// 	$image = collect(["1","1","..\/image\/club.jpg","food","I'm food!","null","null"]);
	  //   	return view('lives.detail', [
	  //  		'content' => $content,
	  //  		 'image' => $image,
	  //  		 'num_of_pics' => $num_of_pics,
	  //  		 'more' => $more,
	  //    ]);
	 		 
	 
	  //   }
	   	// return $image;
	   	return view('lives.detail', [
	   		'content' => $content,
	   		 'image' => $image,
	   		 'num_of_pics' => $num_of_pics,
	   		 'more' => $more,
	     ]);
	}

	//Food, Clothing, Housing, Transportation, Education, Entertainment

	public function addTitle(Request $request)
	{
	    // return $request;
	    $life = new Life;
	    $life->topic = $request->topic;
	    $life->title = $request->title;
	    $life->save();
	    return redirect('../life');
	}

	public function addMore(Request $request, $topic ,$content)
	{
	    $life_link = new Life_link;
	    $life_link->life_id = $request->life_id;
	    $life_link->location = $request->location;
	    $life_link->link = $request->link;
	    $life_link->save();

	    return redirect('/life/'.$topic.'/'.$content);
	}

	public function updateContent(Request $request, $topic ,Life $content)
	{
    	$content->content = $request->content;
  
    	if($request->filepath){
    		$content->image = $request->filepath;
    	}
    	
	 	$content->save();	   
	    // $content->update([
     //    'content' => $request->content,
     //    'image' => $request->filepath
   		// ]);
   		return redirect('/life/'.$topic.'/'.$content->id);
	    
	    
	}

	public function deleteTitle(Life $id){
		 $id->delete();
		 Life_link::where('life_id', $id->id)->delete();
		 Life_image::where('life_id', $id->id)->delete();
		 return redirect('life');
	}

}
