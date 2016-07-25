@extends('layouts.layout')

@section('title','Q&A')

@section('css')
<style type="text/css">
  #logo {
    background-image: url("../img/personal/background.jpg");
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-position: center center;
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
</style>

@stop

@section('js')
@stop

@section('content')

 <div class="container-fluid" id="logo">
          
          <div class="row">
            <div class="col-md-3">
                  <div class="jumbotron">
                  
                  <img src="{{ asset('img/personal/profile.png') }}" class="img-circle" alt="Cinque Terre" width="100%">
                  <h1>{{ Auth::user()->name }}</h1>
                  <h2>XX系</h2>
                  <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.This is  hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                  <p><a class="btn btn-primary btn-lg">Learn more</a></p>
                </div>
            </div>
          </div>
         
</div>
  <a class="fixed" href="{{action('PersonalController@index')}}"><img src="{{ asset('img/personal/plus.png') }}" width="100%"></a>
@endsection


