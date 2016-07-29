@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
<style type="text/css">
.col-sm-5{
	margin-top: 0.5rem; 
	margin-bottom: 1rem;"
}
.img{
	width: 80%;
    height: auto;
}
.left{
	margin-left: 130px;
}
body{
	background-image: url({{asset('img/group/BG1.jpg')}});
}
.text{
	font-size: 1.4cm;
}
</style>
	<div class="container">
		<div class="content">
			<ol class="breadcrumb">
				<li><a href="/">首頁</a></li>
				<li><a href="{{ url('/groups') }}">系所社團</a></li>
			</ol>
			<div class="row">
				<a href="{{ url('/groups/departments') }}">
					<div class="col-sm-5 left">
						<img class="img" src="{{ asset('img/group/dep.png') }}" width="304" height="304">
							<h1 class="text">系所</h1>
					</div>
				</a>
				<a href="{{ url('/groups/clubs') }}">
					<div class="col-sm-5">
						<img class="img" src="{{ asset('img/group/club.png') }}" width="304" height="304">
							<h1 class="text">社團</h1>
					</div>
				</a>
			</div>
		</div>
	</div>
@endsection