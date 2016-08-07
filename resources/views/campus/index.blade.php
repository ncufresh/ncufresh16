@extends('layouts.layout')
@section('title','校園導覽')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#guide").mouseenter(function () {
            $("#guide").css("background-color", "#ffff4d");
        });
        $("#guide").mouseleave(function () {
            $("#guide").css("background-color", "#d9ff66");
        });
        $("#firefight").mouseenter(function () {
            $("#firefight").css("background-color", "#ffff4d");
        });
        $("#firefight").mouseleave(function () {
            $("#firefight").css("background-color", "#d9ff66");
        });
    });
</script>
<style>
    body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%); }
    main { background-image:url("{{asset('img/layout/spring.png')}}"); }

    .back{
        

        background-image: url("/img/campus/dontdel/index.png");
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
    /** The Magic **/
    .btn-breadcrumb .btn:not(:last-child):after 
    {
        content: " ";
        display: block;
        width: 0;
        height: 0;
        border-top: 17px solid transparent;
        border-bottom: 17px solid transparent;
        border-left: 10px solid white;
        position: absolute;
        top: 50%;
        margin-top: -17px;
        left: 100%;
        z-index: 3;
    }

    .btn-breadcrumb .btn:not(:last-child):before 
    {
        content: " ";
        display: block;
        width: 0;
        height: 0;
        border-top: 17px solid transparent;
        border-bottom: 17px solid transparent;
        border-left: 10px solid rgb(173, 173, 173);
        position: absolute;
        top: 50%;
        margin-top: -17px;
        margin-left: 1px;
        left: 100%;
        z-index: 3;
    }

    /** The Spacing **/
    .btn-breadcrumb .btn 
    {
        padding:6px 12px 6px 24px;
    }
    .btn-breadcrumb .btn:first-child
    {
        padding:6px 6px 6px 10px;
    }
    .btn-breadcrumb .btn:last-child
    {
        padding:6px 18px 6px 24px;
    }

    /** Default button **/
    .btn-breadcrumb .btn.btn-default:not(:last-child):after 
    {
        border-left: 10px solid #fff;
    }
    .btn-breadcrumb .btn.btn-default:not(:last-child):before
    {
        border-left: 10px solid #ccc;
    }
    .btn-breadcrumb .btn.btn-default:hover:not(:last-child):after
    {
        border-left: 10px solid #ebebeb;
    }
    .btn-breadcrumb .btn.btn-default:hover:not(:last-child):before 
    {
        border-left: 10px solid #adadad;
    }
</style>

<div class="container">
    <!--網頁路徑-->    
    <div class="row">	
        <div class="btn-group btn-breadcrumb">
            
            <a href="{{url('/')}}" class="btn btn-default">首頁</a>
            <a href="{{url('/campus')}}" class="btn btn-default">校園導覽</a>

        </div>
    </div>
    <div class=''>
        <h1>校園導覽</h1>
    </div>
    @can('management')
    <button type="button" class="btn btn-primary" onclick="location.href ='{{url('/campus/newData')}}'">編輯建築物</button>
    @endcan
    <div class="back row jumbotron" >
        <a href="{{url('campus/guide')}}"><img class="tit imgg" src="\img\campus\dontdel\map.png" alt="map"></a>
        <a href="{{url('campus/help')}} "><img class="tit imgg" src="\img\campus\dontdel\fire.png" alt="map"></a>
    </div>
    
</div>


@section('js')

<script>

    $(document).on('ready', function () {
        $(".container").fadeIn(1000);

//   $('.modal-body').css('max-height',$(document).height());
//   $('.modal-body').css('max-width',$(document).width());
        $('.modal-body').css('height', $(document).height() - 500);
        $('.modal-dialog').css('width', $(document).width() - 500);
    });
</script>
@stop




@endsection
