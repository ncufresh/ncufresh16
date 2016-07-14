@extends('layouts.layout')

@section('title', '後台管理')

@section('css')
@stop

@section('js')
@stop

@section('content')
<div class="container">
<div class="jumbotron">
    <h1>後台管理</h1>
    <p>統整所有可以使用後台的地方</p>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="{{ url('/ann') }}">
                        公告 <i class="fa fa-link fa-lg fa-flip-horizontal"></i>
                    </a>
                </h3>
            </div>
            <div class="panel-body">
                上面有個紅色的按鈕可以新增公告
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="{{ route('watchtower.index') }}">
                        權限管理 <i class="fa fa-link fa-lg fa-flip-horizontal"></i>
                    </a>
                </h3>
            </div>
            <div class="panel-body">
                只有最高管理者可以使用這個
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="{{ url('laravel-filemanager?type=Files') }}">
                        檔案上傳 <i class="fa fa-link fa-lg fa-flip-horizontal"></i>
                    </a>
                </h3>
            </div>
            <div class="panel-body">
                記得按照分類上傳<br>
                檔名盡量用英文, 所有非英文的檔名都會被替換成底線<br>
                格式僅限 : pdf, txt, doc, docx
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="{{ url('laravel-filemanager') }}">
                        圖片上傳 <i class="fa fa-link fa-lg fa-flip-horizontal"></i>
                    </a>
                </h3>
            </div>
            <div class="panel-body">
                記得按照分類上傳<br>
                檔名盡量用英文, 所有非英文的檔名都會被替換成底線<br>
                格式僅限 : jpeg, pjpeg, png, gif
            </div>
        </div>
    </div>
</div>
</div>
@endsection
