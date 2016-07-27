@extends('layouts.layout')

@section('title','Q&A')

@section('css')
<style type="text/css">
  #logo {
    background-image: url("../img/personal/background.png");
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-position: 120px center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    /*text-align: center;*/
    color: black; /* 字的顏色 */
     
}
.fixed {
  position: fixed;
  bottom: 0;
  left: 90%;
}
#text{
   height: 1000px;
}
</style>

@stop

@section('js')
@stop

@section('content')
<div>
 <div class="container-fluid" id="logo">    
<div class="row">
            <div class="col-xs-3">
                <div class="jumbotron" id="text">
                  <img src="{{ asset('img/personal/profile.png') }}" class="img-circle" alt="Cinque Terre" width="100%">
                  <h1>{{ Auth::user()->name }}</h1>
                  <h2>XX系</h2>
                  
                </div>
            </div>
          </div>
</div>
</div>

  <a class="fixed" href="{{action('PersonalController@create')}}"><img src="{{ asset('img/personal/plus.png') }}" width="100%"></a>
@endsection


