@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
<style type="text/css">
.col-sm-6{
	margin-top: 0.5rem; 
	margin-bottom: 1rem;
}
.img{
	width: 455px;
    height: 455px;
}
</style>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="/">首頁</a></li>
		<li><a href="{{ url('/groups') }}">系所社團</a></li>
		<li><a href="{{ url('/groups/clubs') }}">社團</a></li>
		<li><span class="glyphicon glyphicon-search" aria-hidden="true"></span></li>
	</ol>

	@can('management')
	<a href="{{ url('/groups/clubs/create') }}" class="btn btn-success btn-raised" role="button">新增</a>
	@endcan
	<div class="row">
			<div class="col-sm-6">
				<a href="{{ url('/groups/clubs/1') }}">
					<img class="img" src="{{ asset('img/group/aca.png')  }}">
					<h4 class="card-title">學術性</h4>
					<p class="card-text"></p>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="{{ url('/groups/clubs/2') }}">
					<img class="img" src="{{ asset('img/group/ret.png')  }}">
					<h4 class="card-title">康樂性</h4>
					<p class="card-text"></p>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="{{ url('/groups/clubs/3') }}">
					<img class="img" src="{{ asset('img/group/soc.png')  }}">
					<h4 class="card-title">聯誼性</h4>
					<p class="card-text"></p>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="{{ url('/groups/clubs/4') }}">
					<img class="img" src="{{ asset('img/group/ser.png')  }}">
					<h4 class="card-title">服務性</h4>
					<p class="card-text"></p>
				</a>
			</div>
		</div>
	</div>
</div>
	
@endsection