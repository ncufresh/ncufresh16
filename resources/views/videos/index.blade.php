@extends('layouts.layout')
@section('title', '影音專區')

@section('content')
@section('js')
 
  <script >
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
  var slides = document.getElementsByClassName("item");
  var dots = document.getElementsByClassName("dot");
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

/*var test = <?php echo $videos ?>;
console.log(test[0].videos);
$("#others").append("<div class='item'>"+"<iframe>"+test[0].videos+"</iframe>"+"</div>");*/
</script>
@stop

<style>
body { background: linear-gradient(to bottom,rgba(145,214,234,.8) 20%,rgb(0, 102, 153) 100%); 

}
main { background-image:url("{{asset('img/layout/summer.png')}}");

 }

#myModal1,#myModal5,#myModal,#myModal2,#myModal3,#myModal4{
    background-color: rgba(0, 0, 0, 0.9);
    overflow: scroll;
}
img{
  width: 50%;
}
#sun{
  position: absolute;
    top:2vh;
    left:0%;

}
#ncu{
  position: absolute;
    top:78vh;
    left:15vw;
}
#traffic{
    position: absolute;
    top:12%;
    left:29%;
    width: 20vw;
}
#fun{
    position: absolute;
    top:40%;
    left:14%;
    width: 30vw;
}
#edu{
    position: absolute;
    top:40%;
    left:47%;
        width: 20vw;
}
#live{
    position: absolute;
    top:42%;
    left:80%;
        width: 20vw;
}
#eat{
    position: absolute;
    top:15%;
    left:64%;
    width: 20vw;
}
#background{
  min-height: 100vh;
  min-width: 98vw;
  position: absolute;
overflow: hidden;
}
.eat:hover {
transform:scale(1.5,1.5);
}

.live:hover{
transform:scale(1.5,1.5);
}

.traffic:hover{
transform:scale(1.5,1.5);
}
.edu:hover{
transform:scale(1.5,1.5);
}
.fun:hover{
transform:scale(1.5,1.5);
}
#ncu:hover {
transform:scale(1.2,1.2);
}
#frog{
  position: absolute;
  top:730px;
  width: 25%;
  left: 20px;
}
#show{
  margin-left: 500px;
  margin-top: 100px;
}

#screem{
  width: 607px;
  height: 390px;
}
.inner{
  margin-top: 700px;
  text-align:center;
}

#iframe{
  margin-top: 262px;
  margin-left: 673px;
 position: absolute;
 z-index: 200;
}
.carousel-control{
    position: absolute;
    top: 50vh;
    width: 30vw;
}
/* Slideshow container */
.slideshow-container {
  position: relative;
  margin: auto;
  z-index: 100;
}

/* Next & previous buttons */
.prev, .next {
    top: 30vh;  
  cursor: pointer;
  position:absolute;
  width: auto;
  margin-top: -22px;
  margin-left: -12px;
  padding: 96px;
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
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
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

</style>
<body>
   <div id="background">
    <div id="frog">
      <img src="{{ asset('img/videos/frog.png') }}" >
    </div>
    <div id="TV">
      <img src="{{ asset('img/videos/TV.png') }}" style="position:absolute;top:700px;left:1645px;width:200px;" >
    </div>
<div id="sun">
      <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">
      <img src="{{ asset('img/videos/title.png') }}" style="width:500%;" id="ncu"></a>
         <div class="modal fade" id="myModal1" role="dialog">
          <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
      <div>
<div class="slideshow-container">
  <div class="item">
    <div class="numbertext">1 / 5</div>
    <div id="iframe">

    </div>
  </div>

  <div class="item">
    <div class="numbertext">2 / 5</div>
    <div id="iframe">
 
    </div>
  </div>

  <div class="item">
    <div class="numbertext">3 / 5</div>
    <div id="iframe">

    </div>
  </div>
    <div class="item">
    <div class="numbertext">4 / 5</div>
    <div id="iframe">

    </div>
  </div>
    <div class="item">
    <div class="numbertext">5 / 5</div>
    <div id="iframe">

    </div>
  </div>
<div class="indicators">
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
</div>
</div>
<br>

<div style="text-align:center" class="inner">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
</div>
</div>
</div>
  <div id="traffic">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal5">
  <img src="{{ asset('img/videos/traffic.png') }}" class="traffic"></a>
   <div class="modal fade" id="myModal5" role="dialog">
    <div class="video"></div>
    <div id="iframe">

      </div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
    </div>
</div>
<div id="fun">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal4">
  <img src="{{ asset('img/videos/fun.png') }}" class="fun"></a>
      <div class="modal fade" id="myModal4" role="dialog">
    <div class="video"></div>
        <div id="iframe">
 
      </div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
    </div>
  </div>
<div id="edu">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal2">
  <img src="{{ asset('img/videos/edu.png') }}"  class="edu"></a>
    <div class="modal fade" id="myModal2" role="dialog">
    <div class="video"></div>
        <div id="iframe">
 
      </div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
    </div>
  </div>
  <div id="live">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal">
  <img src="{{ asset('img/videos/live.png') }}" class="live"></a>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="video"></div>
        <div id="iframe">
 
      </div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
    </div>
  </div>
<div id="eat">
  <a href="{{ url('#') }}" data-toggle="modal" data-target="#myModal3">
  <img src="{{ asset('img/videos/food.png') }}" class="eat"></a>
    <div class="modal fade" id="myModal3" role="dialog">
    <div class="video"></div>
        <div id="iframe">

      </div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
    </div>
  </div>
  </div>
<!--  <div class="add">
  <a href="{{ url('/videos/create') }}">
  <input type="button" value="新增" style="position:absolute;width:120px;height:100px;border:2px blue none;"></a>
</div>  -->
</div>
</body>

@endsection
