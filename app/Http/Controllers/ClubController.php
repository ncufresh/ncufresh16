<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Club;


class ClubController extends Controller
{
    public function index(){
		$clubs = Club::all();
		return view('clubs.index', [
             'clubs' => $clubs,
        ]); 
	}

	public function create()
    {
       return view('clubs.create');
    }

	
	public function store(Request $request)
	{
    	$club = new Club;
    	$club->clubs_kind = $request->clubs_kind;
    	$club->clubs_intro = $request->clubs_intro;
    	$club->save();
    	return redirect('/groups/clubs');
	}

	public function destroy(Request $request, Message $message)
	{
    	
	}

	public function show(Club $id)
	{
	    return view('clubs.show', [
	        'clubs' => $id
	    ]);
	}
	public function edit(Message $message)
	{
	    
	} 

	public function update(Request $request, Message $message)
	{
	    
	}

	
}
