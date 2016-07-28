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
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script type="text/javascript">$('#lfm').filemanager('image');</script>

@stop

@section('content')
<div class="container">
    
</div>

@endsection


