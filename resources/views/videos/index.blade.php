@extends('layouts.layout')
@section('title', '影音專區')

@section('content')
@section('js')
 
  <script >
/*$(document).ready(function(){
    $(".btn").click(function(){
        $("#myModal").modal('show');
    });

});
$(document).ready(function(){
    $(".btn").click(function(){
        $("#myModal1").modal('show');
    });
});
$(document).ready(function(){
    $(".btn").click(function(){
        $("#myModal2").modal('show');
    });
});
$(document).ready(function(){
    $(".btn").click(function(){
        $("#myModal3").modal('show');
    });
});
$(document).ready(function(){
    $(".btn").click(function(){
        $("#myModal4").modal('show');
    });
});
$(document).ready(function(){
    $(".btn").click(function(){
        $("#myModal5").modal('show');
    });
});*/

var test = <?php echo $videos ?>;
console.log(test[0].videos);
$("#others").append("<div class='item'>"+test[0].videos+"</div>")
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
    left:20%;
    width: 57vw;
}
#fun{
    position: absolute;
    top:40%;
    left:5%;
        width: 70vw;
}
#edu{
    position: absolute;
    top:40%;
    left:35%;
        width: 58vw;
}
#live{
    position: absolute;
    top:42%;
    left:63%;
        width: 56vw;
}
#eat{
    position: absolute;
    top:14%;
    left:55%;
        width: 63vw;
}
#background{
  min-height: 100vh;
  min-width: 100vw;
        position: absolute;
overflow: auto;
}
/*#eat:hover {
height: 250px;
width: 450px;
transform:scale(1.25,1.25);
}

#live:hover {
height: 250px;
width: 450px;
transform:scale(1.25,1.25);
}

#traffic:hover {
height: 250px;
width: 450px;
transform:scale(1.25,1.25);
}
#edu:hover {
height: 250px;
width: 450px;
transform:scale(1.25,1.25);
}
#fun:hover{
height: 300px;
width: 500px;
transform:scale(1.25,1.25);
}
#ncu:hover {
transform:scale(1.2,1.2);
}*/
#frog{
  position: absolute;
  top:750px;
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
.carousel-inner{
  top: 150vh;
  margin-left: 500px;
  position: absolute;
}
.carousel-indicators{
  position: absolute;
    top: 64vh;
}
#iframe{
  margin-top: 262px;
  margin-left: 673px;
 position: absolute;
 z-index: 100;
}
.carousel-control{
    position: absolute;
    top: 50vh;
    width: 30vw;
}
</style>
<body>
   <div id="background">
    <div id="frog">
      <img src="{{ asset('img/videos/frog.png') }}" >
    </div>
    <div id="TV">
      <img src="{{ asset('img/videos/TV.png') }}" style="position:absolute;top:750px;left:1650px;width:200px;" >
    </div>
<div id="sun">
      <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">
      <img src="{{ asset('img/videos/title.png') }}" style="width:500%;" id="ncu"></a>
         <div class="modal fade" id="myModal1" role="dialog">

  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">  
  <!-- Indicators -->         
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
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
</div>
  <div id="traffic">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">
  <img src="{{ asset('img/videos/traffic.png') }}" ></a>
   <div class="modal fade" id="myModal5" role="dialog">
    <div class="video"></div>
    <div id="iframe">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/ym0I7P-Y57c" frameborder="0" allowfullscreen></iframe>
      </div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
    </div>
</div>
<div id="fun">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">
  <img src="{{ asset('img/videos/fun.png') }}"></a>
      <div class="modal fade" id="myModal4" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
    </div>
  </div>
<div id="edu">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">
  <img src="{{ asset('img/videos/edu.png') }}"></a>
    <div class="modal fade" id="myModal2" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
    </div>
  </div>
  <div id="live">
  <a href="{{ url('/videos/live') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
  <img src="{{ asset('img/videos/live.png') }}" ></a>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
    </div>
  </div></div>
<div id="eat">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">
  <img src="{{ asset('img/videos/food.png') }}" ></a>
    <div class="modal fade" id="myModal3" role="dialog">
    <div class="video">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:238px;left:650px;" id="screem">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:1252px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:408px;left:502px;width:150px;">
    </div>
  </div>
  </div>
  <div class="add">
  <a href="{{ url('/videos/create') }}">
  <input type="button" value="新增" style="position:absolute;width:120px;height:100px;border:2px blue none;"></a>
</div>
</div>
</body>

@endsection
