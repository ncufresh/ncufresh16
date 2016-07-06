@extends('layouts.app')
@section('content')
	<br><br><br><br><br><br><br>	
	<div>
		<a href="">首頁</a>><a href="{{ url('/groups') }}">系所社團</a>><a href="{{ url('/groups/departments') }}">系所</a>
		<a href="{{ url('/groups/departments/create') }}">新增</a>
	</div>

	@foreach ($departments as $department)
	
	<div>
		<a href="{{ url('/groups/departments/'.$department->id) }}">
			<div><img src="">{{$department->departments_kind}}</div>
		</a>
		<div>{{$department->departments_intro}}</div>
	</div>
	
	@endforeach

	
@endsection