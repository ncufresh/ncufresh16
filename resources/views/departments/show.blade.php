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
    color: #333;
}
.container{
    display: none;
}
.nav-pills{
	border-bottom: 1px solid #ddd;
}
</style>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="/">首頁</a></li>
		<li><a href="{{ url('/groups') }}">系所社團</a></li>
		<li><a href="{{ url('/groups/departments') }}">系所</a></li>
		@foreach ($departments as $department)
			@if($department->departments_kind == 1)
			<li><a href="{{ url('/groups/departments/1') }}">文學院</a></li>
			@break	
			@elseif($department->departments_kind == 2)
			<li><a href="{{ url('/groups/departments/2') }}">理學院</a></li>
			@break
			@elseif($department->departments_kind == 3)
			<li><a href="{{ url('/groups/departments/3') }}">工學院</a></li>
			@break
			@elseif($department->departments_kind == 4)
			<li><a href="{{ url('/groups/departments/4') }}">管理學院</a></li>
			@break
			@elseif($department->departments_kind == 5)
			<li><a href="{{ url('/groups/departments/5') }}">資訊電機學院</a></li>
			@break
			@elseif($department->departments_kind == 6)
			<li><a href="{{ url('/groups/departments/6') }}">地球科學學院</a></li>
			@break
			@elseif($department->departments_kind == 7)
			<li><a href="{{ url('/groups/departments/7') }}">客家學院</a></li>
			@break
			@else
			<li><a href="{{ url('/groups/departments/8') }}">生醫理工學院</a></li>
			@break
			@endif
		@endforeach
	</ol>
<!-- 權限 -->
@can('management')		
	<a href="{{ url('/groups/departments/create') }}" class="btn btn-success btn-raised" role="button">新增</a>
@endcan
<div class="row">
	@foreach ($departments as $department)
	<div class="col-sm-4">
	
		<!-- json_decode變陣列 -->
		<?php if ($department->departments_photo_1 != null) {
			$photo1 = json_decode($department->departments_photo_1);
		} ?>
		<?php if ($department->departments_photo_2 != null) {
			$photo2 = json_decode($department->departments_photo_2);
		} ?>
		<?php if ($department->departments_photo_3 != null) {
			$photo3 = json_decode($department->departments_photo_3);
		} ?>
		<?php if ($department->departments_photo_4 != null) {
			$photo4 = json_decode($department->departments_photo_4);
		} ?>
		<?php if ($department->departments_photo_5 != null) {
			$photo5 = json_decode($department->departments_photo_5);
		} ?>
		@can('management')	
		<a href="{{ url('/groups/departments/'.$department->id.'/edit') }}" class="btn btn-warning btn-raised btn-sm" role="button">編輯</a>
		<form class="form" method="post" action="{{ URL::action('DepartmentController@destroy',$department->id) }}">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />  
            <input type="hidden" name="_method" value="delete" />
            <input type="submit" value="刪除" class="btn btn-danger btn-raised btn-sm" onclick="return confirm('是否確定刪除?')"/>
        </form>
		@endcan	  
		  <!-- Trigger the modal with a button -->
		  <!-- 要{{$department->id}} 才不會只顯示第一筆資料 -->
		  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$department->id}}"><img class="img" src="{{$department->departments_file}}"></button>
	</div>
	
		  <!-- Modal -->
		  <!-- 要{{$department->id}} 才不會只顯示第一筆資料 -->
		  <div class="modal fade" id="myModal{{$department->id}}" role="dialog">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body" style="padding-top: 20px;">
		          
					  <h2 class="modal-title">{{$department->departments_intro}}</h2>
					  <ul class="nav nav-pills ">
					    <li class="active"><a data-toggle="tab" href="#home{{$department->id}}">系所介紹</a></li>
					    <li><a data-toggle="tab" href="#menu1{{$department->id}}">系學會</a></li>
					    <li><a data-toggle="tab" href="#menu2{{$department->id}}">系上活動</a></li>
					    <li><a data-toggle="tab" href="#menu3{{$department->id}}">系隊</a></li>
					    <li><a data-toggle="tab" href="#menu4{{$department->id}}">系上課程</a></li>
					  </ul>

					  <div class="tab-content">
					    <div id="home{{$department->id}}" class="tab-pane fade in active">
					      <h3>系所介紹</h3>
					      <p>{!!$department->departments_summary!!}</p>
					      <!-- 幻燈片1 -->
					      @if($photo1 != null)
					      	<div id="myCarousel1{{$department->id}}" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo1 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel1{{$department->id}}" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel1{{$department->id}}" data-slide-to="{{$key}}"></li>
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
								<a class="left carousel-control" href="#myCarousel1{{$department->id}}" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel1{{$department->id}}" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							@endif
							<!-- 幻燈片1 -->
					    </div>
					    <div id="menu1{{$department->id}}" class="tab-pane fade">
					      <h3>系學會</h3>
					      <p>{!!$department->departments_association!!}</p>
					      <!-- 幻燈片2 -->
					      @if($photo2 != null)
					      <div id="myCarousel2{{$department->id}}" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo2 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel2{{$department->id}}" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel2{{$department->id}}" data-slide-to="{{$key}}"></li>
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
								<a class="left carousel-control" href="#myCarousel2{{$department->id}}" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel2{{$department->id}}" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							@endif
					      	<!-- 幻燈片2 -->
					    </div>
					    <div id="menu2{{$department->id}}" class="tab-pane fade">
					      <h3>系上活動</h3>
					      <p>{!!$department->departments_activity!!}</p>
					      <!-- 幻燈片3 -->
					      @if($photo3 != null)
					      <div id="myCarousel3{{$department->id}}" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo3 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel3{{$department->id}}" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel3{{$department->id}}" data-slide-to="{{$key}}"></li>
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
								<a class="left carousel-control" href="#myCarousel3{{$department->id}}" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel3{{$department->id}}" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							@endif
					      	<!-- 幻燈片3 -->
					    </div>
					    <div id="menu3{{$department->id}}" class="tab-pane fade">
					      <h3>系隊</h3>
					      <p>{!!$department->departments_sport!!}</p>
					      <!-- 幻燈片4 -->
					      @if($photo4 != null)
					      <div id="myCarousel4{{$department->id}}" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo4 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel4{{$department->id}}" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel4{{$department->id}}" data-slide-to="{{$key}}"></li>
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
								<a class="left carousel-control" href="#myCarousel4{{$department->id}}" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel4{{$department->id}}" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							@endif
					      	<!-- 幻燈片4 -->
					    </div>
					    <div id="menu4{{$department->id}}" class="tab-pane fade">
					      <h3>系上課程</h3>
					      <p>{!!$department->departments_course!!}</p>
					      <!-- 幻燈片5 -->
					      @if($photo5 != null)
					      <div id="myCarousel5{{$department->id}}" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo5 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel5{{$department->id}}" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel5{{$department->id}}" data-slide-to="{{$key}}"></li>
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
								<a class="left carousel-control" href="#myCarousel5{{$department->id}}" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel5{{$department->id}}" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							@endif
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
	@endforeach
</div>
</div>
@endsection