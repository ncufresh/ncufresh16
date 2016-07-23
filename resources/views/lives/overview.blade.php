@extends('layouts.layout')

@section('title', '中大生活')

@section('css')
<style>
	.dropdown:hover .dropdown-menu {
	    display: block;
	    margin-top: 0; // remove the gap so it doesn't close
	 }


	 
	 li{
	 	 list-style: none;
	 }

	 .list-deco{
	 	width: 20%;
	 	height: auto;
	 }

	 .puzzle{
		position: absolute;
		width:40%;
		max-width: 60%;
		font-size :150%;
	}
	 

	 #lifeFrame {
		position: relative;
	}

	#groundFrame{
		position: absolute;
		width:100%;
		height: 150%;
	
	}


	 #foodFrame{
	  	top:80%;
		left:0%;

	  
	 }

	  #foodMenu {
	 	position:absolute; 
  		top:5% ;
  		left:-30%; 
	 }

	 #housingFrame{
	 	top:50%;
		left:30%;
	
		
	 }

	 #housingMenu {
	 	position:absolute; 
  		top:5%; 
  		left:40%; 
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
				
		
			
		<div class="container"  id="lifeFrame">

					<div id="groundFrame">
						<img class="list-deco" src="{{ asset('img/life/sun.png')  }}"> 
					</div>
					
		       		<div class="puzzle" id="foodFrame">
		       		<img onmouseover="click()" onmouseout="click()"  class="img-responsive btn btn-primary dropdown-toggle" type="button" data-toggle="collapse" data-target="#foodMenu" src="{{ asset('img/life/food.png')  }}">

					<ul class="collapse" id="foodMenu">
						@foreach ($food as $food)
						<li ><img class="list-deco" src="{{ asset('img/life/knife.png')  }}"> <a href="{{action('LifeController@getContent',['food', $food->id])}}">{{ $food->title }}</a></li>
						@endforeach
					</ul>	
					</div>
					
			
				

					<div class="puzzle" id="housingFrame">
						<img onmouseover="click()" onmouseout="click()"  class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#housingMenu" src="{{ asset('img/life/housing.png')  }}">

						<ul class="collapse" id="housingMenu">
							@foreach ($housing as $housing)
							<li><img class="list-deco" src="{{ asset('img/life/cloth.png')  }}"> <a href="{{action('LifeController@getContent',['housing', $housing->id])}}">{{ $housing->title }}</a></li>
							@endforeach
						</ul>
					</div>
					
				
			
		</div>
	
		

@endsection
