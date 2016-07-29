@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
	<br><br><br><br>	
	
	<div>
		<a href="{{ url('/') }}">首頁</a>><a href="{{ url('/groups') }}">系所社團</a>><a href="{{ url('/groups/departments') }}">系所</a>
		
	</div>
	@can('management')
	<a href="{{ url('/groups/departments/create') }}">新增</a>
	@endcan

	<div>
		<a href="{{ url('/groups/departments/1') }}">
			<img src="{{ asset('')  }}">
			<span>文學院</span>
		</a>
	</div>
	<div>
		<a href="{{ url('/groups/departments/2') }}">
			<img src="{{ asset('')  }}">
			<span>理學院</span>
		</a>
	</div>
	<div>
		<a href="{{ url('/groups/departments/3') }}">
			<img src="{{ asset('')  }}">
			<span>工學院</span>
		</a>
	</div>
	<div>
		<a href="{{ url('/groups/departments/4') }}">
			<img src="{{ asset('')  }}">
			<span>管理學院</span>
		</a>
	</div>
	<div>
		<a href="{{ url('/groups/departments/5') }}">
			<img src="{{ asset('')  }}">
			<span>資訊電機學院</span>
		</a>
	</div>
	<div>
		<a href="{{ url('/groups/departments/6') }}">
			<img src="{{ asset('')  }}">
			<span>地球科學學院</span>
		</a>
	</div>
	<div>
		<a href="{{ url('/groups/departments/7') }}">
			<img src="{{ asset('')  }}">
			<span>客家學院</span>
		</a>
	</div>
	<div>
		<a href="{{ url('/groups/departments/8') }}">
			<img src="{{ asset('')  }}">
			<span>生醫理工學院</span>
		</a>
	</div>
	


@endsection