@extends('layouts.layout')

@section('title', '編輯新生必讀共同資料')

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
            <form action="{{ url('doc/mix/'.$mix->id) }}" method="POST">
            	{{ csrf_field() }}
            	{{ method_field('PATCH') }}
                <h1  style="padding-bottom: 5vh;">修改新生必讀共同項目資料</h1>
            	<div class="form-group label-floating">
                    <label class="control-label" for="focusedInput1">標題</label>
                    <input name="title" class="form-control input-lg" id="focusedInput1" type="text" value="{{ $mix->title }}" required>
                </div>
                <h3>內文</h3>
                <textarea name="content">{{ $mix->content }}</textarea>
                <div class="form-group">
                    <label for="select" class="col-xs-4 control-label" style="font-size: 20px;">隸屬於哪個主項目</label>
                    <div class="col-xs-8">
                        <select id="select" class="form-control" name="position_of_main">
                            @if( $mix->position_of_main == 1)
                            <option value="1" selected>共同項目 - 學習</option>
                            <option value="2">共同項目 - 生活</option>
                            <option value="3">共同項目 - 輔導</option>
                            @elseif( $mix->position_of_main == 2)
                            <option value="1">共同項目 - 學習</option>
                            <option value="2" selected>共同項目 - 生活</option>
                            <option value="3">共同項目 - 輔導</option>
                            @else
                            <option value="1">共同項目 - 學習</option>
                            <option value="2">共同項目 - 生活</option>
                            <option value="3" selected>共同項目 - 輔導</option>
                            @endif
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