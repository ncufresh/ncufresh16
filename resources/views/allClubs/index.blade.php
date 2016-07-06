@extends('layouts.app')
@section('content')
	
	@foreach ($allclubs as $allclub)
	<br><br><br><br><br>	
		<a href="{{ url('/groups/clubs/'.$allclub->clubs_id.'/create') }}">新增</a>
		<div>{{$allclub->clubs_name}}</div>
		<div>{{$allclub->clubs_content}}</div>
		<div>{{$allclub->clubs_activity}}</div>
		<div>{{$allclub->clubs_join}}</div>
				
	@endforeach
@endsection