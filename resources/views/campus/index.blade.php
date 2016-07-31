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
       
        background-image: url("/img/campus/dontdel/index1.png");
        background-repeat:no-repeat;
        background-size:cover;
    }
    .font{
        background-color: #d9ff66;
        height: 500px;
        border-style: solid ;
        border-color: #0000e6;
    }
    .tit{
        width: 49%;
    }
    .container{
        display: none;
        font-size: 24px;
    }
    .imgg:hover{
         -webkit-transform:scale(1.1); /* Safari and Chrome */
        -moz-transform:scale(1.1); /* Firefox */
        -ms-transform:scale(1.1); /* IE 9 */
        -o-transform:scale(1.1); /* Opera */
        transform:scale(1.1);
    }
    .mapobj{
        position: absolute;
    }
    .mapobj:hover,.cateBtn:hover{
        -webkit-transform:scale(1.25); /* Safari and Chrome */
        -moz-transform:scale(1.25); /* Firefox */
        -ms-transform:scale(1.25); /* IE 9 */
        -o-transform:scale(1.25); /* Opera */
        transform:scale(1.25);
    }
    
    .modal-body{
        text-align: center;
                
    }
</style>

<div class="container">
    <!--網頁路徑-->
    <div>
        <a href="{{url('/')}}">首頁</a>
        >
        <a href="{{url('/campus')}}">校園介紹</a>
    </div>
    <button type="button" class="btn btn-primary" onclick="location.href ='{{url('/campus/newData')}}'">編輯建築物</button>
    
    <div class="back row jumbotron">
        <a href="{{url('campus/guide')}}"><img class="tit imgg" src="\img\campus\dontdel\map.png" alt="map"></a>
        <a href="" data-toggle="modal" data-target="#myModal"><img class="tit imgg" src="\img\campus\dontdel\fire.png" alt="map"></a>
    </div>
        <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">校園防災</h4>
          </div>
          <div class="modal-body">
            <div class="map" >
                <img src="/img/campus/dontdel/background.png" alt="no found" style="width:100%">
            @foreach($mapobjects as $mapobject)
            <span>
                <img src="/img/campus/{{$mapobject->objImg}}" class="cate{$mapobject->building_id}} imgg mapobj" id='build{{$mapobject->id}}' bid='{{$mapobject->id}}' alt="no found" value="{{$mapobject->building_id}}" style="left: {{$mapobject->Xcoordinate}}%;top: {{$mapobject->Ycoordinate}}%;width: {{$mapobject->objWidth}}%;"
                     data-toggle='tooltip' data-placement='top' title="{{$mapobject->buildingName}}">
            </span>
            @endforeach
            
            <img class="faa" src='/img/campus/dontdel/left.png' width='' style="display:none">
            
           
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
          </div>
        </div>

      </div>
    </div>
</div>


@section('js')

<script>

    $(document).on('ready', function(){
    $(".container").fadeIn(1000);
   
//   $('.modal-body').css('max-height',$(document).height());
//   $('.modal-body').css('max-width',$(document).width());
   $('.modal-body').css('height',$(document).height()-500);
   $('.modal-dialog').css('width',$(document).width()-500);
    });
</script>
@stop




@endsection
