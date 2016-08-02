@extends('layouts.layout')

@section('title', '編輯新生必讀研究所資料')

@section('css')
@stop

@section('js')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'content', {
    filebrowserImageBrowseUrl: '{{ url('laravel-filemanager?type=Images') }}',
    filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '{{ url('laravel-filemanager?type=Files') }}',
    filebrowserUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
});
</script>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('doc/graduate/'.$graduate->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <h1  style="padding-bottom: 5vh;">編輯新生必讀研究所資料</h1>
                <div class="form-group label-floating">
                    <label class="control-label" for="focusedInput1">標題</label>
                    <input name="title" class="form-control input-lg" id="focusedInput1" type="text" value="{{ $graduate->title }}" required>
                </div>
                <h3>內文</h3>
                <textarea name="content" id="content">{{ $graduate->content }}</textarea>
                <div class="form-group">
                    <label for="select" class="col-xs-2 control-label" style="font-size: 20px;">隸屬於哪個主項目</label>
                    <div class="col-xs-10">
                        <select id="select" class="form-control" name="position_of_main">
                            <option value="1">研究所 - 註冊</option>
                            <option value="2">研究所 - 新生週</option>
                        </select>
                    </div>
                </div>
                <div style="padding-top: 10vh;">
                    <p><button class="btn btn-raised btn-success" type="submit">更新</button></p>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
