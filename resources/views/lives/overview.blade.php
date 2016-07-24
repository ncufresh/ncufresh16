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
	 	 font-size: 130%;
	 }

	 .list-deco{
	 	width: 20%;
	 	height: auto;
	 }

	 .puzzle{
		position: absolute;
		width:40%;
		max-width: 60%;
	}
	 

	 #lifeFrame {
		position: relative;
	}

	#groundFrame{
		position: absolute;
		width:100%;
		height: auto;
		left: 20%;
	}


	 #foodFrame{
	  	top:80%;
		left:10%;
	  
	 }

	  #foodMenu {
	 	position:absolute; 
  		top:5% ;
  		left:-30%; 
	 }

	 #housingFrame{
	 	top:40%;
		left:40%;	
	 }

	 #housingMenu {
	 	position:absolute; 
  		top:5%; 
  		left:40%; 
	 }

	  #transportationFrame{
	 	top:250%;
		left:55%;	
	 }

	 #transportationMenu {
	 	position:absolute; 
  		top:5%; 
  		left:40%; 
	 }
	
	 #educationFrame{
	 	top:260%;
		left:25%;	
	 }

	 #educationMenu {
	 	position:absolute; 
  		top:5%; 
  		left:40%; 
	 }

	 #entertainmentFrame{
	 	top:100%;
		left:60%;	
	 }

	 #entertainmentMenu {
	 	position:absolute; 
  		top:5%; 
  		left:40%; 
	 }

	
</style>
	
@stop

@section('js')


@stop

@section('content')
				
		
			
		<div class="container"  id="lifeFrame">
					<!-- 背景 -->
					<div id="groundFrame">
						<img src="{{ asset('img/life/sun.png')  }}"> 	
					</div>
					
		       		<div class="puzzle" id="foodFrame">
		       		<img onmouseover="click()" onmouseout="click()"  class="img-responsive btn btn-primary dropdown-toggle" type="button" data-toggle="collapse" data-target="#foodMenu" src="{{ asset('img/life/food.png')  }}">

					<ul class="collapse" id="foodMenu">
						@foreach ($food as $food)
						<li><img class="list-deco" src="{{ asset('img/life/knife.png')  }}"> <a href="{{action('LifeController@getContent',['food', $food->id])}}">{{ $food->title }}</a></li>
						@endforeach
					</ul>	
					</div>
					
					<!-- 住 -->
					<div class="puzzle" id="housingFrame">
						<img onmouseover="click()" onmouseout="click()"  class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#housingMenu" src="{{ asset('img/life/housing.png')  }}">

						<ul class="collapse" id="housingMenu">
							@foreach ($housing as $housing)
							<li><img class="list-deco" src="{{ asset('img/life/cloth.png')  }}"> <a href="{{action('LifeController@getContent',['housing', $housing->id])}}">{{ $housing->title }}</a></li>
							@endforeach
						</ul>
					</div>

					<!-- 行 -->
					<div class="puzzle" id="transportationFrame">
						<img onmouseover="click()" onmouseout="click()"  class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#transportationMenu" src="{{ asset('img/life/transportation.png')  }}">

						<ul class="collapse" id="transportationMenu">
							@foreach ($transportation as $transportation)
							<li><img class="list-deco" src="{{ asset('img/life/transportation.png')  }}"> <a href="{{action('LifeController@getContent',['transportation', $transportation->id])}}">{{ $transportation->title }}</a></li>
							@endforeach
						</ul>
					</div>
					
					<!-- 育 -->
					<div class="puzzle" id="educationFrame">
						<img onmouseover="click()" onmouseout="click()"  class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#educationMenu" src="{{ asset('img/life/education.png')  }}">

						<ul class="collapse" id="educationMenu">
							@foreach ($transportation as $transportation)
							<li><img class="list-deco" src="{{ asset('img/life/foot.png')  }}"> <a href="{{action('LifeController@getContent',['education', $education->id])}}">{{ $education->title }}</a></li>
							@endforeach
						</ul>
					</div>
					
					<!-- 樂 -->
					<div class="puzzle" id="entertainmentFrame">
						<img onmouseover="click()" onmouseout="click()"  class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#entertainmentMenu" src="{{ asset('img/life/entertainment.png')  }}">

						<ul class="collapse" id="entertainmentMenu">
							@foreach ($transportation as $transportation)
							<li><img class="list-deco" src="{{ asset('img/life/pen.png')  }}"> <a href="{{action('LifeController@getContent',['entertainment', $entertainment->id])}}">{{ $entertainment->title }}</a></li>
							@endforeach
						</ul>
					</div>
			
		</div>
	
		

@endsection
