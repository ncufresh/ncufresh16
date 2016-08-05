@extends('layouts.layout')
@section('title','校園防災')
@section('content')

<style>
    body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%); }
    main { background-image:url("{{asset('img/layout/spring.png')}}"); }

    .modal-body {
        position: relative;
        overflow-y: auto;
        max-height: 5000px;
        max-width: 1000px;
        padding: 15px;
    }
    .btn{
        width: 80px;
    }
    .mapobj{
        position: absolute;
    }    
    .mapobj:hover,.cateBtn:hover{
        -webkit-transform:scale(1.5); /* Safari and Chrome */
        -moz-transform:scale(1.5); /* Firefox */
        -ms-transform:scale(1.5); /* IE 9 */
        -o-transform:scale(1.5); /* Opera */
        transform:scale(1.5);
    }
    .cateBtn{

        margin-left: 10px;
        margin-right: 10px;

    }
    .label-box{
        height: 50px;
    }
    #objlabel{
        margin: 0px;
        font-size: 20px;
    }
    .map{
        text-align: center;
        width: 100%;
    }
    .btn{
        width: auto;
    }
    .modal{
        text-align: center;
    }
    .objImg{
        text-align: center;
    }
    .objImg-sam{
        width: 5%;
    }
    .objImg-big{
        width: 40%;

    }

    .back{
        text-align: center;
    }
    .container1{
        font-size: 24px;
        display: none;
        width: auto;
    }
    .cateBtn{
        width: 11%;
    }
    .btnEff{
        -webkit-transform:scale(1.1); /* Safari and Chrome */
        -moz-transform:scale(1.1); /* Firefox */
        -ms-transform:scale(1.1); /* IE 9 */
        -o-transform:scale(1.1); /* Opera */
        transform:scale(1.1);
    }
    .buildEff{
        -webkit-transform:scale(1.2); /* Safari and Chrome */
        -moz-transform:scale(1.2); /* Firefox */
        -ms-transform:scale(1.2); /* IE 9 */
        -o-transform:scale(1.2); /* Opera */
        transform:scale(1.2);
    }
    .faa{
        position: absolute;
        left: 10%;
        top: 10%;
        width: 5%
    }
    .faa:hover{
        -webkit-transform:scale(1.1); /* Safari and Chrome */
        -moz-transform:scale(1.1); /* Firefox */
        -ms-transform:scale(1.1); /* IE 9 */
        -o-transform:scale(1.1); /* Opera */
        transform:scale(1.1);
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

<script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>
<br>
<br>
<div class="container-fluid">
   
    <br><br>
    
    <!--網頁路徑-->    
    <div class="row">	
        <div class="btn-group btn-breadcrumb">

            <a href="{{url('/')}}" class="btn btn-default">首頁</a>
            <a href="{{url('/campus')}}" class="btn btn-default">校園導覽</a>
            <a href="{{url('/campus/help')}}" class="btn btn-default">校園防災</a>

        </div>
    </div>
    <div class=''>
        <h1>校園防災</h1>
    </div>
    <div class="jumbotron back row" style="background-color: #c29b77;">

        <img class="cateBtn" src="/img/campus/dontdel/11.png" alt="SOS" id="1" value="0">
        <img class="cateBtn" src="/img/campus/dontdel/22.png" alt="AED" id="2" value="0">
       

        <br>

        <div class="col-md-12 map" >
            <img src='/img/campus/dontdel/background3.png' width='100%'>
            @foreach($mapDatas as $mapData)
            <span data-toggle='modal' data-target="#modal{{$mapData->id}}">
                <img src="/img/campus/{{$mapData->objImg}}" class="cate{$mapData->building_id}} mapobj" id='build{{$mapData->id}}' SOS="{{$mapData->SOS}}" AED="{{$mapData->AED}}" alt="no found" value="{{$mapData->building_id}}" style="left: {{$mapData->Xcoordinate}}%;top: {{$mapData->Ycoordinate}}%;width: {{$mapData->objWidth}}%;"
                     data-toggle='tooltip' data-placement='top' title="{{$mapData->buildingName}}">

            </span>
            @endforeach
            <?php
            if (count($mapDatas) > 0) {
                ?>
                <input type="hidden" value="{{$mapDatas[count($mapDatas)-1]->id}}" id="buildNum">
                <?php
            }
            ?>
            <img class="faa" src='/img/campus/dontdel/left.png' width='' style="display:none">
           
        </div>
    </div>


    


@section('js')

<script>
    var selectBtn = 0;
//    更換圖片
    $(document).on('ready', function () {
        $(".container").fadeIn(3000);
        $('body').on('click', '.objImg-sam', function () {
            var imgId = $(this).attr('id');
            var imgSrc = $(this).attr('src');
            $('#bigImg').attr('src', imgSrc);
        });
        $('body').on('click', '.cloMod', function () {
            var imgId = $(this).val();
            $('#bigImg' + imgId).attr('src', "/img/campus/dontdel/click.png");
        });
        $('body').on('click', '.cateBtn', function () {
            var id = $(this).attr('id');
            $(this).attr('value', 1);
            $('#' + selectBtn).attr('value', 0);
            btnChange();
            hide(id);
            selectBtn = id;
        });
        $('body').on('click', '.faa', function () {
            back();
            $(this).css('display', 'none');
        });
        
        $('body').on('mouseover', '.mapobj', function () {        
            $(this).tooltip('show');
        });
         $('body').on('mouseout', '.mapobj', function () {        
            $(this).tooltip('hide');
        });
        $('body').on('mouseover', '.cateBtn', function () {
            var id = $(this).attr('id');
            for (var i = 1; i <= buildNum; i++) {
                if ($("#build" + i).attr('value') == id) {

                    $("#build" + i).tooltip('show');

                }
            }
        });
        $('body').on('mouseout', '.cateBtn', function () {
            var id = $(this).attr('id');
            for (var i = 1; i <= buildNum; i++) {
                if ($("#build" + i).attr('value') == id) {

                    $("#build" + i).tooltip('hide');

                }
            }
        });

    });
    var buildNum = $('#buildNum').val();
    //將建築物藏起來
    function hide(id) {

        for (var i = 1; i <= buildNum; i++) {

            if ($("#build" + i).attr('value') == id) {
                $("#build" + i).css('display', 'block');
                $("#build" + i).tooltip('show');
                $('#build' + i).addClass('buildEff');
            } else {
                $("#build" + i).tooltip('hide');
                $("#build" + i).css('display', 'none');
                $('#build' + i).removeClass('buildEff');
            }
        }
        $(".faa").css('display', 'block');
    }
    //顯示按鈕特效
    function btnChange() {
        for (var i = 1; i <= 6; i++) {

            if ($("#" + i).attr('value') == '1') {
                $("#" + i).addClass("btnEff");
            } else {
                $("#" + i).removeClass("btnEff");
            }
        }
    }
    function back() {
        for (var i = 1; i <= buildNum; i++) {
            $("#build" + i).css('display', 'block');
            $('#build' + i).removeClass('buildEff');
            $("#build" + i).tooltip('hide');

        }
        for (i = 1; i <= 6; i++) {
            $('#' + i).attr('value', 0);
            $("#" + i).removeClass("btnEff");
        }
    }
</script>
@stop

@endsection
