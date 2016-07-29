@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
<style type="text/css">
.col-sm-6{
	margin-top: 0.5rem; 
	margin-bottom: 1rem;
}
.img{
	width: 80%;
    height: auto;
}
</style>
<div class="container">
	<div class="content">
	<ol class="breadcrumb">
		<li><a href="/">首頁</a></li>
		<li><a href="{{ url('/groups') }}">系所社團</a></li>
		<li><a href="{{ url('/groups/departments') }}">系所</a></li>
	</ol>	
	
	@can('management')
	<a href="{{ url('/groups/departments/create') }}" class="btn btn-success btn-raised" role="button">新增</a>
	@endcan
	<div class="row">
			<div class="col-sm-6">	
				<a href="{{ url('/groups/departments/1') }}">
					<img class="img" src="{{ asset('img/group/lan.png')  }}">
					<h4 class="card-title">文學院</h4>
					<p class="card-text"></p>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="{{ url('/groups/departments/2') }}">
					<img class="img" src="{{ asset('img/group/cm.png')  }}">
					<h4 class="card-title">理學院</h4>
					<p class="card-text"></p>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="{{ url('/groups/departments/3') }}">
					<img class="img" src="{{ asset('img/group/sci.png')  }}">
					<h4 class="card-title">工學院</h4>
					<p class="card-text"></p>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="{{ url('/groups/departments/4') }}">
					<img class="img" src="{{ asset('img/group/man.png')  }}">
					<h4 class="card-title">管理學院</h4>
					<p class="card-text"></p>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="{{ url('/groups/departments/5') }}">
					<img class="img" src="{{ asset('img/group/cs.png')  }}">
					<h4 class="card-title">資訊電機學院</h4>
					<p class="card-text"></p>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="{{ url('/groups/departments/6') }}">
					<img class="img" src="{{ asset('img/group/ear.png')  }}">
					<h4 class="card-title">地球科學學院</h4>
					<p class="card-text"></p>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="{{ url('/groups/departments/7') }}">
					<img class="img" src="{{ asset('img/group/hak.png')  }}">
					<h4 class="card-title">客家學院</h4>
					<p class="card-text"></p>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="{{ url('/groups/departments/8') }}">
					<img class="img" src="{{ asset('img/group/med.png')  }}">
					<h4 class="card-title">生醫理工學院</h4>
					<p class="card-text"></p>
				</a>
			</div>

		</div>
	</div>
</div>
@endsection