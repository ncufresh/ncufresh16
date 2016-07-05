@extends('layouts.app')

@section('title', 'NCU Fresh | 新生知訊網')

@section('css')
<style media="screen">
/* modal */
.modal-header, h4, .close {
    background-color: #317de0;
    color: #fff; /* 白字 */
    text-align: center;
    font-size: 30px;
}
.modal-header, .modal-body {
    padding: 20px 20px;
}
.modal-footer > .btn {
    padding: 10px 20px;
    background-color: #333; /* 按鈕背景色 */
    color: #f1f1f1; /* 按鈕字顏色 */
    border-radius: 0;
    transition: 0.2s;
}
.modal-footer > .btn:hover, .modal-footer > .btn:focus {
    border: 1px solid #333; /* 細框 顏色 */
    background-color: #fff; /* 白底 */
    color: #000; /* 白字 */
}
</style>
@stop

@section('js')
@stop

@section('content')



<div class="container">

    <a href="#create" class="btn btn-danger" data-toggle="collapse" ><i class="fa fa-plus" aria-hidden="true"></i> 新增公告</a>
    <div id="create" class="collapse container">
        <h3>新增公告</h3>
        <form action="{{ url('/ann') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="form-group">
              <label><i class="fa fa-pencil" aria-hidden="true"></i>標題</label>
              <input type="text" name="title" maxlength="30" class="form-control" placeholder="公告的標題">
            </div>
            <div class="form-group">
              <label><i class="fa fa-pencil" aria-hidden="true"></i>內文</label>
              <textarea name="content" class="form-control" placeholder="公告的內容"></textarea>
            </div>
            <button type="submit" class="btn btn-block">
              送出<span class="glyphicon glyphicon-ok"></span>
            </button>
        </form>
    </div>


    <h3>公告</h3>

    <div class="list-group">
      <li class="list-group-item active">一般公告</li>
      @foreach ($anns as $ann)
          <a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal{{ $ann->id }}">{{ $ann->title }}</a>

          <!-- Modal -->
          <div id="myModal{{ $ann->id }}" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">{{ $ann->title }}</h4>
                      </div>
                      <div class="modal-body">
                          <p>{{ $ann->content }}</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn btn-default pull-left" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> 關閉
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
    </div>


</div>

@endsection
