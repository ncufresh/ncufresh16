@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
@section('js')
<script type="text/javascript">

	$(document).ready(function(){
    	$(".container").fadeIn(1000);
    });
</script>
@stop
<style type="text/css">
body{
	background-image: url({{asset('img/group/BG1.jpg')}});
	background-repeat: no-repeat;
    background-size:cover;
}
.container{
    display: none;
}
.img{
	width: 90%;
    height: auto;
}
.col-sm-3{
	margin-top: 8rem;
	margin-bottom: 0.5rem;
}
.row{
	margin-left: 20px;
}
</style>
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
			<a href="{{ url('/groups/clubs/1') }}">
				<div class="col-sm-3">
					<img class="img a" src="{{ asset('img/group/aca.png')  }}">
					<h1 class="title">學術性</h1>
				</div>
			</a>
			<a href="{{ url('/groups/clubs/2') }}">
				<div class="col-sm-3">
					<img class="img b" src="{{ asset('img/group/ret.png')  }}">
					<h1 class="title">康樂性</h1>
				</div>
			</a>
			<a href="{{ url('/groups/clubs/3') }}">
				<div class="col-sm-3">
					<img class="img c" src="{{ asset('img/group/soc.png')  }}">
					<h1 class="title">聯誼性</h1>
				</div>
			</a>
			<a href="{{ url('/groups/clubs/4') }}">
				<div class="col-sm-3">
					<img class="img d" src="{{ asset('img/group/ser.png')  }}">
					<h1 class="title">服務性</h1>
				</div>
			</a>
		</div>
	</div>
</div>
	
@endsection