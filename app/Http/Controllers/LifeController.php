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
	 	// if($image->isEmpty()==TRUE){
	 	// 	$image = new Life_image;
	 	// 	$image->life_id = $content->id;
	 	// 	$image->filename="../image/club.jpg";
	 	// 	$image->imagesTitle="food";
	 	// 	$image->imagesContent="I'm food!";
	 	// 	// $image = collect(["1",'life_id' = $content->id,"..\/image\/club.jpg","food","I'm food!","null","null"]);
	 	// 	// $image = collect([["id"=>"1", "life_id"=>$content->id,"filename"=>"../image/club.jpg","imagesTitle"=>"food","imagesContent"=>"I'm food!","created_at"=>null,"updated_at"=>null]]);
	 	// 	$num_of_pics = 1;
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

	public function addDetail(Request $request, $topic ,$content)
	{
	    
	    if($request->location){
		    $life_link = new Life_link;
		    $life_link->life_id = $request->life_id;
		    $life_link->location = $request->location;
		    $life_link->link = $request->link;
		    $life_link->save();
 		}
 		if($request->filename){
 			$life_image = new Life_image;
 			$life_image->life_id = $request->life_id;
 			$life_image->filename = $request->filename;
 			$life_image->save();

 		}
	    return redirect('/life/'.$topic.'/'.$content);
	}

	public function update(Request $request, $topic ,Life $content)
	{	
		// 首頁title編輯
		if($request->title){
    		$content->title = $request->title;
    		$content->save();	
    		return redirect('life');
    	}

    	if($request->more_id){
    		Life_link::where('id', $request->more_id)->update(['location' => $request->location, 'link' => $request->link]);
    	} 

    	// 內頁更新(除了more以外的)
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

	public function deleteMore(Life $id, Life_link $more_id){
		$more_id->delete();
		 return redirect('/life/'.$id->topic.'/'.$id->id);
	}

	

}
