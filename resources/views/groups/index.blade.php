@extends('layouts.app')
@section('title', '系所社團')
@section('content')
	<div>
		<a href="{{ url('/groups/departments') }}">
			<img src="{{ asset('image/department.jpg') }}">
			<span>系所</span>
		</a>


	</div>
	<div>
		<a href="{{ URL::action('ClubController@index') }}">
			<img src="{{ asset('image/club.jpg')  }}">
			<span>社團</span>
		</a>

	</div>
@endsection
