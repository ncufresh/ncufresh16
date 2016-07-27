@extends('layouts.layout')

@section('title', '中大生活')

@section('css')
<style>


.cont {
  margin: 0 auto;
  width: 250px;
  height: 0px;
  position: relative;
  perspective: 1000px;
}

.carousel {
  height: 100%;
  width: 100%;
  position: absolute;
  transform-style: preserve-3d;
  transition: transform 1s;
}

.item {
  display: block;
  position: absolute;
  background: #000;
  width: 250px;
  height: 200px;
  line-height: 200px;
  font-size: 5em;
  text-align: center;
  color: #FFF;
  opacity: 0.95;
  border-radius: 10px;
}

.a {
  transform: rotateY(0deg) translateZ(250px);
  background: #b3e5fc;
}
.b {
  transform: rotateY(60deg) translateZ(250px);
  background: #0072bc;
}
.c {
  transform: rotateY(120deg) translateZ(250px);
  background: #39b54a;
}
.d {
  transform: rotateY(180deg) translateZ(250px);
  background: #f26522;
}
.e {
  transform: rotateY(240deg) translateZ(250px);
  background: #630460;
} 
.f {
  transform: rotateY(300deg) translateZ(250px);
  background: #8c6239;
}

.next, .prev {
  position: absolute;
  top: 10%;
  cursor: pointer;
  width: 43px;
    height: 49px;
    margin: auto;
}
.next:hover, .prev:hover { color: #000; }
.next:active, .prev:active {
  top: -101%;
}
.next {right: 0%; }
.prev {left:0%; } 
  

 #foodMenu {
      position:absolute; 
      top:5% ;
      left:-30%; 
   }

   li{
      font-size: 5%;
   }
   li img{
    width: 10%;
    height: auto;

   }


</style>
  
@stop
  
@section('js')

<script type="text/javascript">
  var carousel = $(".carousel"),
    currdeg  = 0;

$(".next").on("click", { d: "n" }, rotate);
$(".prev").on("click", { d: "p" }, rotate);

function rotate(e){
  if(e.data.d=="n"){
    currdeg = currdeg - 60;
  }
  if(e.data.d=="p"){
    currdeg = currdeg + 60;
  }
  carousel.css({
    "-webkit-transform": "rotateY("+currdeg+"deg)",
    "-moz-transform": "rotateY("+currdeg+"deg)",
    "-o-transform": "rotateY("+currdeg+"deg)",
    "transform": "rotateY("+currdeg+"deg)"
  });
}


$(document).ready(function(){ 
 $(window).keydown(function(event){
   switch(event.keyCode) {
  case 38:
    $(".cont").css("height" , $(".cont").height()-20 );
    break;
  case 40:
    $(".cont").css("height" , $(".cont").height()+20 );

  break;
  
   }
 });
});

</script>


@stop

@section('content')
        
     
      
    <div class="container">

         <div class="next glyphicon glyphicon-chevron-right"></div>
          <div class="prev glyphicon glyphicon-chevron-left" ></div>
      <div class="cont">
          <div class="carousel">
            <div class="item a">
                      <img class="img-responsive btn btn-primary dropdown-toggle" type="button" data-toggle="collapse" data-target="#foodMenu" src="{{ asset('img/life/food.png')  }}">
                       <ul class="collapse" id="foodMenu">
                        @foreach ($food as $food)
                        <li><img class="list-deco" src="{{ asset('img/life/knife.png')  }}"> <a href="{{action('LifeController@getContent',['food', $food->id])}}">{{ $food->title }}</a></li>
                        @endforeach
                      </ul> 
                      
          </div>
            <div class="item b">B</div>
            <div class="item c">C</div>
            <div class="item d">D</div>
            <div class="item e">E</div>
            <div class="item f">F</div>
          </div>

 
         
                     
        </div>
        



              

         
         
          
      
        

         <!--  <div class="puzzle" id="housingFrame">
            <img onmouseover="click()" onmouseout="click()"  class="img-responsive btn btn-primary dropdown-toggle"    type="button" data-toggle="collapse" data-target="#housingMenu" src="{{ asset('img/life/housing.png')  }}">

            <ul class="collapse" id="housingMenu">
              @foreach ($housing as $housing)
              <li><img class="list-deco" src="{{ asset('img/life/cloth.png')  }}"> <a href="{{action('LifeController@getContent',['housing', $housing->id])}}">{{ $housing->title }}</a></li>
              @endforeach
            </ul>
          </div> -->
          
        
      
    </div>
  
    

@endsection
