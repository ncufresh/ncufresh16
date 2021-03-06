@extends('layouts.layout')
@section('title','新增建築物')
@section('content')

<?php
$i = 1;
$cate = array('', '行政', '系館', '中大景點', '運動', '飲食', '住宿');
$amount = 1;
?>

<style>
    body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%); }
    main { background-image:url("{{asset('img/layout/spring.png')}}"); }

    .imgg{
        text-align: center;
    }
    .imgSize{
        width: 50%;
        height: auto;
    }
    .container{
        display: none;
        font-size: 24px;
    }


</style>
<div class="container">
    <h1>建築物資料</h1>
    <button id="btn-back" name="btn-back" class="btn btn-primary"  onclick="location.href ='{{url('/campus/')}}'">回前頁</button>
    <button id="btn-add" name="btn-add" class="btn btn-primary">新增建築物</button>
    <!--Model For Building-->
    <meta name="_token" content="{!! csrf_token() !!}" />
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">編輯建築物</h4>
                </div>
                <div class="modal-body">

                    <form id="frmBuildings" name="frmBuildings" class="form-horizontal" novalidate="" action="POST" enctype="multipart/form-data" files="true">
                        {{ csrf_field() }}
                        <div class="form-group error">
                            <label for="inputCate" class="col-sm-3 control-label">建築物類別</label>
                            <div class="col-sm-9">
                                <select name="building_id" id="building_id" form="frmBuildings" class="form-control has-error">
                                    <option value="" selected="selected"></option>
                                    @foreach($categorys as $category)
                                    <option value="{{$category->building_id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">建築物名稱</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="buildingName" name="buildingName" value="" required placeholder="名稱">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputExplain" class="col-sm-3 control-label">建築物簡介</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="buildingExplain" name="buildingExplain"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSOS" class="col-sm-3 control-label">附近是否有SOS</label>
                            <div class="col-sm-9">
                                <select name="SOS" id="SOS" form="frmBuildings" class="form-control has-error">
                                    <option value="1">是</option>
                                    <option value="0">否</option>
                                </select>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAED" class="col-sm-3 control-label">附近是否有AED</label>
                            <div class="col-sm-9">
                                <select name="AED" id="AED" form="frmBuildings" class="form-control has-error">
                                    <option value="1">是</option>
                                    <option value="0">否</option>
                                </select>   
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                            <input type="hidden" id="bid" name="bid" value="0">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="jumbotron">
        <table class="table table-striped">
            <caption>已新增之建築物</caption>
            <thead>
                <tr>
                    <th></th>
                    <th>名稱</th>
                    <th>類別</th>
                    <th>介紹</th>
                    <th>圖片</th>
                    <th>編輯</th>
                </tr>
            </thead>

            <tbody id="buildings-list" name="buildings-list">
                @foreach($building as $buildinga)
                <tr id="{{$buildinga->id}}">                   
                    <th></th>
                    <th>{{$buildinga->buildingName}}</th>
                    <th><?php
                        echo $cate[$buildinga->building_id];
                        ?></th>
                    <th><button class="btn btn-warning btn-xs btn-detail" value="{{$buildinga->id}}" data-toggle="modal" data-target="#Exp{{$buildinga->id}}">瀏覽</button></th>
                    <th><button class="btn btn-warning btn-xs btn-detail watchImg" value="{{$buildinga->id}}">瀏覽</button></th>
                    <th>
                        <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$buildinga->id}}">編輯</button>
                        <button class="btn btn-danger btn-xs btn-delete delete-building" value="{{$buildinga->id}}">刪除</button>
                    </th>
                </tr>
                @endforeach
            </tbody>


            <!-- Modal For Img -->
            <div class="modal fade" id="imgModel" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content--> 
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">圖片編輯</h4>
                        </div>
                        <div class="modal-body">
                            <div class="" id="imgList">

                            </div>


                        </div>
                        <div class="modal-footer">
                            <sub>一次只能上傳一張圖片</sub>
                            <form action="#" enctype="multipart/form-data" id="frmImgs" name="frmImgs" files="true" novalidate="">
                                {{ csrf_field() }}
                                <label class="control-label">選擇檔案</label>

                                <div class="input-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-primary">
                                            Browse&hellip; <input type="file" style="display: none;" name="inputImg" id="inputImg" class="imgInputBox"  multiple>
                                        </span>
                                    </label>
                                    <input type="text" class="form-control" class="imgInputBox" readonly>                               
                                </div>
                                <br>
                                <button type="submit" class="btn btn-default newImg" value="">送出</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="expArea">
                @foreach($building as $buildingg)
                <!-- Explain Modal -->
                <div id="Exp{{$buildingg->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">{{$buildingg->buildingName}} 簡介</h4>
                            </div>
                            <div class="modal-body">
                                {!!$buildingg->buildingExplain!!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>


        </table>
    </div>
</div>
@section('js')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
        CKEDITOR.replace('buildingExplain', {
        filebrowserImageBrowseUrl: '{{ url(' / laravel - filemanager?type = Images') }}',
                filebrowserImageUploadUrl: '{{ url(' / ') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '{{ url(' / laravel - filemanager?type = Files') }}',
                filebrowserUploadUrl: '{{ url(' / ') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });</script>
<script>
    function CKupdate(){
    for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();
    CKEDITOR.instances[instance].setData('');
    }
    var cate = ['', '行政', '系館', '中大景點', '運動', '飲食', '住宿'];
    $(document).on('ready', function () {

    $(".container").fadeIn(1000);
    $(document).on('change', ':file', function () {
    var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
    });
    // 新增圖片瀏覽介面
    $(document).ready(function () {
    $(':file').on('fileselect', function (event, numFiles, label) {

    var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
    if (input.length) {
    input.val(log);
    } else {
    if (log)
            alert(log);
    }

    });
    });
    //刪除圖片
    $('body').on('click', '.delBtn', function () {
    if (confirm("確定要刪除？")) {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
    });
    var imgId = $(this).val();
    $.ajax({
    type: "delete",
            url: '/campus/newData/Building/delImg/' + imgId,
            success: function (data) {
            $("#imgg" + imgId).remove();
            console.log("success" + data);
            },
            error: function (data) {
            console.log("error" + data);
            }
    });
    }
    });
    var x = <?php echo $amount ?>;
    var upbid;
    var manyImg;
    //新增圖片
    $('body').on('click', '.newImg', function (e) {

    var imgNum = $(this).val();
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
    });
    e.preventDefault();
    var imgUrl = "newData/Building/newImg/" + imgNum;
    var newImg = new FormData($('#frmImgs')[0]);
    console.log("formData:" + newImg);
    $.ajax({
    type: "post",
            url: imgUrl,
            data: newImg,
            datatype: 'json',
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            success: function (data) {
            console.log("success:" + data);
            var newImg = "<div class='imgg' id='imgg" + data.id + "'><img src='/img/campus/" + data.imgUrl + "' class='img-rounded imgSize'  alt='Building Img'><div class=''><button class='btn btn-danger delBtn' value='" + data.id + "'>刪除</button><span>新增時間：" + data.created_at + "</span></div></div><br>";
            $('#imgList').append(newImg);
            $('input:text').val('');
            $('input:file').val('');
            },
            error: function (data) {
            console.log('dataerror' + data);
            alert("上傳的檔案不符格式!");
            },
    });
    });
    //編輯圖片
    $('body').on('click', '.watchImg', function () {
    var imgid = $(this).val();
    console.log(imgid);
    $('#imgList').empty();
    $('input:text').val('');
    $('input:file').val('');
    $.get(url + '/img/' + imgid, function (data) {
    console.log(data);
    $('.newImg').val(imgid);
    manyImg = "";
    for (var i = 0, l = data.length; i < l; i++) {
    console.log("key" + data[i].imgUrl);
    manyImg += "<div class='imgg' id='imgg" + data[i].id + "'><img src='/img/campus/" + data[i].imgUrl + "' class='img-rounded imgSize'  alt='Building Img'><div class=''><button class='btn btn-danger delBtn' value='" + data[i].id + "'>刪除</button><span>新增時間：" + data[i].created_at + "</span></div></div><br>";
    }
    $('#imgList').append(manyImg);
    $('#imgModel').modal('show');
    });
    });
    //編輯
    $('body').on('click', '.open-modal', function () {

    var bid = $(this).val();
    upbid = bid;
    $.get(url + '/' + bid, function (data) {
    //success data
    console.log(data);
    $('#building_id').val(data.building_id);
    $('#buildingName').val(data.buildingName);
    $('#SOS').val(data.SOS);
    $('#AED').val(data.AED);
    CKEDITOR.instances['buildingExplain'].setData(data.buildingExplain);
    $('#btn-save').val("update");
    $('#myModal').modal('show');
    });
    });
    //刪除
    $('body').on('click', '.delete-building', function () {
    if (confirm("確定要刪除？")) {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
    });
    var bid = $(this).val();
    $.ajax({
    type: "DELETE",
            url: url + '/' + bid,
            success: function (data) {
            console.log(data);
            $("#" + bid).remove();
            },
            error: function (data) {
            console.log('Error:', data);
            }
    });
    }
    });
    //新增建築
    var url = "newData/Building";
    $('#btn-add').click(function () {
    $('#btn-save').val("add");
    $('#frmBuildings').trigger("reset");
    $('#myModal').modal('show');
    });
    $("#btn-save").click(function (e) {


    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
    });
    e.preventDefault();
    CKupdate();
    //取得表單資料
    var formData = {
            buildingName: $('#buildingName').val(),
            building_id: $('#building_id').val(),
            buildingExplain: $('#buildingExplain').val(),
            SOS: $('#SOS').val(),
            AED: $('#AED').val(),
    };
//    console.log(formData);
    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#btn-save').val();
    var type = "POST"; //for creating new resource
    var bid = $('#bid').val();
    var my_url = url;
    if (state == "update") {
    bid = upbid;
    type = "put"; //for updating existing resource            
    my_url += '/edit/' + bid;
    }


    var sendData = $('#come_true_story_edit_form').serialize();
    $.ajax({
    type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            success: function (data) {
            console.log(data);
            var building = '<tr id="' + data.id + '"><th></th><th>' + data.buildingName + '</th><th>' + cate[data.building_id] +
                    '</th><th><button class="btn btn-warning btn-xs btn-detail" value="' + data.id +
                    '" data-toggle="modal" data-target="#Exp' + data.id +
                    '">瀏覽</button></th><th><button class="btn btn-warning btn-xs btn-detail watchImg" value="' + data.id + '">瀏覽</button></th><th><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">編輯</button>' +
                    '<button class="btn btn-danger btn-xs btn-delete delete-building" value="' + data.id + '">刪除</button></th></tr>';
            var newExpMod = '<div id="Exp' + data.id + '" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">' + data.buildingName + ' 簡介</h4></div><div class="modal-body">' + data.buildingExplain + '</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>'
                    if (state == "add") { //if user added a new record
            $('#buildings-list').append(building);
            $('#expArea').append(newExpMod);
            } else { //if user updated an existing record                                       
            $("#" + bid).replaceWith(building);
            $("#Exp" + data.id).replaceWith(newExpMod);
            }

            $('#frmBuildings').trigger("reset");
            $('#myModal').modal('hide');
            x++;
            },
            error: function (data) {

            console.log('Error:', data);
            alert("你輸入的資料未完整");
            }
    });
    });
    });



</script>
@stop


@endsection