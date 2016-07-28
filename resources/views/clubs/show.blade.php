@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
	<br><br><br><br>
<!-- 權限 -->
@can('management')	
	<a href="{{ url('/groups/clubs/create') }}">新增</a>
@endcan
	@foreach ($clubs as $club)
		<!-- json_decode變陣列 -->
		<?php $photo = json_decode($club->clubs_photo); ?>
		@can('management')
		<a href="{{ url('/groups/clubs/'.$club->id.'/edit') }}">編輯</a>
		@endcan
		<div class="container">
		  
		  <!-- Trigger the modal with a button -->
		  <!-- 要{{$club->id}} 才不會只顯示第一筆資料 -->
		  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$club->id}}">{{$club->clubs_intro}}<img src="{{$club->clubs_file}}"></button>

		  <!-- Modal -->
		  <!-- 要{{$club->id}} 才不會只顯示第一筆資料 -->
		  <div class="modal fade" id="myModal{{$club->id}}" role="dialog">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">{{$club->clubs_intro}}</h4>
		        </div>
		        <div class="modal-body">
		          <p>{!!$club->clubs_summary!!}</p>
		          <p>{{$club->clubs_activity}}</p>
		          <p>{{$club->clubs_join}}</p>
		        

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
				</div>
			
		        
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
			</div>
		    </div>
		</div>
    </div>


		  
  
		</div>
	
	@endforeach

@endsection