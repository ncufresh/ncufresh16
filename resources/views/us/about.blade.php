@extends('layouts.layout')

@section('title', '關於我們')

@section('css')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
<div class="container">
	<div class="jumbotron row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="/">首頁</a></li>
				<li><a href="{{ url('/about') }}">關於我們</a></li>
			</ol>
		</div>
		<div class="col-xs-12">
			<ul class="list-inline text-center about-size">
				<li>行銷企劃組</li> |
				<li>程式設計組</li> |
				<li>執行組</li> |
				<li>網頁美工組</li> |
				<li>媒體影音組</li>
			</ul><br>
		</div>
		<div class="col-xs-12">
			<img src="{{ asset('img/us/all.JPG') }}" class="img-responsive img-rounded">
		</div>
	</div>
</div>
@endsection

@section('js')
@endsection