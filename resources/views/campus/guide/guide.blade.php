@extends('layouts.layout')

@section('content')

<style>

    .btn{
        width: 80px;
    }
    .mapobj{
        position: absolute;
    }
    .mapobj:hover{
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
    body{
        font-size: 24px;
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

        <button type='button' class="btn btn-info">行政</button>
        <button type='button' class="btn btn-info">系館</button>
        <button type='button' class="btn btn-info">中大景點</button>
        <button type='button' class="btn btn-info">運動</button>
        <button type='button' class="btn btn-info">住宿</button>
        <button type='button' class="btn btn-info">飲食</button>
        <br>
        <div class="col-md-12 map" >
            <img src='/img/campus/dontdel/background.png' width='95%'>
            @foreach($mapDatas as $mapData)
            <span data-toggle='modal' data-target="#modal{{$mapData->id}}">
                <img src="/img/campus/{{$mapData->objImg}}" class="cate{$mapData->building_id}} mapobj" id='{{$mapData->id}}' alt="no found" value="{{$mapData->id}}" style="left: {{$mapData->Xcoordinate}}%;top: {{$mapData->Ycoordinate}}%;width: {{$mapData->objWidth}}%;"
                     data-toggle='tooltip' data-placement='top' title="{{$mapData->buildingName}}">

            </span>
            @endforeach
        </div>
    </div>
    @foreach($mapDatas as $mapDataa)
    <!--Introduction Modal -->
    <div class="modal fade" id="modal{{$mapDataa->id}}" role="dialog">
        <div class="modal-dialog modal-lg">

            <!--Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close cloMod" data-dismiss="modal" value="{{$mapDataa->id}}">&times;</button>
                    <h4 class="modal-title">{{$mapDataa->buildingName}}</h4>
                </div>

                <div class="modal-body container">

                    <div class="objImg">
                        <img class="objImg-big img-rounded" src="" alt="not found" id="bigImg{{$mapDataa->id}}"><br>
                        @foreach($buildimgs as $buildimg)
                        <?php if (($mapDataa->id) == ($buildimg->BuildingId)) { ?>
                        <img class="objImg-sam img-rounded" src='/img/campus/{{$buildimg->imgUrl}}' alt='Not found' id="{{$mapDataa->id}}">
                            <?php                            
                        }
                        ?>
                        @endforeach

                    </div>
                    <br>
                    <div class="row label-box">
                        <label for="BuildName" id="objlabel" class="col-md-2 control-label">建築物名稱</label>
                        <div class="col-md-9">

                            {{$mapDataa->buildingName}}
                        </div>
                    </div>
                    <div class="row label-box">
                        <label for="BuildExplain" id="objlabel" class="col-md-2 control-label">建築物描述</label>
                        <div class="col-md-9">
                            {!!$mapDataa->buildingExplain!!}
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default cloMod" data-dismiss="modal" value="{{$mapDataa->id}}">Close</button>
                </div>
            </div>

        </div>
    </div>
    @endforeach


</div>
@section('js')

<script>
//    更換圖片
    $(document).on('ready', function(){
        $('body').on('click','.objImg-sam',function(){
            var imgId = $(this).attr('id');
            var imgSrc = $(this).attr('src');
            
            $('#bigImg'+imgId).attr('src',imgSrc);
        });
        $('body').on('click','.cloMod',function(){
            var imgId = $(this).val();
            $('#bigImg'+imgId).attr('src','');
        });
        
        
    });
</script>
@stop

@endsection
