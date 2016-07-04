<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClubController extends Controller
{
    public function index(){
		$clubs = Club::all();
		return view('clubs.index', [
             'clubs' => $clubs,
        ]); 
	}

	

	public function store(Request $request)
	{
    	
	}

	public function destroy(Request $request, Message $message)
	{
    	
	}

	public function show(Message $message)
	{
	    

	public function edit(Message $message)
	{
	    
	} 

	public function update(Request $request, Message $message)
	{
	    
	}
}
