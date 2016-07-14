@extends('layouts.layout')

@section('title', '公告')

@section('css')
<link rel="stylesheet" href="{{ asset('include/pickdate/themes/classic.css') }}" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="{{ asset('include/pickdate/themes/classic.date.css') }}" media="screen" title="no title" charset="utf-8">
<style>
/* table連結會有手指 */
.href-table-row{
    cursor:pointer;
}
</style>
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
        format: 'yyyy / mm / dd (dddd)',
        formatSubmit: 'yyyy-mm-dd',
        hiddenName: true,
        min: new Date(2016,7,8),
        max: new Date(2017,8,8)
    });

    // 初始化ckeditor
    CKEDITOR.replace( 'content', {
      filebrowserImageBrowseUrl: '{{ url('/laravel-filemanager?type=Images') }}',
      filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: '{{ url('/laravel-filemanager?type=Files') }}',
      filebrowserUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
    });

    // 點日期工具input會focus
    $('.datepicker').click(function(){
        $(this).focus();
    });

    // table row的超連結 //用modal的話不需要,show頁面才要
    $(".href-table-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>
@stop

@section('content')

<div class="container">

<!-- 新增公告 -->
<div class="row">
    <a href="#create" class="btn btn-raised btn-danger" data-toggle="collapse" ><i class="fa fa-plus" aria-hidden="true"></i> 新增公告</a>
    <div id="create" class="collapse container">
        <h3>新增公告</h3>
        <form action="{{ url('/ann') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="post_at"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;時間</label>
                <input type="date" name="post_at" class="form-control datepicker" id="post_at" placeholder="請填發布時間" required>
            </div>
            <div class="form-group">
                <label for="title"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;標題</label>
                <input class="form-control" id="title" name="title" type="text" maxlength="30"  placeholder="公告的標題" required>
            </div>
            <div class="form-group">
                <label for="content"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;內文</label>
                <textarea class="form-control" id="content" name="content" placeholder="公告的內容" required></textarea>
            </div>
            <div class="form-group">
                <div class="togglebutton">
                    <label><input name="top" type="checkbox"> 置頂</label>
                    <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input name="important" type="checkbox"> 重要</label>-->
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

<!-- 顯示所有公告 -->
<div class="row">
    <h3>公告</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover ">
            <thead>
                <tr>
                    <th>種類</th>
                    <th>日期</th>
                    <th>標題</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anns as $ann)
                <tr class="href-table-row @if($ann->is_top) danger @endif" data-href="#" data-toggle="modal" data-target="#myModal{{ $ann->id }}">
                    <td>
                        @if($ann->is_top)
                            置頂公告
                        @else
                            一般公告
                        @endif
                    </td>
                    <td><?php $d=strtotime($ann->post_at) ?>{{date("Y / m / d", $d) }}</td>
                    <td>{{ $ann->title }}</td>
                </tr>

                <!-- Modal -->
                <div id="myModal{{ $ann->id }}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">標題: {{ $ann->title }}</h2>
                                <h4 class="modal-title">發佈日期: {{ $ann->post_at }}</h4>
                            </div>
                            <div class="modal-body">
                                {!! $ann->content !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove"></span> Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>

@endsection
