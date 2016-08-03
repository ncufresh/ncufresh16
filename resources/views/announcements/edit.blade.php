@extends('layouts.layout')

@section('title', '修改公告')

@section('css')
<link rel="stylesheet" href="{{ asset('include/pickdate/themes/classic.css') }}" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="{{ asset('include/pickdate/themes/classic.date.css') }}" media="screen" title="no title" charset="utf-8">
@stop

@section('js')
<script src="{{ asset('include/pickdate/picker.js') }}" charset="utf-8"></script>
<script src="{{ asset('include/pickdate/picker.date.js') }}" charset="utf-8"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    // 初始化選日期工具
    $('.datepicker').pickadate({
        selectMonths: true,
        format: 'yyyy-mm-dd',
        min: new Date(2016,7,8),
        max: new Date(2017,8,8)
    });

    // 初始化ckeditor
    CKEDITOR.replace( 'content', {
        filebrowserImageBrowseUrl: '{{ url('laravel-filemanager?type=Images') }}',
        filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '{{ url('laravel-filemanager?type=Files') }}',
        filebrowserUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
    });

    // 點日期工具input會focus
    $('.datepicker').click(function(){
        $(this).focus();
    });

});
</script>
@stop


@section('content')

<div class="container">

<!-- 新增公告 -->
<div class="row">
    <div id="create" class="container">
        <a href="{{ url('ann') }}" class="btn btn-raised btn-primary">回上一頁</a>
        <h3>編輯公告</h3>
        <form action="{{ url('ann/'.$ann->id) }}" method="post" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="post_at"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;時間</label>
                <input type="date" name="post_at" class="form-control datepicker" id="post_at" value="{{$ann->post_at}}" placeholder="請填發布時間" required>
            </div>
            <div class="form-group">
                <label for="title"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;標題</label>
                <input class="form-control" id="title" name="title" type="text" value="{{$ann->title}}" maxlength="30"  placeholder="公告的標題" required>
            </div>
            <div class="form-group">
                <label for="content"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;內文</label>
                <textarea class="form-control" id="content" name="content" placeholder="公告的內容" required>{{ $ann->content }}</textarea>
            </div>
            <div class="form-group">
                <div class="togglebutton">
                    <label><input name="top" type="checkbox" {{ $ann->is_top==true ? 'checked' : '' }}> 置頂</label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-raised btn-block btn-primary">
                    送出<span class="glyphicon glyphicon-ok"></span>
                </button>
            </div>
        </form>
    </div>
</div>

</div>

@endsection
