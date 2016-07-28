@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
<div class="container">
	<ol class="breadcrumb">
		<li><a href="/">首頁</a></li>
		<li><a href="{{ url('/groups') }}">系所社團</a></li>
		<li><a href="{{ url('/groups/departments') }}">系所</a></li>
	</ol>	
	
	@can('management')
	<a href="{{ url('/groups/departments/create') }}" class="btn btn-success btn-raised" role="button">新增</a>
	@endcan
	<div class="row">
		<div class="card-group">
			<div class="col-sm-6">
				<div class="card">
					<a href="{{ url('/groups/departments/1') }}">
						<img src="{{ asset('')  }}">
						<h4 class="card-title">文學院</h4>
						<p class="card-text"></p>
					</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<a href="{{ url('/groups/departments/2') }}">
						<img src="{{ asset('')  }}">
						<h4 class="card-title">理學院</h4>
						<p class="card-text"></p>
					</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<a href="{{ url('/groups/departments/3') }}">
						<img src="{{ asset('')  }}">
						<h4 class="card-title">工學院</h4>
						<p class="card-text"></p>
					</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<a href="{{ url('/groups/departments/4') }}">
						<img src="{{ asset('')  }}">
						<h4 class="card-title">管理學院</h4>
						<p class="card-text"></p>
					</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<a href="{{ url('/groups/departments/5') }}">
						<img src="{{ asset('')  }}">
						<h4 class="card-title">資訊電機學院</h4>
						<p class="card-text"></p>
					</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<a href="{{ url('/groups/departments/6') }}">
						<img src="{{ asset('')  }}">
						<h4 class="card-title">地球科學學院</h4>
						<p class="card-text"></p>
					</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<a href="{{ url('/groups/departments/7') }}">
						<img src="{{ asset('')  }}">
						<h4 class="card-title">客家學院</h4>
						<p class="card-text"></p>
					</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<a href="{{ url('/groups/departments/8') }}">
						<img src="{{ asset('')  }}">
						<h4 class="card-title">生醫理工學院</h4>
						<p class="card-text"></p>
					</a>
				</div>
			</div>
		</div>
	</div>

@endsection