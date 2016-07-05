<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Allclub;

class AllclubController extends Controller
{
    public function index(){
		$allclubs = Allclub::all();
		return view('allclubs.index', [
             'allclubs' => $allclubs,
        ]); 
	}

	public function create()
    {
       return view('allclubs.create');
    }


	public function store(Request $request)
	{
    	$allclub = new Allclub;
    	$allclub->clubs_name = $request->clubs_name;
    	$allclub->clubs_activity = $request->clubs_activity;
    	$allclub->clubs_content = $request->clubs_content;
    	$allclub->clubs_join = $request->clubs_join;
    	$allclub->save();
    	return redirect('/groups/clubs/allclubs');

	}

	public function destroy(Request $request, Message $message)
	{
    	
	}

	public function show(Message $message)
	{
	    
	}
	public function edit(Message $message)
	{
	    
	} 

	public function update(Request $request, Message $message)
	{
	    
	}
}
