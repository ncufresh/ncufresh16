@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
<style type="text/css">
.col-sm-6{
	margin-top: 0.5rem; 
	margin-bottom: 1rem;"
}
</style>
	<div class="container">
		<div class="content">
			<ol class="breadcrumb">
				<li><a href="/">首頁</a></li>
				<li><a href="{{ url('/groups') }}">系所社團</a></li>
			</ol>
			<div class="row">
				<div class="col-sm-6">
					<a href="{{ url('/groups/departments') }}">
						<img class="" src="{{ asset('img/group/dep.png') }}" width="304" height="304">
							<span class="text">系所</span>
					</a>
				</div>
				<div class="col-sm-6">
					<a href="{{ url('/groups/clubs') }}">
						<img class="" src="{{ asset('img/group/club.png') }}" width="304" height="304">
							<span class="text">社團</span>
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection