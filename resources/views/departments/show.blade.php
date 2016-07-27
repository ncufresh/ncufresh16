@extends('layouts.layout')
@section('content')
	<br><br><br><br>	
	<a href="{{ url('/groups/departments/create') }}">新增</a>
	@foreach ($departments as $department)
		<!-- json_decode變陣列 -->
		<?php $photo1 = json_decode($department->departments_photo_1); ?>
		<?php $photo2 = json_decode($department->departments_photo_2); ?>
		<?php $photo3 = json_decode($department->departments_photo_3); ?>
		<?php $photo4 = json_decode($department->departments_photo_4); ?>
		<?php $photo5 = json_decode($department->departments_photo_5); ?>
		<a href="{{ url('/groups/departments/'.$department->id.'/edit') }}">編輯</a>
		<div class="container">
		  
		  <!-- Trigger the modal with a button -->
		  <!-- 要{{$department->id}} 才不會只顯示第一筆資料 -->
		  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$department->id}}">{{$department->departments_intro}}<img src="{{$department->departments_file}}"></button>

		  <!-- Modal -->
		  <!-- 要{{$department->id}} 才不會只顯示第一筆資料 -->
		  <div class="modal fade" id="myModal{{$department->id}}" role="dialog">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body">
		          
					  <h2>{{$department->departments_intro}}</h2>
					  <ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#home">系所介紹</a></li>
					    <li><a data-toggle="tab" href="#menu1">系學會</a></li>
					    <li><a data-toggle="tab" href="#menu2">系上活動</a></li>
					    <li><a data-toggle="tab" href="#menu3">系隊</a></li>
					    <li><a data-toggle="tab" href="#menu4">系上課程</a></li>
					  </ul>

					  <div class="tab-content">
					    <div id="home" class="tab-pane fade in active">
					      <h3>系所介紹</h3>
					      <p>{{$department->departments_summary}}</p>
					      <!-- 幻燈片1 -->
					      	<div id="myCarousel1" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo1 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel1" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel1" data-slide-to="{{$key}}"></li>
									@endif
								@endforeach
								</ol>
							 
							    <!-- Wrapper for slides -->
							    <div class="carousel-inner" role="listbox">
							   	@foreach ($photo1 as $key => $p)
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
								<a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<!-- 幻燈片1 -->
					    </div>
					    <div id="menu1" class="tab-pane fade">
					      <h3>系學會</h3>
					      <p>{{$department->departments_association}}</p>
					      <!-- 幻燈片2 -->
					      <div id="myCarousel2" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo2 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel2" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel2" data-slide-to="{{$key}}"></li>
									@endif
								@endforeach
								</ol>
							 
							    <!-- Wrapper for slides -->
							    <div class="carousel-inner" role="listbox">
							   	@foreach ($photo2 as $key => $p)
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
								<a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
					      	<!-- 幻燈片2 -->
					    </div>
					    <div id="menu2" class="tab-pane fade">
					      <h3>系上活動</h3>
					      <p>{{$department->departments_activity}}</p>
					      <!-- 幻燈片3 -->
					      <div id="myCarousel3" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo3 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel3" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel3" data-slide-to="{{$key}}"></li>
									@endif
								@endforeach
								</ol>
							 
							    <!-- Wrapper for slides -->
							    <div class="carousel-inner" role="listbox">
							   	@foreach ($photo3 as $key => $p)
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
								<a class="left carousel-control" href="#myCarousel3" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel3" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
					      	<!-- 幻燈片3 -->
					    </div>
					    <div id="menu3" class="tab-pane fade">
					      <h3>系隊</h3>
					      <p>{{$department->departments_sport}}</p>
					      <!-- 幻燈片4 -->
					      <div id="myCarousel4" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo4 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel4" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel4" data-slide-to="{{$key}}"></li>
									@endif
								@endforeach
								</ol>
							 
							    <!-- Wrapper for slides -->
							    <div class="carousel-inner" role="listbox">
							   	@foreach ($photo4 as $key => $p)
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
								<a class="left carousel-control" href="#myCarousel4" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel4" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
					      	<!-- 幻燈片4 -->
					    </div>
					    <div id="menu4" class="tab-pane fade">
					      <h3>系上課程</h3>
					      <p>{{$department->departments_course}}</p>
					      <!-- 幻燈片5 -->
					      <div id="myCarousel5" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo5 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel5" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel5" data-slide-to="{{$key}}"></li>
									@endif
								@endforeach
								</ol>
							 
							    <!-- Wrapper for slides -->
							    <div class="carousel-inner" role="listbox">
							   	@foreach ($photo5 as $key => $p)
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
								<a class="left carousel-control" href="#myCarousel5" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel5" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
					      	<!-- 幻燈片5 -->
					    </div>
					  </div>
				  

		        </div>

		        
		        
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>

		      </div>
		    </div>
		</div>

		  
  
	</div>
	@endforeach

@endsection