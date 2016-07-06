@extends('layouts.app')
@section('content')
	<br><br><br><br>	
	
	<div>
		<a href="{{ url('/') }}">首頁</a>><a href="{{ url('/groups') }}">系所社團</a>><a href="{{ url('/groups/clubs') }}">社團</a>
		
	</div>

	

	<div>
		<a href="{{ url('/groups/clubs/1') }}">
			<img src="{{ asset('')  }}">
			<span>學術性</span>
		</a>
	</div>
	<div>
		<a href="{{ url('/groups/clubs/2') }}">
			<img src="{{ asset('')  }}">
			<span>康樂性</span>
		</a>
	</div>
	<div>
		<a href="{{ url('/groups/clubs/3') }}">
			<img src="{{ asset('')  }}">
			<span>聯誼性</span>
		</a>
	</div>
	<div>
		<a href="{{ url('/groups/clubs/4') }}">
			<img src="{{ asset('')  }}">
			<span>服務性</span>
		</a>
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