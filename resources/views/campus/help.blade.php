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
        -webkit-transform:scale(1.1); /* Safari and Chrome */
        -moz-transform:scale(1.1); /* Firefox */
        -ms-transform:scale(1.1); /* IE 9 */
        -o-transform:scale(1.1); /* Opera */
        transform:scale(1.1);
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
        width: 15%;
    }
    .btnEff{
        -webkit-transform:scale(1.1); /* Safari and Chrome */
        -moz-transform:scale(1.1); /* Firefox */
        -ms-transform:scale(1.1); /* IE 9 */
        -o-transform:scale(1.1); /* Opera */
        transform:scale(1.1);
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
    <div class="jumbotron back row" style="background-color: rgba(0,0,0,0); border: 0;box-shadow: none;">

        <img class="cateBtn SOS" src="/img/campus/dontdel/SOS.png" alt="SOS" value="0">
        <img class="cateBtn AED" src="/img/campus/dontdel/AED.png" alt="AED" value="0">
       

        <br>

        <div class="col-md-12 map">
            <img src='/img/campus/dontdel/back.png' width='100%'>
            @foreach($mapDatas as $mapData)
            <span data-toggle='modal' data-target="#modal{{$mapData->id}}">
                <img src="/img/campus/{{$mapData->objImg}}" class=" mapobj SOS{{$mapData->SOS}} AED{{$mapData->AED}}" id='build{{$mapData->id}}' alt="no found" style="left: {{$mapData->Xcoordinate}}%;top: {{$mapData->Ycoordinate}}%;width: {{$mapData->objWidth}}%;"
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
            
            <img src="/img/campus/dontdel/SOS1.png" class=" mapobj SOS1 AED0"alt="no found" style="left:31%;top:30%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="SOS">
            <img src="/img/campus/dontdel/SOS1.png" class=" mapobj SOS1 AED0"alt="no found" style="left:19%;top:39%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="SOS">
            <img src="/img/campus/dontdel/SOS1.png" class=" mapobj SOS1 AED0"alt="no found" style="left:23%;top:44.5%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="SOS">
            <img src="/img/campus/dontdel/SOS1.png" class=" mapobj SOS1 AED0"alt="no found" style="left:31%;top:53%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="SOS">
            <img src="/img/campus/dontdel/SOS1.png" class=" mapobj SOS1 AED0"alt="no found" style="left:27%;top:74%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="SOS">
            <img src="/img/campus/dontdel/SOS1.png" class=" mapobj SOS1 AED0"alt="no found" style="left:40.5%;top:25%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="SOS">
            <img src="/img/campus/dontdel/SOS1.png" class=" mapobj SOS1 AED0"alt="no found" style="left:55%;top:27%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="SOS">
            <img src="/img/campus/dontdel/SOS1.png" class=" mapobj SOS1 AED0"alt="no found" style="left:83%;top:63%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="SOS">
            <img src="/img/campus/dontdel/SOS1.png" class=" mapobj SOS1 AED0"alt="no found" style="left:69%;top:79%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="SOS">
            <img src="/img/campus/dontdel/SOS1.png" class=" mapobj SOS1 AED0"alt="no found" style="left:37%;top:41%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="SOS">

            
            <img src="/img/campus/dontdel/AED1.png" class=" mapobj AED1 SOS0"alt="no found" style="left:36%;top:45%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="AED">
            <img src="/img/campus/dontdel/AED1.png" class=" mapobj AED1 SOS0"alt="no found" style="left:54%;top:25%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="AED">
            <img src="/img/campus/dontdel/AED1.png" class=" mapobj AED1 SOS0"alt="no found" style="left:64.5%;top:47%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="AED">
            <img src="/img/campus/dontdel/AED1.png" class=" mapobj AED1 SOS0"alt="no found" style="left:76%;top:48%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="AED">
            <img src="/img/campus/dontdel/AED1.png" class=" mapobj AED1 SOS0"alt="no found" style="left:74%;top:75%;width:1.8%;" data-toggle='tooltip' data-placement='top' title="AED">

           
        </div>
    </div>


    


@section('js')

<script>
    var selectBtn = 0;

    $(document).on('ready', function () {
        $(".container").fadeIn(3000);
        
        
        $('body').on('click', '.SOS', function () {     
            $('.SOS1').addClass('buildEff').fadeIn(500).tooltip('show');          
            $('.SOS0').css('display','none').tooltip('hide');
            $('.SOS').addClass('btnEff');
            $('.AED').removeClass('btnEff');
            $('.faa').css('display','block');
        });
         $('body').on('click', '.AED', function () {     
            $('.AED1').addClass('buildEff').fadeIn(500).tooltip('show');            
            $('.AED0').css('display','none').tooltip('hide');
            $('.AED').addClass('btnEff');
            $('.SOS').removeClass('btnEff');
            $('.faa').css('display','block');
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
        $('body').on('mouseover', '.SOS', function () {                       
                $(".SOS1").tooltip('show');
            
        });
        
        $('body').on('mouseover', '.AED', function () {                       
                $(".AED1").tooltip('show');
            
        });
        
       


    });
    var buildNum = $('#buildNum').val();
    
   
    function back() {
        
            $(".SOS1").css('display', 'block');
            $(".SOS0").css('display', 'block');
            $(".SOS1").removeClass('buildEff');
            $(".SOS0").removeClass('buildEff');
            $(".SOS1").tooltip('hide');
            $(".SOS0").tooltip('hide');
        
            $('.SOS').removeClass("btnEff");
            $('.AED').removeClass("btnEff");
        
        
    }
</script>
@stop

@endsection
