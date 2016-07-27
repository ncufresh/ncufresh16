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
</div>
	
@endsection