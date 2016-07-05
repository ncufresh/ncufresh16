<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Department;

class DepartmentController extends Controller
{
    public function index(){
		$departments = Department::all();
		return view('departments.index', [
             'departments' => $departments,
        ]); 
	}

	public function create()
    {
       return view('departments.create');
    }

	

	public function store(Request $request)
	{
    	$department = new Department;
    	$department->departments_kind = $request->departments_kind;
    	$department->departments_intro = $request->departments_intro;
    	$department->save();
    	return redirect('/groups/departments');
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
