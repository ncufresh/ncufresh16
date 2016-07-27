@extends('layouts.layout')
@section('title', '影音專區')

@section('content')
@section('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@stop

<style>

.add{
	margin-top: 4%;
	margin-left: 2%;
}

body{
  background-color: #ccfff3;
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
  z-index:-1 ;
}

#myModal1,#myModal5,#myModal,#myModal2,#myModal3,#myModal4{
    background-color: rgba(0, 0, 0, 0.9);
}

#show{
  margin-left: 473.5px;
  margin-top: 80px;
}

.screem{
  z-index: -1;
  width: 607px;
  height: 390px;
}
</style>
<body>
<div class="traffic">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">
  <img src="{{ asset('img/videos/traffic.png') }}" style="position:absolute;top:180px;left:200px;width:150px;" id="traffic"></a>
   <div class="modal fade" id="myModal5" role="dialog">
    <div class="video"></div>
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:158px;left:450px;" class="screem">
          <div class="add">
  <a href="{{ url('/videos/create') }}">
  <input type="button" value="新增" style="width:120px;height:40px;border:2px blue none;"></a>
</div>
<div id="show">
<iframe width="560" height="315" src="https://www.youtube.com/embed/r5yaoMjaAmE" frameborder="50" allowfullscreen></iframe>
</div>
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:302px;width:150px;">
    </div>
</div>
<div class="fun">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">
  <img src="{{ asset('img/videos/fun.png') }}" style="position:absolute;top:60px;left:380px;width:180px;" id="fun"></a>
      <div class="modal fade" id="myModal4" role="dialog">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:158px;left:450px;" class="screem">
          <div class="add">
  <a href="{{ url('/videos/create') }}">
  <input type="button" value="新增" style="width:120px;height:40px;border:2px blue none;"></a>
</div>
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:302px;width:150px;">
    </div>
  </div>
<div class="edu">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">
  <img src="{{ asset('img/videos/edu.png') }}" style="position:absolute;top:260px;left:1050px;width:150px;" id="edu"></a>
    <div class="modal fade" id="myModal2" role="dialog">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:158px;left:450px;" class="screem">
          <div class="add">
  <a href="{{ url('/videos/create') }}">
  <input type="button" value="新增" style="width:120px;height:40px;border:2px blue none;"></a>
</div>
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:302px;width:150px;">
    </div>
  </div>
<div class="live">
  <a href="{{ url('/videos/live') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
  <img src="{{ asset('img/videos/live.png') }}" style="position:absolute;top:280px;left:370px;width:150px;" id="live"></a>
  <div class="modal fade" id="myModal" role="dialog">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:158px;left:450px;" class="screem">
          <div class="add">
  <a href="{{ url('/videos/create') }}">
  <input type="button" value="新增" style="width:120px;height:40px;border:2px blue none;"></a>
</div>
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:302px;width:150px;">
    </div>
  </div>
<div class="eat">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">
  <img src="{{ asset('img/videos/food.png') }}" style="position:absolute;top:-30px;left:980px;width:185px;" id="eat"></a>
    <div class="modal fade" id="myModal3" role="dialog">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:158px;left:450px;" class="screem">
          <div class="add">
  <a href="{{ url('/videos/create') }}">
  <input type="button" value="新增" style="width:120px;height:40px;border:2px blue none;"></a>
</div>
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:302px;width:150px;">
    </div>
  </div>
  
  </div>
<div class="ncu">
  <a href="{{ url('#') }}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">
  <img src="{{ asset('img/videos/ncuvideo.png') }}" style="position:absolute;top:120px;left:670px;width:141px;" id="ncu"></a>
  <div class="modal fade" id="myModal1" role="dialog">
      <img src="{{ asset('img/videos/screem.png')}}"style="position:absolute;top:158px;left:450px;" class="screem">
          <div class="add">
  <a href="{{ url('/videos/create') }}">
  <input type="button" value="新增" style="width:120px;height:40px;border:2px blue none;"></a>
</div>
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:1052px;width:150px;">
      <img src="{{ asset('img/videos/sound.png')}}"style="position:absolute;top:328px;left:302px;width:150px;">
    </div>
  </div>
<div class="sun">
  <img src="{{ asset('img/videos/TV.png') }}" style="position:absolute;top:120px;left:539px;width:420px;">



</body>
  {{ csrf_field() }}

@endsection