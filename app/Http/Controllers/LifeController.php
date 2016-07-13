<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Life;


class LifeController extends Controller
{
	public function getTitle(){
	    $food = Life::where('topic','食')->get();
	    $housing = Life::where('topic','住')->get();
	   	return view('lives.overview', ['food' => $food, 'housing' => $housing]);
	}

	

	//Food, Clothing, Housing, Transportation, Education, Entertainment
}
