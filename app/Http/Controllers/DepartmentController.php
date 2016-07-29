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
    	$department->departments_summary = $request->departments_summary;
    	$department->departments_association = $request->departments_association;
    	$department->departments_activity = $request->departments_activity;
    	$department->departments_sport = $request->departments_sport;
    	$department->departments_course = $request->departments_course;
    	$department->departments_file = $request->departments_file;
    	$department->departments_photo_1 = json_encode($request->departments_photo_1);
    	$department->departments_photo_2 = json_encode($request->departments_photo_2);
    	$department->departments_photo_3 = json_encode($request->departments_photo_3);
    	$department->departments_photo_4 = json_encode($request->departments_photo_4);
    	$department->departments_photo_5 = json_encode($request->departments_photo_5);
    	$department->save();
    	return redirect('/groups/departments');
	}

	public function destroy($id)
	{ 
        $departments = Department::find($id);
        $departments->delete();
        return redirect('/groups/departments');
    	
	}

	public function show($id)
	{
	    $departments = Department::where('departments_kind',$id)->get();
		return view('departments.show', [
	        'departments' => $departments
	    ]);
	}
	public function edit($id)
	{
	    $departments = Department::find($id);
		return view('departments.edit',compact('departments'));
	} 

	public function update(Request $request, $id)
	{
	    $departments = Department::find($id);
	    $departments->departments_intro = $request->departments_intro;
    	$departments->departments_summary = $request->departments_summary;
    	$departments->departments_association = $request->departments_association;
    	$departments->departments_activity = $request->departments_activity;
    	$departments->departments_sport = $request->departments_sport;
    	$departments->departments_course = $request->departments_course;
    	$departments->departments_file = $request->departments_file;
    	$departments->departments_photo_1 = json_encode($request->departments_photo_1);
        $departments->departments_photo_2 = json_encode($request->departments_photo_2);
        $departments->departments_photo_3 = json_encode($request->departments_photo_3);
        $departments->departments_photo_4 = json_encode($request->departments_photo_4);
        $departments->departments_photo_5 = json_encode($request->departments_photo_5);
    	$departments->save();
    	return redirect('/groups/departments');
	}
}
