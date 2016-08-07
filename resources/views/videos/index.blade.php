@extends('layouts.layout')
@section('title', '影音專區')

@section('content')
@section('js')
  <script >
    $(document).ready(function(){
     $("#background").fadeIn(1500);
     var strUrl = location.search;
if (strUrl.indexOf("?") !== -1) {
    var getSearch = strUrl.split("?");
    var getString = getSearch[1];
    if(getString.indexOf("&") === -1){
        var getAll = getString.split("=");
        if(getAll[0]==="show"){
            $("#myModal"+getAll[1]).modal('show');
        }
    }
}
   });
    $(".fa-hand-o-down").on('click', function(event) {
        // Prevent default anchor click behavior
        event.preventDefault();
         var hash = this.hash;
        // Using jQuery's animate() method to add smooth page scroll
        $('html, body').stop().animate({
            scrollTop: $('#page2').offset().top - $("nav").height()
        }, "slow", function() {
            window.location.hash = hash;
        });
    });

</script>
@stop

<style>
body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(145,214,234,.8) 100%); }
main { background-image:url("{{asset('img/layout/summer.png')}}"); }

#myModal1,#myModal5,#myModal7,#myModal2,#myModal3,#myModal4,#myModal6{
    background-color: rgba(0, 0, 0, 0.9);
    overflow: scroll;
}

#live{
  position: absolute;
    top:62%;
    left:27%;
    width:10vw;
}
#fun{
    position: absolute;
    top:78%;
    left:9%;

}
#edu{
    position: absolute;
    top:78%;
    left:46%;
}
#traffic{
    position: absolute;
    top:77%;
    left:81%;
}
#eat{
    position: absolute;
    top:62%;
    left:67%;
}
#background{
  min-height: 50vh;
  position: relative;

  display: none;
}
.eat:hover 
{
transform:scale(1.5,1.5);
}

.live:hover 
{
transform:scale(1.5,1.5);
}

.traffic:hover 
{
transform:scale(1.5,1.5);
}
.edu:hover 
{
transform:scale(1.5,1.5);
}
.fun:hover 
{
transform:scale(1.5,1.5);
}
#ncu:hover {
transform:scale(1.5,1.5);
}

#show{
  margin-left: 500px;
  margin-top: 100px;
}

.inner1,.inner2{
  margin-top: 700px;
  text-align:center;
}

/*.movie{
  margin-top: 14.2%;
  margin-left: 35.5%;
  position: absolute;
  z-index: 200;
}*/
.carousel-control{
    position: absolute;
    top: 50vh;
    width: 30vw;
}
/* Slideshow container */
.slideshow-container,.slideshow-container1 {
  position: relative;
  margin: auto;
  z-index: 100;
}

/* Next & previous buttons */
.prev, .next {
  top: 30px;
  cursor: pointer;
  position:absolute;
  width: auto;
  margin-top: 12%;
  margin-left: -12px;
  padding: 90px;
  color: white;
  font-weight: bold;
  font-size: 50px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 25px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot,.dot1 {
  cursor:pointer;
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;

}

@-webkit-keyframes fade {
  from {opacity: 0.4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: 0.4} 
  to {opacity: 1}
}
 .close{
  float: right;
  font-size: 50px;
}

.movie {
  top: 20.5%;
  left: 28.2%;
  max-width: 42.5%;
  display: -webkit-flex;
  display:         flex;
  -webkit-align-items: center;
          align-items: center;
  -webkit-justify-content: center;
          justify-content: center;
  z-index: 999;
  position: absolute;
}
.movie1{
  padding-top:10%;
  left: 30%;
  max-width: 29.5%;
  max-height: 20px;
 /*   display: -webkit-flex;
  display:         flex;
  -webkit-align-items: center;
          align-items: center;
  -webkit-justify-content: center;
          justify-content: center;*/
  z-index: 999;
  position: absolute;
}

.index1,.index2{
  font-family: cursive ;
  font-weight: bold;
  display: inline;
  max-width: 600px;
}
.index1{
  float: left;
  margin-right: 150px;
}
.index2{
  float: right;
}
.btn.btn-lg{
  font-size: 55px;
 
}
.index{
  font-size: 50px;
  position: absolute;
  top: 7%;
}
.indexsmall{
  font-size: 20px;
  position: absolute;
  top: 7%;
}

.series1{
  display: inline;
  float: left;
  margin-left: -5%;
}
.series2{
  display: inline;
  float: left;
  margin-top: -12%;
  margin-left: 95%;
}

.fa-hand-o-down{
  font-size: 90px;
top:40%;
left:50%;
position: absolute;

}
#page1{
  height: 100vh;
}
#page2{
/*  margin-top: 200%;
*/
height: 100vh ;
}
@media(max-width: 768px){
.movie {
  top: 28.5%;
  left: 35.2%;
  display: -webkit-flex;
  display:         flex;
  -webkit-align-items: center;
          align-items: center;
  -webkit-justify-content: center;
          justify-content: center;
  z-index: 999;
  position: absolute;
}
  .prev, .next {
  top: 30px;
  cursor: pointer;
  position:absolute;
  width: auto;
  margin-top: 32%;
  margin-left: -12px;
  padding: 79px;
  color: white;
  font-weight: bold;
  font-size: 40px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;

}
 .close{
  float: right;
  font-size: 30px;
}
.inner1,.inner2{
  margin-top: 700px;
}
.iframe{
  margin-top: 200%;
  left: 35.5%;
  max-width: 29.5%;
  display: -webkit-flex;
  display:         flex;
  -webkit-align-items: center;
          align-items: center;
  -webkit-justify-content: center;
          justify-content: center;
  z-index: 999;
  position: absolute;
}
.btn.btn-lg{
  font-size: 30px;
}
.index2{
  margin-right: 100px;
}

}
@media(max-width:568px){

.movie {
  top: 28.5%;
  left: 35.2%;
  max-width: 35%;
  display: -webkit-flex;
  display:         flex;
  -webkit-align-items: center;
          align-items: center;
  -webkit-justify-content: center;
          justify-content: center;
  z-index: 999;
  position: absolute;
}
    .prev, .next {
  top: 30px;
  cursor: pointer;
  position:absolute;
  width: auto;
  margin-top: 65%;
  margin-left: -5px;
  padding:2px;
  color: white;
  font-weight: bold;
  font-size: 40px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}
.close{
  float: right;
  font-size: 30px;
}
.inner1,.inner2{
  margin-top: 500px;
}
.movie1{
  top: 150px;
  margin-left: 5%;
  width: 20%;
  display: -webkit-flex;
  display:         flex;
  -webkit-align-items: center;
          align-items: center;
  -webkit-justify-content: center;
          justify-content: center;
  position: absolute;
}
.btn.btn-lg{
  font-size: 15px;
}
}

</style>
<body >
   <div id="background">
    <div id="page1">
    <div id="frog">
      <img src="{{ asset('img/videos/frog.png') }}" style="position: absolute;top:40%;width: 10%;left: 2%;" class="hidden-xs hidden-sm">
      <img src="{{ asset('img/videos/frog.png') }}" style="position: absolute;top:43%;width: 10%;left: 2%;" class="visible-sm visible-xs">
      <img src="{{ asset('img/videos/TV.png') }}" style="position:absolute;top:40%;left:86%; width:10%;" class="hidden-xs hidden-sm">
      <img src="{{ asset('img/videos/TV.png') }}" style="position:absolute;top:40%;left:80%; width:20%;" class="visible-sm visible-xs">
      <a href='#page2'><i class="fa fa-hand-o-down" aria-hidden="true"></i></a>
        <div style="position:absolute;top:20%;left:15%;"> 
      <a data-toggle="modal" data-target="#myModal1" >
      <img src="{{ asset('img/videos/series1.png')}}" style="width:26vw;" class="series1 hidden-xs hidden-sm">
      <img src="{{ asset('img/videos/series1.png')}}" style="width:24vw;" class="series1 visible-sm visible-xs">
</a>
<img src="{{ asset('img/videos/ball.png') }}" style="position:absolute;top:-10%;left:60%; width:20%;">
  <a data-toggle="modal" data-target="#myModal6" >
      <img src="{{ asset('img/videos/series2.png')}}" style="width:26vw;" class="series2 hidden-xs hidden-sm">
      <img src="{{ asset('img/videos/series2.png')}}" style="width:30vw;" class="series2 visible-sm visible-xs">
    </a>
         <div class="modal fade " id="myModal1" role="dialog">
          <div class="video">
<button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="index hidden-xs hidden-sm">
      <a data-toggle="modal" data-target="#modal1">1 / 3 大學日常</a>
      <br>
      <a data-toggle="modal" data-target="#modal2">2 / 3 緣。相遇</a>
      <br>
      <a data-toggle="modal" data-target="#modal3">3 / 3 懶惰Laziness</a>
    </div>
    <div class="indexsmall visible-sm visible-xs">
      <a data-toggle="modal" data-target="#modal1">1 / 3 大學日常</a>
      <br>
      <a data-toggle="modal" data-target="#modal2">2 / 3 緣。相遇</a>
      <br>
      <a data-toggle="modal" data-target="#modal3">3 / 3 懶惰Laziness</a>
    </div>

   <div class="modal fade" id="modal1" role="dialog">
    <div class="video ">
      <div class="movie">
<iframe width="1000" height="400"  src="https://www.youtube.com/embed/Xf9QLgI2vH8" frameborder="5" allowfullscreen></iframe>
</div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">    
    </div>
    </div>
   <div class="modal fade" id="modal2" role="dialog">
    <div class="video ">
      <div class="movie">
<iframe width="1000" height="400"  src="https://www.youtube.com/embed/n_PtvUXAYDw" frameborder="5" allowfullscreen></iframe>
</div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">    
    </div>
    </div>
   <div class="modal fade" id="modal3" role="dialog">
    <div class="video ">
      <div class="movie">
<iframe width="1000" height="400"  src="https://www.youtube.com/embed/0Jycxyp4t-E" frameborder="5" allowfullscreen></iframe>
</div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">    
    </div>
    </div>
</div></div>

         <div class="modal fade " id="myModal6" role="dialog">
          <div class="video">
<button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="index">
      <a data-toggle="modal" data-target="#modal4">1 / 4 四人行必有雷隊友</a>
      <br>
      <a data-toggle="modal" data-target="#modal5">2 / 4 如果回到過去</a>
      <br>
      <a data-toggle="modal" data-target="#modal6">3 / 4 分身</a>
      <br>
      <a data-toggle="modal" data-target="#modal7">4 / 4 作夢也可以</a>
    </div>

   <div class="modal fade" id="modal4" role="dialog">
    <div class="video ">
      <div class="movie">
<iframe width="1000" height="400"  src="https://www.youtube.com/embed/agcqwrUG45w" frameborder="5" allowfullscreen></iframe>
</div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">    
    </div>
    </div>
   <div class="modal fade" id="modal5" role="dialog">
    <div class="video ">
      <div class="movie">
<iframe width="1000" height="400"  src="https://www.youtube.com/embed/fJEI-HHQBKw" frameborder="5" allowfullscreen></iframe>
</div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">    
    </div>
    </div>
   <div class="modal fade" id="modal6" role="dialog">
    <div class="video ">
      <div class="movie">
<iframe width="1000" height="400"  src="https://www.youtube.com/embed/ef1F895P93k" frameborder="5" allowfullscreen></iframe>
</div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">    
    </div>
    </div>
       <div class="modal fade" id="modal7" role="dialog">
    <div class="video ">
      <div class="movie">
<iframe width="1000" height="400"  src="https://www.youtube.com/embed/fUkLE43oPlw" frameborder="5" allowfullscreen></iframe>
</div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">    
    </div>
    </div>
</div></div>
</div>
</div></div>
<div id="page2">
  <div id="live">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal5">
  <img src="{{ asset('img/videos/live.png') }}" class="live hidden-xs hidden-sm"style="width:10vw;" >
<img src="{{ asset('img/videos/live.png') }}" class="live visible-sm visible-xs"style="width:17vw;" ></a>
   <div class="modal fade" id="myModal5" role="dialog">
    <div class="video ">
      <div class="numbertext">【中大生活-住】</div>
      <div class="movie">

<iframe width="1000" height="400"  src="https://www.youtube.com/embed/pBPzGfc8cog" frameborder="5" allowfullscreen></iframe>
</div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">    
    </div>
    </div>
</div>
<div id="eat">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal3">
  <img src="{{ asset('img/videos/food.png') }}" class="live hidden-xs hidden-sm"style="width:10vw;" >
<img src="{{ asset('img/videos/food.png') }}" class="live visible-sm visible-xs"style="width:17vw;" ></a>
    <div class="modal fade" id="myModal3" role="dialog">
    <div class="video ">
      <div class="numbertext">【中大生活-食】</div>
      <div class="movie">
      <iframe width="1000" height="400"  src="https://www.youtube.com/embed/bC9iHzxpl44" frameborder="5" allowfullscreen></iframe>
    </div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
    </div>
    </div>
  </div>
<div id="fun">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal4">
  <img src="{{ asset('img/videos/fun.png') }}" class="live hidden-xs hidden-sm"style="width:15vw;" >
<img src="{{ asset('img/videos/fun.png') }}" class="live visible-sm visible-xs"style="width:22vw;" ></a>
      <div class="modal fade" id="myModal4" role="dialog">

    <div class="video ">
      <div class="numbertext">【中大生活-樂】</div>
      <div class="movie">
      <iframe width="1000" height="400" src="https://www.youtube.com/embed/GotOESEaFXc" frameborder="5" allowfullscreen></iframe>
    </div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
    </div>
    </div>
  </div>
<div id="edu">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal2">
  <img src="{{ asset('img/videos/edu.png') }}" class="live hidden-xs hidden-sm"style="width:10vw;" >
<img src="{{ asset('img/videos/edu.png') }}" class="live visible-sm visible-xs"style="width:17vw;" ></a>
    <div class="modal fade" id="myModal2" role="dialog">

    <div class="video ">
      <div class="numbertext">【中大生活-育】</div>
      <div class="movie">
      <iframe width="1000" height="400" src="https://www.youtube.com/embed/GDeJi1N3u1M" frameborder="5" allowfullscreen></iframe>
    </div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
    </div>
  </div></div>
  <div id="traffic">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal">
  <img src="{{ asset('img/videos/traffic.png') }}" class="live hidden-xs hidden-sm"style="width:10vw;" >
<img src="{{ asset('img/videos/traffic.png') }}" class="live visible-sm visible-xs"style="width:17vw;" ></a>

  <div class="modal fade" id="myModal7" role="dialog">
    <div class="video ">
      <div class="numbertext">【中大生活-行】</div>
      <div class="movie">
      <iframe width="1000" height="400"  src="https://www.youtube.com/embed/ltp8phbcSlc" frameborder="5" allowfullscreen></iframe>
    </div>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:17%;left:27%;width:45%;height:54%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:71.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:46%;left:17.5%;width:10%;height:25%;" class="sound hidden-sm hidden-xs">
    </div>
    </div>
  </div>
  </div>
</div></div>
</body>


@endsection
