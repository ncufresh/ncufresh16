@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#guide").mouseenter(function(){
            $("#guide").css("background-color","#ffff4d");
        });
        $("#guide").mouseleave(function(){
            $("#guide").css("background-color","#d9ff66");
        });
        $("#firefight").mouseenter(function(){
            $("#firefight").css("background-color","#ffff4d");
        });
        $("#firefight").mouseleave(function(){
            $("#firefight").css("background-color","#d9ff66");
        });
    });
</script>
<style>
    .back{
        background-color: #b3d9ff;
        border-style: solid ;
        border-color: #80bfff;
    }
    .font{
        background-color: #d9ff66;
        height: 500px;
        border-style: solid ;
        border-color: #0000e6;
    }
</style>

<div class="container">
    <!--網頁路徑-->
    <div>
        <a href="{{url('/')}}">首頁</a>
        >
        <a href="{{url('/campus')}}">校園介紹</a>
    </div>
    <div class="back row jumbotron">
        <a href="{{url('campus/guide')}}"><div class="font col-md-3 col-md-offset-2" id="guide">校園導覽</div></a>
        <div class="font col-md-3 col-md-offset-2" id="firefight">校園消防</div>
    </div>
</div>






@endsection
