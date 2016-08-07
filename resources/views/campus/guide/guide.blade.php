@extends('layouts.layout')
@section('title','校園介紹')
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
        text-align: left;
    }
    .btn{
        width: 80px;
    }
    .mapobj{
        position: absolute;
    }    
    .mapobj:hover,.cateBtn:hover{
        -webkit-transform:scale(1.05); /* Safari and Chrome */
        -moz-transform:scale(1.05); /* Firefox */
        -ms-transform:scale(1.05); /* IE 9 */
        -o-transform:scale(1.05); /* Opera */
        transform:scale(1.05);
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
        -webkit-transform:scale(1.2); /* Safari and Chrome */
        -moz-transform:scale(1.2); /* Firefox */
        -ms-transform:scale(1.2); /* IE 9 */
        -o-transform:scale(1.2); /* Opera */
        transform:scale(1.2);
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
            <a href="{{url('/campus/guide')}}" class="btn btn-default">校園介紹</a>

        </div>
    </div>
    <div class=''>
        <h1>校園介紹</h1>
        @can('management')
        <button type="button" class="btn btn-primary" onclick="location.href ='{{url('/campus/newObj')}}'">編輯地圖物件</button>
        @endcan



    </div>
    <div class="jumbotron back row" style="background-color: #c29b77;">

        <img class="cateBtn" src="/img/campus/dontdel/1.png" alt="行政" id="1" value="0">
        <img class="cateBtn" src="/img/campus/dontdel/2.png" alt="系館" id="2" value="0">
        <img class="cateBtn" src="/img/campus/dontdel/3.png" alt="景點" id="3" value="0">
        <img class="cateBtn" src="/img/campus/dontdel/4.png" alt="運動" id="4" value="0">
        <img class="cateBtn" src="/img/campus/dontdel/5.png" alt="飲食" id="5" value="0">
        <img class="cateBtn" src="/img/campus/dontdel/6.png" alt="住宿" id="6" value="0">

        <br>

        <div class="col-md-12 map" >
            <img src='/img/campus/dontdel/back.png' width='100%' id="wbg">
            <img src='/img/campus/dontdel/food.png' width='100%' id="fbg" style="display:none">
            @foreach($mapDatas as $mapData)
            <span data-toggle='modal' data-target="#modal{{$mapData->id}}">
                <img src="/img/campus/{{$mapData->objImg}}" class="cate{{$mapData->building_id}} mapobj" id='build{{$mapData->id}}' bid='{{$mapData->id}}' alt="no found" style="left: {{$mapData->Xcoordinate}}%;top: {{$mapData->Ycoordinate}}%;width: {{$mapData->objWidth}}%;"
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


    <!--Ajax Introduction Modal -->
    <div class="modal fade" id="expModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!--Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close cloMod" data-dismiss="modal">&times;</button>
                    <h2 id="buildingTitle" class="modal-title"></h2>
                </div>

                <div class="modal-body container container1">

                    <div class="objImg">
                        <img class="objImg-big img-rounded" src="\img\campus\dontdel\click.png" alt="not found" id="bigImg" style="width:80%"><br>
                        <div id='imgBox'>
                        </div>                                      
                    </div>

                    <br>
                    <div class="row label-box">
                        <label for="BuildName" id="objlabel" class="col-md-2 control-label">建築物名稱</label>
                        <div class="col-md-9" id="objName">                       
                        </div>
                    </div>
                    <br>
                    <div class="row label-box">
                        <label for="BuildExplain" id="objlabel" class="col-md-2 control-label">建築物描述</label>
                        <div class="col-md-9" id="objExp">                       
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default cloMod" data-dismiss="modal">關閉</button>
                </div>
            </div>

        </div>
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
             chkFood();
        });
        $('body').on('click', '.faa', function () {
            back();
            $(this).css('display', 'none');
             chkFood();
        });
        //取得建築物資料 主頁        
        $('body').on('click', '.mapobj', function () {
            $('.objImg-big').attr('src','\\img\\campus\\dontdel\\click.png');
            var bid = $(this).attr('bid');
            var url = "/campus/guide/getBuild/" + bid;
            $.get(url, function (data) {
                console.log(data[1].length);
                var titDiv = "<h2 id='buildingTitle' class='modal-title'>" + data[0].buildingName + "</h2>"
                $("#buildingTitle").replaceWith(titDiv);

                if (data[1].length != 0) {
                    $("#bigImg").attr('src', '/img/campus/' + data[1][0].imgUrl);
                    var imgs = " <div id='imgBox'>";
                    for (var i = 0; i < data[1].length; i++) {
                        imgs += "<img class='objImg-sam img-rounded' src='/img/campus/" + data[1][i].imgUrl + "' alt='Not found' id='" + data[1][i].id + "'>";
                    }
                    imgs += "</div>";
                    $("#imgBox").replaceWith(imgs);
                } else {
                    var imgs = "<div id='imgBox'></div>";
                    $("#imgBox").replaceWith(imgs);

                }


                var nameDiv = "<div id='objName' class='col-md-9'>" + data[0].buildingName + "</div>";
                $('#objName').replaceWith(nameDiv);
                var expDiv = "<div id='objExp' class='col-md-9'>" + data[0].buildingExplain + "</div>";
                $('#objExp').replaceWith(expDiv);

                $('#expModal').modal('show');
                for (var i = 1; i <= buildNum; i++) {
                    $("#build" + i).tooltip('hide');

                }

            });
             

        });                     
        $('body').on('mouseover', '.mapobj', function () {        
            $(this).tooltip('show');
        });
         $('body').on('mouseout', '.mapobj', function () {        
            $(this).tooltip('hide');
        });
        
        
        
        $('body').on('mouseover', '.cateBtn', function () {
            
            var id = $(this).attr('id');
            $('.cate'+id).tooltip('show');
        });
        $('body').on('mouseout', '.cateBtn', function () {
            
            if($('.faa').css('display') != 'block'){
                $('.mapobj').tooltip('hide');
            }
            
        });

    });
    var buildNum = $('#buildNum').val();
    //將建築物藏起來
    function hide(id) {
        $('.mapobj').tooltip('hide').css('display', 'none').removeClass('buildEff');
        $('.cate'+id).fadeIn(500).addClass('buildEff');
        $('.cate'+id).tooltip('show');    
        $(".faa").fadeIn(500);
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
        $('.mapobj').css('display', 'block').removeClass('buildEff').tooltip('hide');
        $('.cateBtn').attr('value', 0).removeClass("btnEff");
        
    }
    function chkFood(){
        if($("#5").attr("value")==1){
            $("#wbg").css("display","none");
            $("#fbg").css("display","block");
        }else{
            $("#wbg").css("display","block");
            $("#fbg").css("display","none");
        }
    }
</script>
@stop

@endsection
