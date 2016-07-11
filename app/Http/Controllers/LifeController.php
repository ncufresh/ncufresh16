<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Life;


class LifeController extends Controller
{
	public function food(){
	    $titles = Life::where('topic','食')->get();
	   	return view('lives.overview', ['titles' => $titles]);
	}


}
