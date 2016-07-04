<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AlldepartmentController extends Controller
{
    public function index(){
		$allDepartments = Alldepartment::all();
		return view('allDepartments.index', [
             'allDepartments' => $allDepartments,
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
