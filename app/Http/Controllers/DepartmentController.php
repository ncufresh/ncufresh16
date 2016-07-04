<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DepartmentController extends Controller
{
    public function index(){
		$departments = Department::all();
		return view('departments.index', [
             'departments' => $departments,
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
