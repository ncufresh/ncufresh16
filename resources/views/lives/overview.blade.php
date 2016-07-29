@extends('layouts.layout')

@section('title', '中大生活')

@section('css')
<style>
body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%); }
main { background-image:url("{{asset('img/layout/spring.png')}}"); }

	.dropdown:hover .dropdown-menu {
	    display: block;
	    margin-top: 0; /*// remove the gap so it doesn't close*/
	 }
	 
	 li{
	 	 list-style: none;
	 	 font-size: 24px;
	 	
	 }

	 li img{
	 	max-width: 80px;
	 	height: auto;
	 }

	

	 .puzzle{
		position: absolute;
		width:40%;
		max-width: 60%;
	}
	 

	#groundFrame{
		min-height: 650px;
		position: relative;
		background-image: url(img/life/sun.png);
	 	background-repeat:no-repeat;
	 	background-position: center center;
	
	}

	#lifeFrame{
		position: absolute;
		top:40%;
		left:40%;
	}

	 #foodFrame{
	  	top:20%;
		left:0%;
	  
	 }

	 #housingFrame{
	 	top:0%;
		left:40%;	
	 }

	  #transportationFrame{
	 	top:70%;
		left:60%;	
	 }

	 #educationFrame{
	 	top:75%;
		left:25%;	
	 }

	 #entertainmentFrame{
	 	top:30%;
		left:70%;	
	 }

	  .menu{
	 	position:absolute; 
	 	/*max-width: 4px;*/
  		top:5%;
  		bottom: 5%;
  	/*	margin:0px auto;*/
  		left:70%; 
	 }

	.puzzle:hover {
	 	 -ms-transform: scale(1.2, 1.2); /* IE 9 */
	    -webkit-transform: scale(2, 3); /* Safari */
	    transform: scale(1.2, 1.2);
	 }
	

.container {
  display: none;
}
</style>
	
@stop

@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		 $(".container").fadeIn(1000);
	    $(".puzzle").click(function(){
	       	var form = document.getElementById("form_name");
	        var clicks = $(this).data('clicks');
			  if (clicks) {
			     
		        $("#foodFrame").animate({
		            top:'20%',
		            left: '0%'
		        });
 				$("#housingFrame").animate({
		            top:'0%',
					left:'40%'
		        });

		        $("#transportationFrame").animate({       
					top:'70%',
					left:'60%'	
		        });
		        $("#educationFrame").animate({       
					top:'75%',
					left:'25%'
		        });
		         $("#entertainmentFrame").animate({       
					top:'30%',
					left:'70%'
		        });        

		        $(".puzzle").fadeIn(1000);
		        $("#lifeFrame").fadeIn(1000);

			  } else {
			     $(this).animate({
	            	left: '35%',
	            	top: '30%'

		        });
			 
			    $(".puzzle").fadeOut(1000);
			    $("#lifeFrame").fadeOut(1000);
			   
			    $(this).fadeIn(1000);

		       
		  
			  }
			  $(this).data("clicks", !clicks);

	        
	    });
	    
	});

$(".newTitle").keypress(function (event) {
    if (event.which === 13)
    {
        $(".submit-title").click();
    }
});



</script>


@stop

@section('content')
				
		
			
		<div class="container" >
					<!-- 背景 -->
					<div id="groundFrame">
							
					<div id="lifeFrame">
						<img src="img/life/nculife.png">
					</div>
					
		       		<div class="puzzle" id="foodFrame">
		       		<img class="img-responsive btn btn-primary dropdown-toggle" type="button" data-toggle="collapse" data-target="#foodMenu" src="{{ asset('img/life/food.png')  }}">
		       		</div>
		       		<ul class="collapse menu" id="foodMenu">
						@foreach ($food as $food)
						<li><img src="{{ asset('img/life/knife.png')  }}"> <a href="{{action('LifeController@getContent',['food', $food->id])}}">{{ $food->title }}</a></li>
						
					<!--title更改鈕 -->
						<form action="{{ url('life/'.$food->topic.'/'.$food->id).'/update' }}" method="POST">
						     {{ csrf_field() }}
						     {{ method_field('PATCH') }}
						<input type="text" name="title" value="{{ $food->title }}">
						<button class="material-icons">edit</button>
						<button type="submit" class="material-icons">done</button>
						</form>	

						<!-- title刪除紐 -->
						<form action="{{ url('life/'.$food->id) }}" method="POST">
							{!! csrf_field() !!}
	        				{!! method_field('DELETE') !!}
	       					<button type="submit" class="material-icons">delete_forever</button>
	       				</form>
						@endforeach

						<li><img src="{{ asset('img/life/knife.png')  }}">
							<form action="{{ url('life') }}" method="POST">
						    {{ csrf_field() }}
						    <input type="text" name="title">
						    <input type="hidden" name="topic" value="food">
						    <button class="submit-title" type="submit">新增</button>
							</form>
						</li>

					</ul>	
					

					
					<!-- 住 -->
					<div class="puzzle" id="housingFrame">
						<img class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#housingMenu" src="{{ asset('img/life/housing.png')  }}">
					</div>	
						<ul class="collapse menu" id="housingMenu">
							@foreach ($housing as $housing)
							<li><img  src="{{ asset('img/life/cloth.png')  }}"> <a href="{{action('LifeController@getContent',['housing', $housing->id])}}">{{ $housing->title }}</a></li>
							@endforeach
						</ul>
					

					<!-- 行 -->
					<div class="puzzle" id="transportationFrame">
						<img class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#transportationMenu" src="{{ asset('img/life/transportation.png')  }}">
					</div>
						<ul class="collapse menu" id="transportationMenu">
							@foreach ($transportation as $transportation)
							<li><img   src="{{ asset('img/life/transportation.png')  }}"> <a href="{{action('LifeController@getContent',['transportation', $transportation->id])}}">{{ $transportation->title }}</a></li>
							@endforeach
						</ul>
					
					
					<!-- 育 -->
					<div class="puzzle" id="educationFrame">
						<img class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#educationMenu" src="{{ asset('img/life/education.png')  }}">
					</div>
						<ul class="collapse menu" id="educationMenu">
							@foreach ($transportation as $transportation)
							<li><img  src="{{ asset('img/life/foot.png')  }}"> <a href="{{action('LifeController@getContent',['education', $education->id])}}">{{ $education->title }}</a></li>
							@endforeach
						</ul>
					
					
					<!-- 樂 -->
					<div class="puzzle" id="entertainmentFrame">
						<img class="img-responsive btn btn-primary dropdown-toggle" 	 type="button" data-toggle="collapse" data-target="#entertainmentMenu" src="{{ asset('img/life/entertainment.png')  }}">
					</div>
						<ul class="collapse menu" id="entertainmentMenu">
							@foreach ($transportation as $transportation)
							<li><img  src="{{ asset('img/life/pen.png')  }}"> <a href="{{action('LifeController@getContent',['entertainment', $entertainment->id])}}">{{ $entertainment->title }}</a></li>
							@endforeach
						</ul>
					

					</div>
			
		</div>
	
		

@endsection
