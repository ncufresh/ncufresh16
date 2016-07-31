@extends('layouts.layout')

@section('title', '編輯研究生資料')

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
            <form action="{{ url('doc/under/'.$under->id) }}" method="POST">
            	{{ csrf_field() }}
            	{{ method_field('PATCH') }}
            	<h1>標題</h1>
                <p><input type="text" name="title" value="{{ $under->title }}"></p>
                <h1>內文</h1>
                <p><textarea name="content" id="content">{{ $under->content }}</textarea></p>
                <h1>隸屬於哪個主項目</h1>
                <p>
                	<input type="number" name="position_of_main" value="{{ $under->position_of_main }}"
                		   min="1" max="3" step="1" value="1" required>
                </p>
                <p><button type="submit">更新</button></p>
            </form>
        </div>
    </div>
</div>
@stop
