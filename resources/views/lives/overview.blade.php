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
	 	 font-size: 200%;
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
		max-width:100%;
		height: auto;
		
			
	}

	#groundFrame{
		position: absolute;
	}

	 #foodFrame{
	  	top:20%;
		left:-10%;
	  
	 }

	 #housingFrame{
	 	top:0%;
		left:40%;	
	 }

	  #transportationFrame{
	 	top:70%;
		left:65%;	
	 }

	 #educationFrame{
	 	top:80%;
		left:15%;	
	 }

	 #entertainmentFrame{
	 	top:30%;
		left:80%;	
	 }

	  #foodMenu,  #housingMenu, #transportationMenu, #educationMenu, #entertainmentMenu  {
	 	position:absolute; 
	 	width: 120%;
  		top:-80% ;
  		left:80%; 
	 }

	#foodFrame:hover {
	 	 -ms-transform: scale(1.2, 1.2); /* IE 9 */
    -webkit-transform: scale(2, 3); /* Safari */
    transform: scale(1.2, 1.2);
	 }
	
	/*.container {
  display: none;
}*/

.container {
  display: none;
}
</style>
	
@stop

@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		 $(".container").fadeIn(1300);
	    $(".puzzle").click(function(){
	       	var form = document.getElementById("form_name");
	        var clicks = $(this).data('clicks');
			  if (clicks) {
			     
		        $("#foodFrame").animate({
		            left: '-10%',
		            top: '20%'
		        });
 				$("#housingFrame").animate({
		            top:'0%',
					left:'40%'
		        });

		        $("#transportationFrame").animate({       
					top:'70%',
					left:'65%'	
		        });
		        $("#educationFrame").animate({       
					top:'80%',
					left:'15%'
		        });
		         $("#entertainmentFrame").animate({       
					top:'30%',
					left:'80%'
		        });        

		        $(".puzzle").fadeIn(1000);

			  } else {
			     $(this).animate({
	            	left: '30%',
	            	top: '35%'

		        });
			 
			    $(".puzzle").fadeOut(1000);
			    $(this).fadeIn(1000);

		       
		  
			  }
			  $(this).data("clicks", !clicks);

	        
	    });
	    
	});
</script>


@stop

@section('content')
				
		
			
		<div class="container"  id="lifeFrame">
					<!-- 背景 -->
					<div id="groundFrame">
						<img id="sunPic" src="{{ asset('img/life/sun.png')  }}"> 	
					
					
		       		<div class="puzzle" id="foodFrame">
		       		<img class="img-responsive btn btn-primary dropdown-toggle" type="button" data-toggle="collapse" data-target="#foodMenu" src="{{ asset('img/life/food.png')  }}">

		       		<ul class="collapse" id="foodMenu">
						@foreach ($food as $food)
						<li><img class="list-deco" src="{{ asset('img/life/knife.png')  }}"> <a href="{{action('LifeController@getContent',['food', $food->id])}}">{{ $food->title }}</a></li>
						@endforeach
					</ul>	
					</div>

					
					<!-- 住 -->
					<div class="puzzle" id="housingFrame">
						<img class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#housingMenu" src="{{ asset('img/life/housing.png')  }}">

						<ul class="collapse" id="housingMenu">
							@foreach ($housing as $housing)
							<li><img class="list-deco" src="{{ asset('img/life/cloth.png')  }}"> <a href="{{action('LifeController@getContent',['housing', $housing->id])}}">{{ $housing->title }}</a></li>
							@endforeach
						</ul>
					</div>

					<!-- 行 -->
					<div class="puzzle" id="transportationFrame">
						<img class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#transportationMenu" src="{{ asset('img/life/transportation.png')  }}">

						<ul class="collapse" id="transportationMenu">
							@foreach ($transportation as $transportation)
							<li><img class="list-deco" src="{{ asset('img/life/transportation.png')  }}"> <a href="{{action('LifeController@getContent',['transportation', $transportation->id])}}">{{ $transportation->title }}</a></li>
							@endforeach
						</ul>
					</div>
					
					<!-- 育 -->
					<div class="puzzle" id="educationFrame">
						<img class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#educationMenu" src="{{ asset('img/life/education.png')  }}">

						<ul class="collapse" id="educationMenu">
							@foreach ($transportation as $transportation)
							<li><img class="list-deco" src="{{ asset('img/life/foot.png')  }}"> <a href="{{action('LifeController@getContent',['education', $education->id])}}">{{ $education->title }}</a></li>
							@endforeach
						</ul>
					</div>
					
					<!-- 樂 -->
					<div class="puzzle" id="entertainmentFrame">
						<img class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#entertainmentMenu" src="{{ asset('img/life/entertainment.png')  }}">

						<ul class="collapse" id="entertainmentMenu">
							@foreach ($transportation as $transportation)
							<li><img class="list-deco" src="{{ asset('img/life/pen.png')  }}"> <a href="{{action('LifeController@getContent',['entertainment', $entertainment->id])}}">{{ $entertainment->title }}</a></li>
							@endforeach
						</ul>
					</div>

					</div>
			
		</div>
	
		

@endsection
