@extends('layouts.layout')
@section('title', '影音專區')

@section('content')
@section('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
  window.onload=function(){
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
var test = <?php echo $videos ?>;
console.log(test[0].videos);
$("#other").append("<div class='item'>"+test[0].videos+"</div>")
</script>
@stop

<style>

body { background: linear-gradient(to bottom,rgba(145,214,234,.8) 20%,rgb(0, 102, 153) 100%); }
main { background-image:url("{{asset('img/layout/summer.png')}}"); }

.add{

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
.sun img{
  position:absolute;
  z-index:2 ;
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

#title{
  position:absolute;
  z-index: 1;
}
.ncu{
  position:absolute;
  z-index: 3;
}
.carousel-inner{
  margin-top: 250px;
  margin-left: 500px;
}
.carousel-indicators{
  margin-top: 400px;
}
</style>
<body>
  <div class="title">
    <img src="{{ asset('img/videos/title.png') }}" style="position:absolute;top:500px;left:715px;width:100px;" id="title">
  </div>

<div class="traffic">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">
  <img src="{{ asset('img/videos/traffic.png') }}" style="position:absolute;top:500px;left:715px;width:100px;" id="traffic"></a>
   <div class="modal fade" id="myModal5" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:450px;" class="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:302px;width:150px;">
    </div>
</div>
<div class="fun">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">
  <img src="{{ asset('img/videos/fun.png') }}" style="position:absolute;top:450px;left:715px;width:180px;" id="fun"></a>
      <div class="modal fade" id="myModal4" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:450px;" class="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:302px;width:150px;">
    </div>
  </div>
<div class="edu">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">
  <img src="{{ asset('img/videos/edu.png') }}" style="position:absolute;top:300px;left:715px;width:150px;" id="edu"></a>
    <div class="modal fade" id="myModal2" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:450px;" class="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:302px;width:150px;">
    </div>
  </div>
<div class="live">
  <a href="{{ url('/videos/live') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
  <img src="{{ asset('img/videos/live.png') }}" style="position:absolute;top:300px;left:700px;width:120px;" id="live"></a>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:450px;" class="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:302px;width:150px;">
    </div>
  </div>
<div class="eat">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">
  <img src="{{ asset('img/videos/food.png') }}" style="position:absolute;top:300px;left:700px;width:170px;" id="eat"></a>
    <div class="modal fade" id="myModal3" role="dialog">
    <div class="video">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:450px;" class="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:302px;width:150px;">
    </div>
  </div>
  
  </div>
<div class="ncu">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">
  <img src="{{ asset('img/videos/ncuvideo.png') }}" style="position:absolute;top:280px;left:680px;width:160px;" id="ncu"></a></div>
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
<div class="sun">
  <img src="{{ asset('img/videos/TV.png') }}" style="position:absolute;top:250px;left:525px;width:500px;" ></div>
          <div class="add">
  <a href="{{ url('/videos/create') }}">
  <input type="button" value="新增" style="width:120px;height:40px;border:2px blue none;"></a>
</div>
<div>
  <img src="{{ asset('img/videos/frog.png') }}" style="position:absolute;top:580px;left:10px;width:250px;" >
</div>
</body>

@endsection
