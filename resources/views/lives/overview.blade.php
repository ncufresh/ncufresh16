@extends('layouts.app')

@section('title', '中大生活')

@section('css')
<style>
	.dropdown:hover .dropdown-menu {
	    display: block;
	    margin-top: 0; // remove the gap so it doesn't close
	 }

	 #food {
	 	position:relative; 
  		top:10px; 
  		left:50px; 
	 }
	
</style>
	
@stop

@section('js')

	<!-- <script type="text/javascript"> 
		$( "panel-heading" ).click(function() {
			$( "this" ).click();
		});
	</script>
	 -->
<!-- 舊版滑動動畫
	<script type="text/javascript"> 
$(document).ready(function(){
$(".btn btn-default").click(function(){
    $(".panel").slideToggle("slow");
  });
});
</script>
-->


@stop

@section('content')

		
			<div class="container">

				
       		<img onmouseover="click() " onmouseout="click()"  class="btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#food" src="{{ asset('image/food.png')  }}">

			<ul class="collapse" id="food">
				@foreach ($food as $food)
				<li><a href="{{action('LifeController@getContent',['food', $food->id])}}">{{ $food->title }}</a></li>
				@endforeach
			</ul>

			<img onmouseover="click() " onmouseout="click()"  class="btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#housing" src="{{ asset('image/housing.png')  }}">

			<ul class="collapse" id="housing">
				@foreach ($housing as $housing)
				<li><a href="{{action('LifeController@getContent',['housing', $housing->id])}}">{{ $housing->title }}</a></li>
				@endforeach
			</ul>
			



			</div>
		

@endsection
