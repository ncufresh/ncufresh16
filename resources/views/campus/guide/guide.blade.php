@extends('layouts.layout')
@section('title','校園介紹')
@section('content')

<style>
    body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%); }
    main { background-image:url('../img/home/spring.png'); }

    .modal-body {
        position: relative;
        overflow-y: auto;
        max-height: 5000px;
        padding: 15px;
    }
    .btn{
        width: 80px;
    }
    .mapobj{
        position: absolute;
    }
    .cateBtn:hover{

    }
    .mapobj:hover,.cateBtn:hover{
        -webkit-transform:scale(1.25); /* Safari and Chrome */
        -moz-transform:scale(1.25); /* Firefox */
        -ms-transform:scale(1.25); /* IE 9 */
        -o-transform:scale(1.25); /* Opera */
        transform:scale(1.25);
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
    .container{
        font-size: 24px;
        display: none;
    }
    .cateBtn{
        width: 12%;
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
    .fa{
        position: absolute;
        left: 10%;
        top: 10%;
        width: 5%
    }
    .fa:hover{
         -webkit-transform:scale(1.2); /* Safari and Chrome */
        -moz-transform:scale(1.2); /* Firefox */
        -ms-transform:scale(1.2); /* IE 9 */
        -o-transform:scale(1.2); /* Opera */
        transform:scale(1.2);
    }
    .jumbotron{
        background-image: url("/img/campus/dontdel/containBack3.png");
        background-repeat:no-repeat;
        background-size:cover;
    }
    .QQ1{
        position: absolute;
        left: 80%;
        top: 8%;
        width: 15%
    }
    .QQ2{
        position: absolute;
        left: 10%;
        top: 80%;
        width: 15%
    }

</style>

<script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>
<div class="container">
    <!--網頁路徑-->
    <div>
        <a href="{{url('/')}}">首頁</a>
        >
        <a href="{{url('/campus')}}">校園導覽</a>
        >
        <a href="{{url('/campus/guide')}}">校園介紹</a>
    </div>
    <div class=''>
        <h1>校園介紹</h1>
        <button type="button" class="btn btn-primary" onclick="location.href ='{{url('/campus/newData')}}'">編輯建築物</button>
        <button type="button" class="btn btn-primary" onclick="location.href ='{{url('/campus/newObj')}}'">編輯地圖物件</button>
    </div>
    <div class="jumbotron back row">

        <img class="cateBtn" src="/img/campus/dontdel/1.png" alt="行政" id="1" value="0">
        <img class="cateBtn" src="/img/campus/dontdel/2.png" alt="系館" id="2" value="0">
        <img class="cateBtn" src="/img/campus/dontdel/3.png" alt="景點" id="3" value="0">
        <img class="cateBtn" src="/img/campus/dontdel/4.png" alt="運動" id="4" value="0">
        <img class="cateBtn" src="/img/campus/dontdel/6.png" alt="飲食" id="5" value="0">
        <img class="cateBtn" src="/img/campus/dontdel/5.png" alt="住宿" id="6" value="0">
        
        <br>

        <div class="col-md-12 map" >
            <img src='/img/campus/dontdel/background.png' width='95%'>
            @foreach($mapDatas as $mapData)
            <span data-toggle='modal' data-target="#modal{{$mapData->id}}">
                <img src="/img/campus/{{$mapData->objImg}}" class="cate{$mapData->building_id}} mapobj" id='build{{$mapData->id}}' bid='{{$mapData->id}}' alt="no found" value="{{$mapData->building_id}}" style="left: {{$mapData->Xcoordinate}}%;top: {{$mapData->Ycoordinate}}%;width: {{$mapData->objWidth}}%;"
                     data-toggle='tooltip' data-placement='top' title="{{$mapData->buildingName}}">

            </span>
            @endforeach
            <input type="hidden" value="{{$mapDatas[count($mapDatas)-1]->id}}" id="buildNum">
            <img class="fa" src='/img/campus/dontdel/left.png' width='' style="display:none">
            <img class="QQ1" src='/img/campus/dontdel/Q1.png'>
            <img class="QQ2" src='/img/campus/dontdel/Q2.png'>
           
        </div>
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

            <div class="modal-body container">

                <div class="objImg">
                    <img class="objImg-big img-rounded" src="\img\campus\dontdel\click.png" alt="not found" id="bigImg"><br>
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
@section('js')

<script>
    var selectBtn = 0;
//    更換圖片
    $(document).on('ready', function(){
        $(".container").fadeIn(3000);
        $('body').on('click', '.objImg-sam', function(){
            var imgId = $(this).attr('id');
            var imgSrc = $(this).attr('src');
            $('#bigImg').attr('src', imgSrc);
        });
        $('body').on('click', '.cloMod', function(){
            var imgId = $(this).val();
            $('#bigImg' + imgId).attr('src', "/img/campus/dontdel/click.png");
        });
        $('body').on('click', '.cateBtn', function(){
            var id = $(this).attr('id');
            $(this).attr('value', 1);
            $('#' + selectBtn).attr('value', 0);
            btnChange();
            hide(id);
            selectBtn = id;
        });
        $('body').on('click', '.fa', function(){
            back();
            $(this).css('display','none');
        });
        //取得建築物資料 主頁        
        $('body').on('click', '.mapobj', function(){
            
            var bid = $(this).attr('bid');
            var url="/campus/guide/getBuild/"+bid;
            $.get(url,function(data){
                console.log(data[1].length);
                var titDiv = "<h2 id='buildingTitle' class='modal-title'>"+data[0].buildingName+"</h2>"
                $("#buildingTitle").replaceWith(titDiv);
                
                if(data[1].length!=0){
                    $("#bigImg").attr('src','/img/campus/'+data[1][0].imgUrl);
                    var imgs = " <div id='imgBox'>";                
                    for(var i=0;i<data[1].length;i++){
                        imgs += "<img class='objImg-sam img-rounded' src='/img/campus/"+data[1][i].imgUrl+"' alt='Not found' id='"+data[1][i].id+"'>";
                    }
                    imgs += "</div>";                
                    $("#imgBox").replaceWith(imgs);  
                }else{
                    var imgs ="<div id='imgBox'></div>";
                     $("#imgBox").replaceWith(imgs);  
                    
                }
                
                
                var nameDiv = "<div id='objName' class='col-md-9'>"+data[0].buildingName+"</div>";
                $('#objName').replaceWith(nameDiv);
                var expDiv = "<div id='objExp' class='col-md-9'>"+data[0].buildingExplain+"</div>";
                 $('#objExp').replaceWith(expDiv);
                 
                 $('#expModal').modal('show');
                 for (var i = 1; i <= buildNum; i++){
                 $("#build" + i).tooltip('hide');
                 
                 }
                
            });
            
        });
        
    });
    var buildNum = $('#buildNum').val();
    //將建築物藏起來
    function hide(id){
    
    for (var i = 1; i <= buildNum; i++){

    if ($("#build" + i).attr('value') == id){
    $("#build" + i).css('display', 'block');
    $("#build" + i).tooltip('show');
    $('#build' + i).addClass('buildEff');
    } else{
    $("#build" + i).tooltip('hide');
    $("#build" + i).css('display', 'none');
    $('#build' + i).removeClass('buildEff');
    }
    }
    $(".fa").css('display','block');
    }
    //顯示按鈕特效
    function btnChange(){
    for (var i = 1; i <= 6; i++){

    if ($("#" + i).attr('value') == '1'){
    $("#" + i).addClass("btnEff");
    } else{
    $("#" + i).removeClass("btnEff");
    }
    }
    }
    function back(){
        for (var i = 1; i <= buildNum; i++){
            $("#build" + i).css('display', 'block');
            $('#build' + i).removeClass('buildEff');
            $("#build" + i).tooltip('hide');
            $('#' + i).attr('value', 0);
            $("#" + i).removeClass("btnEff");
        }
    }
</script>
@stop

@endsection
