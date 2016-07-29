@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
<style type="text/css">
.col-sm-3{
	margin-top: 0.5rem; 
}
.down{
	margin-bottom: 5rem;
}
.img{
	width: 90%;
    height: auto;
}
.row{
	margin-left: 10px;
}
body{
	background-image: url({{asset('img/group/BG1.jpg')}});
	background-repeat: no-repeat;
    background-size:cover;
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
			<a href="{{ url('/groups/departments/1') }}">
				<div class="col-sm-3 down">	
					<img class="img" src="{{ asset('img/group/lan.png')  }}">
					<h2 class="title">文學院</h2>
				</div>
			</a>
			<a href="{{ url('/groups/departments/2') }}">
				<div class="col-sm-3 down">
					<img class="img" src="{{ asset('img/group/cm.png')  }}">
					<h2 class="title">理學院</h2>
				</div>
			</a>
			<a href="{{ url('/groups/departments/3') }}">
				<div class="col-sm-3 down">
					<img class="img" src="{{ asset('img/group/sci.png')  }}">
					<h2 class="title">工學院</h2>
				</div>
			</a>
			<a href="{{ url('/groups/departments/4') }}">
				<div class="col-sm-3 down">
					<img class="img" src="{{ asset('img/group/man.png')  }}">
					<h2 class="title">管理學院</h2>
				</div>
			</a>
			<a href="{{ url('/groups/departments/5') }}">
				<div class="col-sm-3">
					<img class="img" src="{{ asset('img/group/cs.png')  }}">
					<h2 class="title">資訊電機學院</h2>
				</div>
			</a>
			<a href="{{ url('/groups/departments/6') }}">
				<div class="col-sm-3">
					<img class="img" src="{{ asset('img/group/ear.png')  }}">
					<h2 class="title">地球科學學院</h2>
				</div>
			</a>
			<a href="{{ url('/groups/departments/7') }}">
				<div class="col-sm-3">
					<img class="img" src="{{ asset('img/group/hak.png')  }}">
					<h2 class="title">客家學院</h2>
				</div>
			</a>
			<a href="{{ url('/groups/departments/8') }}">
				<div class="col-sm-3">
					<img class="img" src="{{ asset('img/group/med.png')  }}">
					<h2 class="title">生醫理工學院</h2>
				</div>
			</a>

		</div>
	</div>
</div>
@endsection