@extends('layouts.app')
@section('content')
	<br><br><br><br><br><br><br>	
	<div>
		<a href="{{ url('/groups/clubs/create') }}">新增</a>
	</div>

	@foreach ($clubs as $club)
	
	<div>
		<a href="{{ url('/groups/clubs/'.$club->id) }}">
			<div><img src="">{{$club->clubs_kind}}</div>
		</a>
		<div>{{$club->clubs_intro}}</div>
	</div>
	
	@endforeach

	
@endsection