@extends('layouts.layout')

@section('content')
<style>
    .back{
        background-color: #b3d9ff;
        border-style: solid ;
        border-color: #80bfff;
    }
    .btn{
        width: 80px;
    }
    .eng5{
        position: absolute;
	left: 18%;
	top: 8%;
	width: 15%;

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

    <div class="jumbotron back row">
        <div class='col-md-4 col-md-offset-1'>
            <h1>校園介紹</h1>
            <button type="button" class="btn btn-primary" onclick="location.href='{{url('/campus/newData')}}'">新增建築物</button><br>
            <button type="button" class="btn btn-primary" onclick="location.href='{{url('/campus/newObj')}}'">新增地圖物件</button>
        </div>
        <div class="col-md-1"><button type='button' class="btn btn-info">行政</button></div>
        <div class="col-md-1"><button type='button' class="btn btn-info">系館</button></div>
        <div class="col-md-1"><button type='button' class="btn btn-info">中大景點</button></div>
        <div class="col-md-1"><button type='button' class="btn btn-info">運動</button></div>
        <div class="col-md-1"><button type='button' class="btn btn-info">住宿</button></div>
        <div class="col-md-1"><button type='button' class="btn btn-info">飲食</button></div>
        <div class="col-md-1"></div>
        <div class="col-md-8 col-md-offset-5 container" >
            <img src='/img/background.png' width='85%'>
            <a href="#" data-toggle="modal" data-target="#eng5" ><img src="/img/eng5.png" class="eng5" alt="no found"></a>

        </div>
    </div>
    <!--Introduction Modal -->
   <div class="modal fade" id="eng5" role="dialog">
    <div class="modal-dialog">

      <!--Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
           
    </div>
  </div>
  
  
</div>
<script>
  
</script>


@endsection
