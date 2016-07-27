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
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}">
  
</script>
<script type="text/javascript">$('#lfm').filemanager('image');</script>

@stop

@section('content')
<div class="container">
    <div class="input-group">
    <span class="input-group-btn">
      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
        <i class="fa fa-picture-o"></i> Choose
      </a>
    </span>
    <input id="thumbnail" class="form-control" type="text" name="filepath">
  </div>
  <img id="holder" style="margin-top:15px;max-height:100px;">
</div>

@endsection


