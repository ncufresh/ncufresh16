@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
<div class="container">
	<ol class="breadcrumb">
		<li><a href="/">首頁</a></li>
		<li><a href="{{ url('/groups') }}">系所社團</a></li>
		<li><a href="{{ url('/groups/clubs') }}">社團</a></li>
	</ol>
	@can('management')
	<a href="{{ url('/groups/clubs/create') }}" class="btn btn-success btn-raised" role="button">新增</a>
	@endcan
	<div class="row">
		<div class="card-group">
			<div class="col-sm-6">
				<div class="card">
				<a href="{{ url('/groups/clubs/1') }}">
					<img src="{{ asset('')  }}">
					<h4 class="card-title">學術性</h4>
					<p class="card-text"></p>
				</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
				<a href="{{ url('/groups/clubs/2') }}">
					<img src="{{ asset('')  }}">
					<h4 class="card-title">康樂性</h4>
					<p class="card-text"></p>
				</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
				<a href="{{ url('/groups/clubs/3') }}">
					<img src="{{ asset('')  }}">
					<h4 class="card-title">聯誼性</h4>
					<p class="card-text"></p>
				</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
				<a href="{{ url('/groups/clubs/4') }}">
					<img src="{{ asset('')  }}">
					<h4 class="card-title">服務性</h4>
					<p class="card-text"></p>
				</a>
				</div>
			</div>
		</div>
	</div>
</div>
	
@endsection