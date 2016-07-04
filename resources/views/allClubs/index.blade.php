@extends('layouts.app')
@section('content')
	$allclubs = App\Club::find(1)->allclubs;
	@foreach ($allclubs as $allclub)
		
		<div>{{$allclubs->clubs_name}}</div>
		<div>{{$allclubs->clubs_content}}</div>
		
	@endforeach
@endsection