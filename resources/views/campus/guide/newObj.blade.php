@extends('layouts.layout')

@section('content')

<script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>
<style>
    
    img{
        width: 50%;
    }
</style>
<div class="container">
    <h1>地圖物件</h1>
    <button id="btn-back" name="btn-back" class="btn btn-raised btn-primary"  onclick="location.href='{{url('/campus/guide')}}'">回前頁</button>
    <button id="newObj" name="newObj" class="btn btn-primary">新增地圖物件</button>
    
    <meta name="_token" content="{!! csrf_token() !!}" />
  <!-- New Object Model -->
  <div class="modal fade" id="mapObjModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">新增地圖物件</h4>
                        </div>
                        <div class="modal-body">
                            
                            <form id="mapObjfrm" name="mapObjfrm" class="form-horizontal" novalidate="" action="POST" enctype="multipart/form-data" files="true">
                                <div class="form-group">
                                    <label for="inputCate" class="col-sm-3 control-label">建築物名稱</label>
                                    <div class="col-sm-9">
                                        <select name="Building_id" id="Building_id" form="mapObjfrm" class="form-control ">
                                            <option value="" selected="selected"></option>                                            
                                            @foreach($building as $building)
                                            <option value="{{$building->id}}">{{$building->buildingName}}</option>
                                            @endforeach
                                        </select>                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputX座標" class="col-sm-3 control-label">建築物X座標</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="Xcoordinate" name="Xcoordinate" value="" required placeholder="請輸入X座標">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputY座標" class="col-sm-3 control-label">建築物Y座標</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="Ycoordinate" name="Ycoordinate" value="" required placeholder="請輸入Y座標">
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputExplain" class="col-sm-3 control-label">圖片寬度</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="objWidth" name="objWidth" value="" required placeholder="請輸入圖片寬度">
                                    </div>
                                </div>
                                
                                <div class="form-group is-empty is-fileinput fileUpload">
                                    <label for="inputImg" class="col-sm-3 control-label">圖片</label>
                                    <input type="file" id="objImg" multiple="" name="objImg">
                                    <div class="input-group">
                                      <input type="text" readonly="" class="form-control" placeholder="請選擇檔案">
                                        <span class="input-group-btn input-group-sm">
                                          <button type="button" class="btn btn-fab btn-fab-mini">
                                            <i class="material-icons">attach_file</i>
                                          </button>
                                        </span>
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
   <!-- Edit Object Model -->
  <div class="modal fade" id="editObjModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">編輯物件</h4>
                        </div>
                        <div class="modal-body">
                            
                            <form id="editObjfrm" name="editObjfrm" class="form-horizontal" novalidate="" action="POST" >
                                <div class="form-group">
                                    <label for="inputX座標" class="col-sm-3 control-label">建築物X座標</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="edXcoordinate" name="edXcoordinate" value="" required placeholder="請輸入X座標">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputY座標" class="col-sm-3 control-label">建築物Y座標</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="edYcoordinate" name="edYcoordinate" value="" required placeholder="請輸入Y座標">
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputExplain" class="col-sm-3 control-label">圖片寬度</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="edobjWidth" name="edobjWidth" value="" required placeholder="請輸入圖片寬度">
                                    </div>
                                </div>
                                                              
                                 <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-update" value="add">Save changes</button>
                                    <input type="hidden" id="edbid" name="edbid" value="0">
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
                    
                    <th>名稱</th>
                    <th>X座標</th>
                    <th>Y座標</th>
                    <th>寬度</th>
                    <th>圖片</th>
                    <th>編輯</th>
                </tr>
            </thead>
            
            <tbody id="objects-list" name="buildings-list">
                @foreach($mapData as $mapData)
                <tr id="{{$mapData->id}}">                   
                    
                    <th>{{$mapData->buildingName}}</th>
                    <th id="{{$mapData->id}}x">{{$mapData->Xcoordinate}}</th>
                    <th id="{{$mapData->id}}y">{{$mapData->Ycoordinate}}</th>
                    <th id="{{$mapData->id}}w">{{$mapData->objWidth}}</th>
                    <th><img src="/img/campus/{{$mapData->objImg}}" alt="{{$mapData->buildingName}}"></th>
                    <th>
                        <button class="btn btn-warning btn-xs btn-detail editObj" value="{{$mapData->id}}">Edit</button>
                        <button class="btn btn-danger btn-xs btn-delete deleteObj" value="{{$mapData->id}}">Delete</button>
                    </th>
               </tr>
                @endforeach
            </tbody>
            
           
        </table>
    </div>
</div>
<script>
    
    
      var url = "/campus/newObj/createObj";
      $(document).on('ready',function(){
          
          //刪除
        $('body').on('click','.deleteObj',function(){
            if(confirm("確定要刪除？")){
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
        //更新
        $('body').on('click','#btn-update',function(e){
            var bid = $('#edbid').val();
            
            console.log(bid);
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            e.preventDefault();
            var upobjData ={
                edXcoordinate: $('#edXcoordinate').val(),
                edYcoordinate: $('#edYcoordinate').val(),
                edobjWidth: $('#edobjWidth').val(),
            };
            $.ajax({
                type: "put",
                url: url+"/updateObj/"+bid,
                data: upobjData,
                datatype: 'json',
                
                
                
                enctype: 'multipart/form-data',
                
                success: function(data){
                    console.log("success:"+data.id);
                    console.log(data.id);
                    $('#'+data.id+'x').html(data.Xcoordinate);
                    $('#'+data.id+'y').html(data.Ycoordinate);
                    $('#'+data.id+'w').html(data.objWidth);
                    $('#mapObjfrm').trigger("reset");
                    $('#editObjModel').modal('hide');
                },
                error: function(data){
                    console.log('dataerror'+data);
                    alert("上傳的檔案不符格式!");
                },
            
            
            });
            
            
        });
        
        
          
          
        //編輯
        $('body').on('click','.editObj',function(){
            
            var bid = $(this).val();
            
            $.get(url + '/' + bid, function (data) {
                //success data
                console.log("success update"+data.Xcoordinate);
                $('#edXcoordinate').val(data.Xcoordinate);
                $('#edYcoordinate').val(data.Ycoordinate);
                $('#edobjWidth').val(data.objWidth);  
                $('#edbid').val(data.id);
                                    
                $('#editObjModel').modal('show');
            });            
        });
        
        
         $('#newObj').click(function(){
            $('#btn-save').val("add");
            $('#mapObjfrm').trigger("reset");
            $('#mapObjModel').modal('show');
         });
         
         
         //新增
         $('body').on('click','#btn-save',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            e.preventDefault();
            var objData = new FormData($('#mapObjfrm')[0]);
            
            
            console.log("formData:"+objData);
            
            $.ajax({
                type: "post",
                url: url,
                data: objData,
                datatype: 'json',
                
                processData: false,
                contentType: false,
                enctype: 'multipart/form-data',
                success: function(data){
//                    data = JSON.parse(qdata);
                    console.log("success:"+data.id);
                    console.log(data.id);
                     var object ='<tr id="'+data.objId+'"><th>'+data.buildingName+'</th><th id="'+data.objId+'x">'+data.Xcoordinate+'</th><th id="'+data.objId+'y">'+data.Ycoordinate+'</th><th id="'+data.objId+'w">'+data.objWidth+'</th><th><img src="/img/campus/'+data.objImg+'" alt="'+data.buildingName+'"></th><th><button class="btn btn-warning btn-xs btn-detail editObj" value="'+data.objId+'">Edit</button>'+
                        '<button class="btn btn-danger btn-xs btn-delete deleteObj" value="'+data.objId+'">Delete</button></th></tr>';
                
                     $('#objects-list').append(object);
                     $('#editObjfrm').trigger("reset");
                     $('#mapObjModel').modal('hide');
                },
                error: function(data){
                    console.log('dataerror'+data);
                    alert("上傳的檔案不符格式!");
                },
            
            
            });
            
            
         });
         
    });


   

</script>


@endsection