@extends('personal.layout')
@section('title','個人專區')
@section('css')
<style type="text/css">
.fixed {
  position: fixed;
  bottom: 0;
  left: 90%;
  cursor:pointer;
}
#text{
   height: 1000px;
}
body {
  background-image: url({{asset('upload/background/'.$user->background)}});
  background-repeat: no-repeat;
  background-size:100% 100%;

}
.fixedd {
  position: fixed;
  bottom: 77%;
  left: 0;
}
.fixeddd{
  position: fixed;
  bottom: 0;
  left: 0%;
}
*{
  font-family:微軟正黑體;
}
@media (max-width: 500px) {
  .fixed {
  position: fixed;
  bottom: 0;
  left: 70%;
  width:30%;
  cursor:pointer;
}
}

</style>
@include('personal.hamburger')
@stop
@section('content')
<div class="container">
     <br><br><br>
<section class="wrapper">

  <section class="material-design-hamburger fixedd" style="z-index:100;">
    <button class="material-design-hamburger__icon">
      <span class="material-design-hamburger__layer"></span>
    </button>
  </section>

  <section class="menu menu--off" style="z-index:20;">
    <div><img src="{{asset('upload/avatars/'.$user->avatar)}}" class="img-circle" alt="Cinque Terre" height="100%" width="100%"></div>
    <div  height="100%" width="100%"> <h1>{{ $user->name }}</h1></div>
    <div><h2>{{$user->unit}}</h2></div>
    <div><h3>{{$user->intro}}</h3></div>
  </section>
</section>
     
      <a class="fixed"  data-toggle="modal" data-target="#myModal"><img src="{{ asset('img/personal/plus.png') }}" width="100%"></a>
      <a class="btn btn-info btn-raised fixeddd" href="{{action('PersonalController@viewOther')}}">別人的專區</a>
    
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">上傳背景</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="{{action('PersonalController@updateBackground') }}" method="POST">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="inputFile" class="col-md-2 control-label">更新個人相片</label>
                <div class="col-md-10">
                    <input type="text" readonly="" class="form-control" placeholder="找尋電腦上的檔案...">
                    <input type="file" name="background" id="inputFile" required>
                </div>
            </div>
        
        </div>
        <div class="modal-footer">
        <input type="submit" class="btn btn-lg btn-raised btn-primary" value="更新">  
          <button type="button" class="btn btn-default btn-raised" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
      
</div>
@endsection

@section('js')
   <script type="text/javascript">
    (function() {

  'use strict';

  document.querySelector('.material-design-hamburger__icon').addEventListener(
    'click',
    function() {      
      var child;
      
      document.body.classList.toggle('background--blur');
      this.parentNode.nextElementSibling.classList.toggle('menu--on');

      child = this.childNodes[1].classList;

      if (child.contains('material-design-hamburger__icon--to-arrow')) {
        child.remove('material-design-hamburger__icon--to-arrow');
        child.add('material-design-hamburger__icon--from-arrow');
      } else {
        child.remove('material-design-hamburger__icon--from-arrow');
        child.add('material-design-hamburger__icon--to-arrow');
      }

    });

})();
   </script>
@stop