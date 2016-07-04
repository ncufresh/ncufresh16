@extends('layouts.app')
@section('content')
	
	<div>
		<a href="">新增</a>
	</div>

	@foreach ($clubs as $club)
	
	<div>
		<a href="">
			<div><img src="">{{$club->clubs_kind}}</div>
		</a>
		<div>{{$club->clubs_intro}}</div>
	</div>
	
	@endforeach

	
@endsection