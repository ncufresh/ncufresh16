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
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="{{ url('/home/background') }}">
                        變更首頁背景 <i class="fa fa-link fa-lg fa-flip-horizontal"></i>
                    </a>
                </h3>
            </div>
            <div class="panel-body">
                請壓成JPG,小於1MB(1024KB)<br>
                改副檔名,並不是"轉檔",不會真的改變檔案格式,請使用專業軟體
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
                檔名盡量用英文, 不要有任何空白<br>
                格式僅限 : <b>pdf, txt, doc, docx, xls, xlsx, ppt, pptx</b><br>
                大小上限最高2MB, 如需要更多請聯絡管理員
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
                檔名盡量用英文, 不要有任何空白<br>
                格式僅限 : <b>jpeg, pjpeg, png, gif</b><br>
                大小上限最高2MB, 如需要更多請聯絡管理員
            </div>
        </div>
    </div>
</div>
</div>
@endsection
