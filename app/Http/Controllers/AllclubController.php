<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AllclubController extends Controller
{
    public function index(){
		$allClubs = Allclub::all();
		return view('allClubs.index', [
             'allClubs' => $allClubs,
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
