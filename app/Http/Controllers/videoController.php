<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\videos;

class videoController extends Controller
{
    public function index()
    {
    	$videos = videos::all();
    	return view('videos.index', [
    		'videos' => $videos,
    		]);
    }
}
