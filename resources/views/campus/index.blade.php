@extends('layouts.layout')
@section('title','校園導覽')
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
    body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%); }
    main { background-image:url("{{asset('img/layout/spring.png')}}"); }

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
    img{
        width: 49%;
    }
    .container{
        display: none;
        font-size: 24px;
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
        <a href="{{url('campus/guide')}}"><img src="\img\campus\dontdel\map.png" alt="map"></a>
        <a ><img src="\img\campus\dontdel\fire.png" alt="map"></a>
    </div>
</div>

@section('js')

<script>

    $(document).on('ready', function(){
    $(".container").fadeIn(1000);
   
    });
</script>
@stop




@endsection
