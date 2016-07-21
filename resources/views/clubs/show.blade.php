@extends('layouts.layout')
@section('content')
	<br><br><br><br>	
	<a href="{{ url('/groups/clubs/create') }}">新增</a>
	@foreach ($clubs as $club)
		
		
		<div class="container">
		  
		  <!-- Trigger the modal with a button -->
		  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$club->id}}">{{$club->clubs_intro}}<img src="{{$club->clubs_file}}"></button>

		  <!-- Modal -->
		  <!-- {{$club->id}} 不會只顯示第一筆資料 -->
		  <div class="modal fade" id="myModal{{$club->id}}" role="dialog">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">{{$club->clubs_intro}}</h4>
		        </div>
		        <div class="modal-body">
		          <p>{{$club->clubs_summary}}</p>
		          <p>{{$club->clubs_activity}}</p>
		          <p>{{$club->clubs_join}}</p>
		        </div>

		        <div class="container">
				  <br>
				  <div id="myCarousel" class="carousel slide" data-ride="carousel">
				    <!-- Indicators -->
				    <ol class="carousel-indicators">
				      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				      <li data-target="#myCarousel" data-slide-to="1"></li>
				      
				    </ol>

				    <!-- Wrapper for slides -->
				    <div class="carousel-inner" role="listbox">
				      <div class="item active">
				        <img src="images.jpg" alt="Chania" width="460" height="345">
				      </div>

				      <div class="item">
				        <img src="picture.jpg" alt="Chania" width="460" height="345">
				      </div>
				    
				    </div>

				    <!-- Left and right controls -->
				    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				      <span class="sr-only">Previous</span>
				    </a>
				    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
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

		  <!-- 幻燈片 -->
		  
  
		</div>
	@endforeach

@endsection