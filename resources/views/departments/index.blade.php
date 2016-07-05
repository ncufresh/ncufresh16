@extends('layouts.app')
@section('content')
	<br><br><br><br><br><br><br>	
	<div>
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