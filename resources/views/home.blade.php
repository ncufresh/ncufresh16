@extends('layouts.app')

@section('title', 'NCU Fresh | 新生知訊網')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

@section('js')
@stop

@section('content')


<!-- 最上面那區 -->
<div id="mustread" class="container text-center sec">

    <div class="row">
        <h3>新生必讀</h3>
        <p><em>QQ</em></p>
    </div>

    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <p><strong>咖波</strong></p><br>
            <a href="#hi" data-toggle="collapse">
              <img src="img/test/capoo.png" class="img-circle one-or-two" alt="死圖">
            </a>
            <div id="hi" class="collapse">
              <p>好吃</p>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <p><strong>兔子</strong></p><br>
            <img src="img/test/capoo.png" class="img-circle one-or-two" alt="死圖">
        </div>
    </div>

</div>


<!-- 廣告輪播區 -->
<div id="adblock" class="container sec">
<h2>廣告</h2>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- 三個輪播 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- 三個輪播的詳細內容 -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="img/test/test.png" alt="死圖嗚嗚">
            <div class="carousel-caption">
                <h3>hi</h3>
                <p>你好</p>
            </div>
        </div>

        <div class="item">
            <img src="img/test/test.png" alt="死圖嗚嗚">
            <div class="carousel-caption">
                <h3>hi</h3>
                <p>你好</p>
            </div>
        </div>

        <div class="item">
            <img src="img/test/test.png" alt="死圖嗚嗚">
            <div class="carousel-caption">
                <h3>hi</h3>
                <p>你好</p>
            </div>
          </div>
    </div>

    <!-- 左右控制鈕 -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>

<!-- 公告區 -->
<div id="board" class="container sec">
    <div class="row">
        <h3 class="text-center">公告</h3>
        <p class="text-center">以下是<br>公告!</p>
    </div>
    <div class="row">
        <ul class="list-group">
            <li class="list-group-item">嗨!&nbsp;&nbsp;<span class="label label-danger">重要</span></li>
            <li class="list-group-item">嗨!</li>
            <li class="list-group-item">嗨</li>
        </ul>
    </div>
    <div class="row text-center">
      <button class="btn" data-toggle="modal" data-target="#myModal">更多</button>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><span class="glyphicon glyphicon-lock"></span> 公告</h4>
      </div>
      <div class="modal-body">
        123456
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove"></span> 關閉
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
