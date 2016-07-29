@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
<style type="text/css">
body{
	background-image: url({{asset('img/group/BG1.jpg')}});
	background-repeat: no-repeat;
    background-size:cover;
}
</style>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="/">首頁</a></li>
		<li><a href="{{ url('/groups') }}">系所社團</a></li>
		<li><a href="{{ url('/groups/clubs') }}">社團</a></li>
	</ol>
<!-- 權限 -->
@can('management')	
	<a href="{{ url('/groups/clubs/create') }}" class="btn btn-success btn-raised" role="button">新增</a>
@endcan
<div class="row">
	<div class="card-group">
	@foreach ($clubs as $club)
	<div class="col-sm-6" style="margin-top: 0.5rem; margin-bottom: 1rem;">
	
		<!-- json_decode變陣列 -->
		<?php if ($club->clubs_photo != null) {
			$photo = json_decode($club->clubs_photo);
		} ?>
	<div class="card">	
		@can('management')
		<a href="{{ url('/groups/clubs/'.$club->id.'/edit') }}" class="btn btn-warning btn-raised btn-sm" role="button">編輯</a>
		<form class="form" method="post" action="{{ URL::action('ClubController@destroy',$club->id) }}">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />  
            <input type="hidden" name="_method" value="delete" />
            <input type="submit" value="刪除" class="btn btn-danger btn-raised btn-sm" onclick="return confirm('是否確定刪除?')"/>
        </form>
        
		@endcan
		  
		  <!-- Trigger the modal with a button -->
		  <!-- 要{{$club->id}} 才不會只顯示第一筆資料 -->
		  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$club->id}}"><h4 class="card-title">{{$club->clubs_intro}}</h4><img class="card-img-top" src="{{$club->clubs_file}}"></button>
	</div>	
	</div>
		  <!-- Modal -->
		  <!-- 要{{$club->id}} 才不會只顯示第一筆資料 -->
		  <div class="modal fade" id="myModal{{$club->id}}" role="dialog">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h2>{{$club->clubs_intro}}</h2>
		        </div>
		        <div class="modal-body">
		          <p>{!!$club->clubs_summary!!}</p>
		          <p>{!!$club->clubs_activity!!}</p>
		          <p>{!!$club->clubs_join!!}</p>
		        
		        @if($photo != null)
		        <div id="myCarousel{{$club->id}}" class="carousel slide" data-ride="carousel">
				    
					    <!-- Indicators -->
					    <ol class="carousel-indicators">

					    @foreach ($photo as $key => $p)
						    @if($key == 0)
								<li data-target="#myCarousel{{$club->id}}" data-slide-to="{{$key}}" class="active"></li>
							@else
								<li data-target="#myCarousel{{$club->id}}" data-slide-to="{{$key}}"></li>
							@endif
						@endforeach
						</ol>
					 
					    <!-- Wrapper for slides -->
					    <div class="carousel-inner" role="listbox">
					   	@foreach ($photo as $key => $p)
						    @if($key == 0)
								<div class="item active">
						        	<img src="{{$p}}" alt="FailQQ">
						      	</div>
							@else
								<div class="item">
						        	<img src="{{$p}}" alt="FailQQ">
						      	</div>
						    @endif
						@endforeach
						</div>
				    
				     <!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel{{$club->id}}" role="button" data-slide="prev">
					   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					   <span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel{{$club->id}}" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				@endif
				</div>
			    <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
			</div>
		    </div>
		</div>
</div>


@endforeach
</div>
</div>

@endsection