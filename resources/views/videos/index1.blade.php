@extends('layouts.layout')
@section('title', '影音專區')

@section('content')
@section('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
/* window.onload=function(){
    $("#title").animate({
            top: '60px',
            left:'580px',
            height: '+=150px',
            width: '+=250px',
            speed:"slow",
        });
    $("#traffic").animate({
            top: '320px',
            left:'120px',
            height: '+=60px',
            width: '+=50px',
            speed:"slow",
        });
    $("#live").animate({
            top: '430px',
            left:'300px',
            height: '+=25px',
            width: '+=25px',
            speed:"slow",
        });
     $("#fun").animate({
            top: '170px',
            left:'330px',
            height: '+=30px',
            width: '+=30px',

        });
     $("#edu").animate({
            top: '400px',
            left:'1200px',
            height: '+=10px',
            width: '+=10px',
 
        });
     $("#eat").animate({
            top: '90px',
            left:'1100px',
            height: '+=25px',
            width: '+=25px',

        });
 } 
$('.carousel').carousel({
    interval: false
}); 
*/
var test = <?php echo $videos ?>;
console.log(test[0].videos);
$("#other").append("<div class='item'>"+test[0].videos+"</div>")
$("")
</script>
@stop

<style>

body { background: linear-gradient(to bottom,rgba(145,214,234,.8) 20%,rgb(0, 102, 153) 100%); 
}
body{
  -webkit-background-size: cover;
  overflow-x: hidden;
  background-attachment: fixed;
  background-position: center center;
  display: block;
}
main { background-image:url("{{asset('img/layout/summer.png')}}"); }
/*.add{

	margin-left: 2%;
}


#eat:hover {
transform: translate(10px, 10px);
transform:scale(1.5,1.5);
}

#live:hover {

transform: translate(10px, 10px);
transform:scale(1.5,1.5);
}

#traffic:hover {
  width: 400px;
  height: 200px;
transform: translate(10px, 10px);
transform:scale(1.5,1.5);
}
#edu:hover {
  width: 320px;
  height: 170px;
transform: translate(10px, 10px);
transform:scale(1.5,1.5);
}
#fun:hover{
  width: 300px;
  height: 150px;
transform: translate(10px, 10px);
transform:scale(1.5,1.5);
}
#ncu:hover {
transform:scale(1.2,1.2);
}


#myModal1,#myModal5,#myModal,#myModal2,#myModal3,#myModal4{
    background-color: rgba(0, 0, 0, 0.9);
}

#show{
  margin-left: 473.5px;
  margin-top: 80px;
}

.screem{

  width: 607px;
  height: 390px;
}


.carousel-inner{
  margin-top: 250px;
  margin-left: 500px;
}
.carousel-indicators{
  margin-top: 400px;
}
#sun {
  z-index:2 ;
position: relative;
margin-top: 3%;
margin-bottom: 0%;
margin-left: 42%;
width: 20%;
}
.ncu{
  z-index: 3;
  position:absolute;
width: 350%;
margin-top: -350%;
margin-left: 60%;
}
#traffic{
  padding-top: 60%;
  padding-left: 35%;
  width: 60%;
}
#fun{
  position: absolute;
  padding-top: 30%;
  padding-left: 50%;
  width: 50%;
}
#edu{

  width: 25%;
  left: 25%;
}
#live{

  width: 25%;
}
#eat{

  width: 25%;
}
#background{
        position: relative;
        overflow-y: auto;

}*/
</style>
<body>
  <div id="background">
<!--<div class="traffic">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">
  <img src="{{ asset('img/videos/traffic.png') }}"  id="traffic"></a>
   <div class="modal fade" id="myModal5" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:450px;" class="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:302px;width:150px;">
    </div>
</div>
<div class="fun">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">
  <img src="{{ asset('img/videos/fun.png') }}"  id="fun"></a>
      <div class="modal fade" id="myModal4" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:450px;" class="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:302px;width:150px;">
    </div>
  </div>
<div class="edu">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">
  <img src="{{ asset('img/videos/edu.png') }}"  id="edu"></a>
    <div class="modal fade" id="myModal2" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:450px;" class="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:302px;width:150px;">
    </div>
  </div>
<div class="live">
  <a href="{{ url('/videos/live') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
  <img src="{{ asset('img/videos/live.png') }}"  id="live"></a>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:450px;" class="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:302px;width:150px;">
    </div>
  </div>
<div class="eat">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">
  <img src="{{ asset('img/videos/food.png') }}"  id="eat"></a>
    <div class="modal fade" id="myModal3" role="dialog">
    <div class="video">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:450px;" class="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:302px;width:150px;">
    </div>
  </div>
  
  </div>
-->
  <div class="modal fade" id="myModal1" role="dialog">

  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">  
  <!-- Indicators -->         
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:-25px;left:477px;" class="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:145px;left:1080px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:145px;left:328px;width:150px;">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div id="other" class="carousel-inner" role="listbox">
    <div class="item active">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/cFvLq3rPeTk" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="item">
    </div>
    <div class="item">
    </div>
    <div class="item">
    </div>
    <div class="item">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div></div></div>

<div id="sun">
  <img src="{{ asset('img/videos/TV.png') }}" style="width:20%" >
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">
  <img src="{{ asset('img/videos/ncuvideo.png') }}"  class="ncu"></a>
</div>
</div>
</div>
<!--          <div class="add">
  <a href="{{ url('/videos/create') }}">
  <input type="button" value="新增" style="width:120px;height:40px;border:2px blue none;"></a>
</div>
-->
<!--<div>
  <img src="{{ asset('img/videos/frog.png') }}" style="position:absolute;top:580px;left:10px;width:250px;" >
</div>
-->
</body>

@endsection
