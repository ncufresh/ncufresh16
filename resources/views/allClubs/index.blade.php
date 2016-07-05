@extends('layouts.app')
@section('content')
	$allclubs = App\Club::find(1)->allclubs;

	<br><br><br><br><br><br><br>	
	<div>
		<a href="{{ url('/groups/clubs/allclubs/create') }}">新增</a>
	</div>

	@foreach ($allclubs as $allclub)
	
		<div>{{$allclub->clubs_name}}</div>
		<div>{{$allclub->clubs_content}}</div>
		<div>{{$allclub->clubs_activity}}</div>
		<div>{{$allclub->clubs_join}}</div>
				
	@endforeach
@endsection