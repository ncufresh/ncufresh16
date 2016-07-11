@extends('layouts.app')
@section('content')
	<br><br><br><br>	
	<a href="{{ url('/groups/clubs/create') }}">新增</a>
	@foreach ($clubs as $club)
		<div>{{$club->clubs_intro}}</div>
		
		<div>{{$club->clubs_file}}</div>
	@endforeach

@endsection