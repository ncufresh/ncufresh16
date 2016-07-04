@extends('layouts.app')

@section('content')



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
</div>



@endsection