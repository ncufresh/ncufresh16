@extends('layouts.app')

@section('content')

<?php
    $i=1;
    $cate = array('行政','系館','中大景點','運動','飲食','住宿');

?>
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
                        @foreach($category as $category)
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
            @foreach($building as $building)
            <tbody>
                <tr>
                    
                
                <th><?php 
                echo $i;
                $i++;                
                ?></th>
                <th>{{$building->buildingName}}</th>
                <th><?php 
                    echo $cate[$building->building_id-1];
                ?></th>
                <th>{{$building->buildingExplain}}</th>
                <th>{{$building->imgUrl}}</th>
                <th>
                    <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$building->id}}">Edit</button>
                    <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$building->id}}">Delete</button>
                </th>
               </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>



@endsection