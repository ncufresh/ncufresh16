@extends('layouts.layout')
@section('content')
	<form action="{{ URL::action('DepartmentController@store') }}" method="post">
	{{csrf_field()}}
		<br><br><br><br><br><br><br><br>
		<div>
			<input type="text" name="departments_kind">
			<label>系所類型</label>
		</div>
		<div>
			<label>類型介紹</label>
			<textarea name="departments_intro" cols="50" rows="10"></textarea>
		</div>
		
    	<button type="submit">確認</button>
	</form>

	
@endsection
