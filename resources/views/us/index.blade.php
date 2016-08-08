@extends('layouts.layout')

@section('title', '關於我們')

@section('css')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
<style>
body {
	background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(1,50,104,.8) 100%);
}
main {
	background-image:url("{{asset('img/layout/winter.png')}}");
}
</style>
@endsection

@section('content')
<div class="container" id="fix">
	<div class="row">
		<div class="col-xs-12">
			<ul class="list-inline text-center about-size">
				<li><a href="{{ url('/about/plan') }}" id="plan">行銷企劃組</a></li> |
				<li><a href="{{ url('/about/program') }}" id="program">程式設計組</a></li> |
				<li><a href="{{ url('/about/execute') }}" id="execute">執行組</a></li> |
				<li><a href="{{ url('/about/art') }}" id="art">網頁美工組</a></li> |
				<li><a href="{{ url('/about/video') }}" id="video">媒體影音組</a></li>
			</ul><br>
		</div>
		@yield('us')
	</div>
</div>
@endsection