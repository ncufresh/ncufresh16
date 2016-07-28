<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <title>個人專區</title>
    {{-- mete區 --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- 引入Styles --}}
    <link rel="stylesheet" href="{{ asset('include/bootstrap/css/bootstrap.min.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('include/font-awesome/css/font-awesome.min.css') }}" media="screen">
    {{-- Material Design fonts --}}
    {{--<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">--}}
    {{--<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/icon?family=Material+Icons">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('include/bootstrap-material/fonts/family-roboto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('include/bootstrap-material/fonts/family-material-icons.css') }}">
    {{-- Bootstrap Material Design --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('include/bootstrap-material/css/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('include/bootstrap-material/css/ripples.min.css') }}">
    {{-- 個人Styles --}}
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <style type="text/css">
.fixed {
  position: fixed;
  bottom: 0;
  left: 90%;
}
#text{
   height: 1000px;
}



@import url(http://fonts.googleapis.com/css?family=Roboto);


.wrapper {
  height: 100%;
  transition: all 300ms ease-in-out;  
  margin: 1em 0;
  padding: 0;
}
.menu {
  font-size:2em;
  font-family: 'Roboto', sans-serif;
  color: #333;
}

.menu div {
  margin: 1em;
  padding-bottom: 1em;
  border-bottom: 1px solid #ccc;
}

.menu div:last-child {
  border: 0;
}

.menu--off {
  position: absolute;
  left: -50%;
  width: 30%;
  display: block;
  background: #eee;
  min-height: 300px;
  height: 100%;
  margin-top: 1em;
  transition: all 300ms;
}

.menu--on {
  left: 0;
  box-shadow: 8px 8px 20px 0 rgba(0, 0, 0, 0.2);
  transition: all 300ms;
}

.material-design-hamburger button {
  display: block;
  border: none;
  background: none;
  outline: 0;
}

.material-design-hamburger__icon {
  padding: 3rem 1rem;
  cursor: pointer;
}

.material-design-hamburger__layer {
  display: block;
  width: 100px;
  height: 10px;
  background: #000;
  position: relative;
  animation-duration: 300ms;
  animation-timing-function: ease-in-out;
}

.material-design-hamburger__layer:before, .material-design-hamburger__layer:after {
  display: block;
  width: inherit;
  height: 10px;
  position: absolute;
  background: inherit;
  left: 0;
  content: '';
  animation-duration: 300ms;
  animation-timing-function: ease-in-out;
}

.material-design-hamburger__layer:before {
  bottom: 200%;
}

.material-design-hamburger__layer:after {
  top: 200%;
}

.material-design-hamburger__icon--to-arrow {
  animation-name: material-design-hamburger__icon--slide;
  animation-fill-mode: forwards;
}

.material-design-hamburger__icon--to-arrow:before {
  animation-name: material-design-hamburger__icon--slide-before;
  animation-fill-mode: forwards;
}

.material-design-hamburger__icon--to-arrow:after {
  animation-name: material-design-hamburger__icon--slide-after;
  animation-fill-mode: forwards;
}

.material-design-hamburger__icon--from-arrow {
  animation-name: material-design-hamburger__icon--slide-from;
}

.material-design-hamburger__icon--from-arrow:before {
  animation-name: material-design-hamburger__icon--slide-before-from;
}

.material-design-hamburger__icon--from-arrow:after {
  animation-name: material-design-hamburger__icon--slide-after-from;
}

@keyframes material-design-hamburger__icon--slide {
  0% {
  }
  100% {
    transform: rotate(180deg);
  }
}

@keyframes material-design-hamburger__icon--slide-before {
  0% {
  }
  100% {
    transform: rotate(45deg);
    margin: 3% 37%;
    width: 75%;
  }
}

@keyframes material-design-hamburger__icon--slide-after {
  0% {
  }
  100% {
    transform: rotate(-45deg);
    margin: 3% 37%;
    width: 75%;
  }
}

@keyframes material-design-hamburger__icon--slide-from {
  0% {
    transform: rotate(-180deg);
  }
  100% {
  }
}

@keyframes material-design-hamburger__icon--slide-before-from {
  0% {
    transform: rotate(45deg);
    margin: 3% 37%;
    width: 75%;
  }
  100% {
  }
}

@keyframes material-design-hamburger__icon--slide-after-from {
  0% {
    transform: rotate(-45deg);
    margin: 3% 37%;
    width: 75%;
  }
  100% {
  }
}
body {
  background-image: url({{asset('upload/background/'.Auth::user()->background)}});
  background-repeat: no-repeat;
}

</style>

</head>
<body>

@include('layouts.navbar')
    <main>
    <br><br><br>
<section class="wrapper">

  <section class="material-design-hamburger">
    <button class="material-design-hamburger__icon">
      <span class="material-design-hamburger__layer"></span>
    </button>
  </section>

  <section class="menu menu--off">
    <div><img src="{{asset('upload/avatars/'.Auth::user()->avatar)}}" class="img-circle" alt="Cinque Terre" height="300px" width="300px"></div>
    <div> <h1>{{ Auth::user()->name }}</h1></div>
    <div><h2>XX系</h2></div>
  </section>
</section>

     
      <a class="fixed"  data-toggle="modal" data-target="#myModal"><img src="{{ asset('img/personal/plus.png') }}" width="100%"></a>
    </main>


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
        <form class="form-horizontal" enctype="multipart/form-data" action="{{action('UserController@updateBackground') }}" method="POST">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="inputFile" class="col-md-2 control-label">更新個人相片</label>
                <div class="col-md-10">
                    <input type="text" readonly="" class="form-control" placeholder="找尋電腦上的檔案...">
                    <input type="file" name="background" id="inputFile">
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

    {{-- JavaScripts --}}
    <script src="{{ asset('include/jquery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('include/jquery/jquery.ujs.js') }}"></script>
    <script src="{{ asset('include/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('include/bootstrap-material/js/material.min.js') }}"></script>
    <script src="{{ asset('include/bootstrap-material/js/ripples.min.js') }}"></script>
    <script src="{{ asset('js/layout.js') }}"></script>
   

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
    
</body>
</html>
