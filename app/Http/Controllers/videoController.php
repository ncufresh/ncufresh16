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

	public function create()
    {
       return view('videos.create');
    }

	public function store(Request $request)
	{
    	$videos = new videos;
    	$videos->videos_kind = $request->videos_kind;
    	$videos->videos_intro = $request->videos_intro;
    	$videos->videos = $request->videos;
    	$videos->save();
    	return redirect('/index');
	}

        public function live()
    {
    	$videos = videos::all();
    	return view('videos.live', [
    		'videos' => $videos,
    		]);
    }

        public function traffic()
    {
    	$videos = videos::all();
    	return view('videos.traffic', [
    		'videos' => $videos,
    		]);
    }

        public function edu()
    {
    	$videos = videos::all();
    	return view('videos.edu', [
    		'videos' => $videos,
    		]);
    }

        public function fun()
    {
    	$videos = videos::all();
    	return view('videos.fun', [
    		'videos' => $videos,
    		]);
    }

            public function ncu()
    {
    	$videos = videos::all();
    	return view('videos.ncu', [
    		'videos' => $videos,
    		]);
    }
}
