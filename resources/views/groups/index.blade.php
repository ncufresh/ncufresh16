@extends('layouts.layout')
@section('title', '系所社團')
@section('content')

	<div class="container">
		<div class="content">
			<ol class="breadcrumb">
				<li><a href="/">首頁</a></li>
				<li><a href="{{ url('/groups') }}">系所社團</a></li>
			</ol>
			<div class="row">
				<div class="card-group">
					<div class="col-sm-6">
					<div class="card">
						<a href="{{ url('/groups/departments') }}">
							<img class="card-img-top" src="{{ asset('image/images.jpg') }}">
							<div class="card-block">
								<h4 class="card-title">系所</h4>
							</div>
						</a>
					</div>
					</div>
					<div class="col-sm-6" >
					<div class="card">
						<a href="{{ url('/groups/clubs') }}">
							<img class="card-img-top" src="{{ asset('image/images.jpg') }}">
							<div class="card-block">
								<h4 class="card-title">社團</h4>
							</div>
						</a>
					</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>



@endsection