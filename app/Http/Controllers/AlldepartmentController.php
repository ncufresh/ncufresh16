<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Alldepartment;

class AlldepartmentController extends Controller
{
    public function index(){
		$alldepartments = Alldepartment::all();
		return view('alldepartments.index', [
             'alldepartments' => $alldepartments,
        ]); 
	}

	public function create()
    {
       return view('alldepartments.create');
    }

	

	public function store(Request $request)
	{
    	$alldepartment = new Allclub;
    	$alldepartment->departments_name = $request->departments_name;
    	$alldepartment->departments_activity = $request->departments_activity;
    	$alldepartment->departments_content = $request->departments_content;
    	$alldepartment->departments_team = $request->departments_team;
    	$alldepartment->departments_association = $request->departments_association;
    	$alldepartment->save();
    	return redirect('/groups/clubs/departments');

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
