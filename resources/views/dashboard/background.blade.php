@extends('layouts.layout')

@section('title', '變更首頁背景')

@section('css')
@stop

@section('js')
@stop

@section('content')
<div class="container">
<div class="jumbotron">
    <h1>變更首頁背景</h1>
    <p>請壓成JPG,小於1MB(1024KB)</p>
    <p>改副檔名,並不是"轉檔",不會真的改變檔案格式,請使用專業軟體</p>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    @include('errors.list_error')
    <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/home/background') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="bg1" class="col-md-2 control-label">更新第一張背景</label>
            <div class="col-md-10">
                <input type="text" readonly="" class="form-control" placeholder="找尋電腦上的檔案...">
                <input type="file" name="bg1" id="bg1" multiple="">
            </div>
        </div>
        <div class="form-group">
            <label for="bg2" class="col-md-2 control-label">更新第二張背景</label>
            <div class="col-md-10">
                <input type="text" readonly="" class="form-control" placeholder="找尋電腦上的檔案...">
                <input type="file" name="bg2" id="bg2" multiple="">
            </div>
        </div>
        <div class="form-group">
            <label for="bg3" class="col-md-2 control-label">更新第三張背景</label>
            <div class="col-md-10">
                <input type="text" readonly="" class="form-control" placeholder="找尋電腦上的檔案...">
                <input type="file" name="bg3" id="bg3" multiple="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
                <input type="submit" class="btn btn-lg btn-block btn-raised btn-primary" value="更新">
            </div>
        </div>
    </form>
    </div>

    <div class="col-md-8 col-md-offset-2">
        <h2>目前是這三張,會照順序播</h2>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <img class="img-responsive" src="{{asset('img/home/background1.jpg')}}"/>
        <br>
        <img class="img-responsive" src="{{asset('img/home/background2.jpg')}}"/>
        <br>
        <img class="img-responsive" src="{{asset('img/home/background3.jpg')}}"/>
    </div>
</div>
</div>
@endsection
