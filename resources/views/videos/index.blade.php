@extends('layouts.layout')
@section('title', '影音專區')

@section('content')
@section('js')
  <script >
    $(document).ready(function(){
     $("#background").fadeIn(1500);
   });
var slideIndex1 = 1;
showSlides1(slideIndex1);
function plusSlides1(n) {
  showSlides1(slideIndex1 += n);
}
function currentSlide1(n) {
  showSlides1(slideIndex1 = n);
}
function showSlides1(n) {
  var i;
  var slides = document.getElementsByClassName("item");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex1 = 1} 
  if (n < 1) {slideIndex1 = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex1-1].style.display = "block"; 
  dots[slideIndex1-1].className += " active";
}
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("item1");
  var dots = document.getElementsByClassName("dot1");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}
</script>
@stop

<style>
body { background: linear-gradient(to bottom,rgba(145,214,234,.8) 20%,rgb(0, 102, 153) 100%); 
}
main { background-image:url("{{asset('img/layout/summer.png')}}");}

#myModal1,#myModal5,#myModal,#myModal2,#myModal3,#myModal4,#myModal6{
    background-color: rgba(0, 0, 0, 0.9);
    overflow: scroll;
}

#live{
  position: absolute;
    top:16%;
    left:27%;
    width:10vw;
}
#fun{
    position: absolute;
    top:43%;
    left:9%;

}
#edu{
    position: absolute;
    top:43%;
    left:46%;
}
#traffic{
    position: absolute;
    top:42%;
    left:81%;
}
#eat{
    position: absolute;
    top:16%;
    left:67%;
}
#background{
  min-height: 100vh;

  position: relative;
  overflow: auto;
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
  top: 28.5%;
  left: 35.2%;
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
.movie1{
  top: 265px;
  left: 35.6%;
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
.movie1{
  margin-top: 4%;
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
    <div id="frog">
      <img src="{{ asset('img/videos/frog.png') }}" style="position: absolute;top:85%;width: 10%;left: 2%;" class="hidden-xs hidden-sm">
      <img src="{{ asset('img/videos/frog.png') }}" style="position: absolute;top:90%;width: 10%;left: 2%;" class="visible-sm visible-xs">
      <img src="{{ asset('img/videos/TV.png') }}" style="position:absolute;top:80%;left:86%; width:10%;" class="hidden-xs hidden-sm">
      <img src="{{ asset('img/videos/TV.png') }}" style="position:absolute;top:85%;left:86%; width:20%;" class="visible-sm visible-xs">
        <div style="position:absolute;top:83%;left:13%;"> 
          
      <a data-toggle="modal" data-target="#myModal1" >
        <button type="button" class="btn btn-default btn-lg index1">
  <span class="glyphicon glyphicon-triangle-left "aria-hidden="true"></span>更多影片series 1
  </button> </a>
  <a data-toggle="modal" data-target="#myModal6" >
        <button type="button" class="btn btn-default btn-lg index2">更多影片series 2
  <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
</button>
    </a>
         <div class="modal fade " id="myModal1" role="dialog">
      <div class="abc ">      
          <div class="video">
<button type="button" class="close" data-dismiss="modal">&times;</button>

      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26%;left:34%;width:31.5%;height:42%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26.5%;left:28.5%;width:43%;height:38%;" class="visible-sm ">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:65.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:26.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
    
<div class="slideshow-container">
  <div class="item">
    <div class="numbertext">1 / 3 大學日常</div>
        <div class="movie1">
<iframe  src="https://www.youtube.com/embed/Xf9QLgI2vH8" frameborder="5"width="560"height="315" allowfullscreen></iframe>
  </div>
  </div>
  <div class="item">
    <div class="numbertext">2 / 3 緣。相遇</div>
        <div class="movie1">
 <iframe width="560" height="315" src="https://www.youtube.com/embed/n_PtvUXAYDw" frameborder="5" allowfullscreen></iframe>
  </div>
  </div>
  <div class="item">
    <div class="numbertext">3 / 3 懶惰Laziness</div>
        <div class="movie1">
<iframe width="560" height="315" src="https://www.youtube.com/embed/0Jycxyp4t-E" frameborder="5" allowfullscreen></iframe>
  </div>
  </div>

<div class="indicators">
  <a class="prev" onclick="plusSlides1(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides1(1)">&#10095;</a>
</div>
</div>

<br>
<div style="text-align:center" class="inner1">
  <span class="dot" onclick="currentSlide1(1)"></span> 
  <span class="dot" onclick="currentSlide1(2)"></span> 
  <span class="dot" onclick="currentSlide1(3)"></span> 
</div>
</div>
</div>
</div>
         <div class="modal fade " id="myModal6" role="dialog">
      <div class="abc ">      
          <div class="video">
<button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26%;left:34%;width:31.5%;height:42%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26.5%;left:28.5%;width:43%;height:38%;" class="visible-sm ">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:65.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:26.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
    
<div class="slideshow-container1">
  <div class="item1">
    <div class="numbertext">1 / 5 四人行必有雷隊友</div>
    <div class="movie1">
<iframe width="560" height="315" src="https://www.youtube.com/embed/agcqwrUG45w" frameborder="5" allowfullscreen></iframe>
</div>
  </div>

  <div class="item1">
    <div class="numbertext">2 / 5 如果回到過去</div>
        <div class="movie1">
<iframe width="560" height="315" src="https://www.youtube.com/embed/fJEI-HHQBKw" frameborder="5" allowfullscreen></iframe>
  </div></div>

  <div class="item1">
    <div class="numbertext">3 / 5 分身</div>
        <div class="movie1">
<iframe width="560" height="315" src="https://www.youtube.com/embed/ef1F895P93k" frameborder="5" allowfullscreen></iframe>
  </div></div>
    <div class="item1">
    <div class="numbertext">4 / 5 作夢也可以</div>
        <div class="movie1">
<iframe width="560" height="315" src="https://www.youtube.com/embed/fUkLE43oPlw" frameborder="5" allowfullscreen></iframe>
  </div></div>

<div class="indicators">
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
</div>
</div>
<br>
<div style="text-align:center" class="inner2">
  <span class="dot1" onclick="currentSlide(1)"></span> 
  <span class="dot1" onclick="currentSlide(2)"></span> 
  <span class="dot1" onclick="currentSlide(3)"></span> 
  <span class="dot1" onclick="currentSlide(4)"></span> 
</div>
</div>
</div>
</div>
</div>
<div class="row">
  <div id="live">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal5">
  <img src="{{ asset('img/videos/live.png') }}" class="live hidden-xs hidden-sm"style="width:10vw;" >
<img src="{{ asset('img/videos/live.png') }}" class="live visible-sm visible-xs"style="width:17vw;" ></a>
   <div class="modal fade" id="myModal5" role="dialog">
    <div class="video ">
      <div class="numbertext">【中大生活-住】</div>
      <div class="movie">

<iframe width="560" height="315" src="https://www.youtube.com/embed/pBPzGfc8cog" frameborder="5" allowfullscreen></iframe>
</div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26%;left:34%;width:32%;height:42%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26.5%;left:28.5%;width:43%;height:38%;" class="visible-sm ">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:65.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:26.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">        
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
      <iframe width="560" height="315" src="https://www.youtube.com/embed/bC9iHzxpl44" frameborder="5" allowfullscreen></iframe>
    </div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26%;left:34%;width:32%;height:42%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26.5%;left:28.5%;width:43%;height:38%;" class="visible-sm ">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:65.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:26.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
    </div>
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
      <iframe width="560" height="315" src="https://www.youtube.com/embed/GotOESEaFXc" frameborder="5" allowfullscreen></iframe>
    </div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26%;left:34%;width:32%;height:42%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26.5%;left:28.5%;width:43%;height:38%;" class="visible-sm ">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:65.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:26.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
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
      <iframe width="560" height="315" src="https://www.youtube.com/embed/GDeJi1N3u1M" frameborder="5" allowfullscreen></iframe>
    </div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26%;left:34%;width:32%;height:42%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26.5%;left:28.5%;width:43%;height:38%;" class="visible-sm ">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:65.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:26.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
    </div>
  </div></div>
  <div id="traffic">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal">
  <img src="{{ asset('img/videos/traffic.png') }}" class="live hidden-xs hidden-sm"style="width:10vw;" >
<img src="{{ asset('img/videos/traffic.png') }}" class="live visible-sm visible-xs"style="width:17vw;" ></a>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="video ">
      <div class="numbertext">【中大生活-行】</div>
      <div class="movie">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/ltp8phbcSlc" frameborder="5" allowfullscreen></iframe>
    </div>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26%;left:34%;width:32%;height:42%;" class="screem hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:26.5%;left:28.5%;width:43%;height:38%;" class="visible-sm ">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:65.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:44%;left:26.5%;width:8%;height:25%;" class="sound hidden-sm hidden-xs">
    </div>
    </div>
  </div>
  </div>
<!--  <div class="add">
  <a href="{{ url('/videos/create') }}">
  <input type="button" value="新增" style="position:absolute;width:120px;height:100px;border:2px blue none;"></a>
</div>  -->

</body>

@endsection
