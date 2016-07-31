@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
@section('js')
<script type="text/javascript">

	$(document).ready(function(){
    	$(".container").css('display','none').fadeIn(1000);
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	<script type="text/javascript">
	    $('.selectpicker').selectpicker({
	    	style: 'btn-primary',
  			size: 10
	    });
	</script>
@stop
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
	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	<select class="selectpicker" data-live-search="true" onChange="window.location.href=this.value" title="我想找OO社/系...">
	<optgroup label="社團">
		<option data-tokens="學術性" value="/groups/clubs/1">學術性</option>
  		<option data-tokens="康樂性" value="/groups/clubs/2">康樂性</option>
  		<option data-tokens="聯誼性" value="/groups/clubs/3">聯誼性</option>
  		<option data-tokens="服務性" value="/groups/clubs/4">服務性</option>
  	</optgroup>
  	<optgroup label="系所">
		<option data-tokens="文學院" value="/groups/departments/1">文學院</option>
  		<option data-tokens="理學院" value="/groups/departments/2">理學院</option>
  		<option data-tokens="工學院" value="/groups/departments/3">工學院</option>
  		<option data-tokens="管理學院" value="/groups/departments/4">管理學院</option>
		<option data-tokens="資訊電機學院" value="/groups/departments/5">資訊電機學院</option>
  		<option data-tokens="地球科學學院" value="/groups/departments/6">地球科學學院</option>
  		<option data-tokens="客家學院" value="/groups/departments/7">客家學院</option>
  		<option data-tokens="生醫理工學院" value="/groups/departments/8">生醫理工學院</option>
	</optgroup>
	</select>
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