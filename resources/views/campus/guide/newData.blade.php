@extends('layouts.app')

@section('content')

<?php
    $i=1;
    $cate = array('','行政','系館','中大景點','運動','飲食','住宿');
    $amount = 1;

?>
<script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>

<div class="container">
    <div class="jumbotron">
        <form action="{{url('/campus/create')}}" method="GET" id="newBuilding">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <h3>新增建築物</h3>
                </div>
                <div class="col-md-4">
                    <span>建築物類型</span>
                    <select name="building_id" form="newBuilding">
                        @foreach($categorys as $category)
                        <option value="{{$category->building_id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <br>
                    <span>建築物名稱</span><input type="text" name='buildingName'><br><br>
                    <span>建築物簡介</span><input type="text" name='buildingExplain'><br><br>
                    <span>圖片</span><input type="text" name='imgUrl'><br><br>
                    <button type='submit' class='btn' >送出</button>
                </div>                      
            </div>           
        </form>
    </div>
    <button id="btn-add" name="btn-add" class="btn btn-primary">新增Ajax</button>
    <!--Model-->
    <meta name="_token" content="{!! csrf_token() !!}" />
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">編輯建築物</h4>
                        </div>
                        <div class="modal-body">
                            
                            <form id="frmBuildings" name="frmBuildings" class="form-horizontal" novalidate="" action="#" enctype="multipart/form-data" files="true">
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
                                        <textarea type="text" class="form-control" id="buildingExplain" name="buildingExplain" value="" required placeholder="簡介"></textarea>
                                    </div>
                                </div>
                                
                                 <div class="form-group fileUpload ">
                                    <label for="inputImgUrl" class="col-sm-3 control-label">圖片</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-group" id="imgUrl" name="imgUrl">
                                    </div>
                                </div>
                           </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                            <input type="hidden" id="bid" name="bid" value="0">
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
                @foreach($building as $building)
                <tr id="{{$building->id}}">                   
                    <th><?php/* echo $i;$i++;*/ ?></th>
                    <th>{{$building->buildingName}}</th>
                    <th><?php 
                        echo $cate[$building->building_id];
                        $amount++;
                    ?></th>
                    <th>{{$building->buildingExplain}}</th>
                    <th>{{$building->imgUrl}}</th>
                    <th>
                        <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$building->id}}">Edit</button>
                        <button class="btn btn-danger btn-xs btn-delete delete-building" value="{{$building->id}}">Delete</button>
                    </th>
               </tr>
                @endforeach
            </tbody>
           
        </table>
    </div>
</div>
<script>
    var cate = ['','行政','系館','中大景點','運動','飲食','住宿'];
    $(document).ready(function(){
        
        
        var x = <?php echo $amount?>;
        var upbid;
        $('body').on('click','.open-modal',function(){
            var bid = $(this).val();
            upbid = bid;
            $.get(url + '/' + bid, function (data) {
                //success data
                console.log(data);
                $('#building_id').val(data.building_id);
                $('#buildingName').val(data.buildingName);
                $('#buildingExplain').val(data.buildingExplain);
                //$('#imgUrl').val(data.imgUrl);
                $('#btn-save').val("update");
                
                

                $('#myModal').modal('show');
            });
        });
        $('body').on('click','.delete-building',function(){
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

        
        var url = "newData/Building";
         $('#btn-add').click(function(){
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

        var formData = {          
            buildingName: $('#buildingName').val(),          
            building_id: $('#building_id').val(),
            buildingExplain: $('#buildingExplain').val(),
            imgUrl: $('#imgUrl').val()
        };
        
        

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var bid = $('#bid').val();
       
        var my_url = url;

        if (state == "update"){
            bid = upbid;
            type = "PUT"; //for updating existing resource           
            
            my_url += '/' + bid;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);               
                var building ='<tr id="'+data.id+'"><th></th><th>'+data.buildingName+'</th><th>'+cate[data.building_id]+'</th><th>'+data.buildingExplain+'</th><th>'+data.imgUrl+'</th><th><button class="btn btn-warning btn-xs btn-detail open-modal" value="'+data.id+'">Edit</button>'+
                        '<button class="btn btn-danger btn-xs btn-delete delete-building" value="'+data.id+'">Delete</button></th></tr>';
                

                if (state == "add"){ //if user added a new record
                    $('#buildings-list').append(building);
                }else{ //if user updated an existing record                                       
                    $("#" + bid).replaceWith( building );
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


@endsection