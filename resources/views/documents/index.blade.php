@extends('layouts.layout')

@section('title', '新生必讀')

@section('css')
<link rel="stylesheet" href="{{ asset('docs/doc.css') }}">
<link rel="stylesheet" href="{{ asset('docs/jquery.scrollbar.css') }}">
<style>
/* background setting */
body {
    background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(197,121,002,.8) 100%);
}
main {
    background-image: url("{{ asset('docs/img/fal.png') }}");
}
/* set column width depends on the number of data */
.col-under-1,
.col-under-2,
.col-under-3,
.col-graduate-1, 
.col-graduate-2 {
    position: relative;
    float: left;
}

{{-- 大學部的細項目寬度 --}}
@for ($i = 0; $i < 3; $i++)
    @if( $numUnders[$i] == 1)

    .col-under-{{ $i+1 }} {
        margin-left: calc(100% / 3 );
        width: calc(100% / 3 );
        margin-right: calc(100% / 3 );
    }

    @media (max-width: 768px) {
        .col-under-{{ $i+1 }} {
            margin-left: calc(100% / 4 );
            width: calc(100% / 2 );
            margin-right: calc(100% / 4 );
        }
    }

    @elseif( $numUnders[$i] == 2)

    .col-under-{{ $i+1 }}:first-child {
        margin-left: calc(100% / 6 );
        width: calc(100% / 3 );
    }

    .col-under-{{ $i+1 }}:last-child {
        width: calc(100% / 3 );
        margin-right: calc(100% / 6 );
    }

    @media (max-width: 768px) {
        .col-under-{{ $i+1 }}:first-child {
            width: calc(100% / 2 );
        }

        .col-under-{{ $i+1 }}:last-child {
            width: calc(100% / 2 );
        }
    }

    @elseif( $numUnders[$i] == 3 )

    .col-under-{{ $i+1 }} {
        width: calc(100% / 3 );
    }
    
    @media (max-width: 768px) {
        .col-under-{{ $i+1 }} {
            width: calc(100% / 2 );
        }

        .col-under-{{ $i+1 }}:last-child{
            margin-left: calc(100% / 4 );
            width: calc(100% / 2 );
            margin-right: calc(100% / 4 );
        }
    }

    @elseif( $numUnders[$i] == 4 )
    
    .col-under-{{ $i+1 }} {
        width: calc(100% / 3 );
    }

    .col-under-{{ $i+1 }}:first-child,
    .col-under-{{ $i+1 }}:nth-last-child(2) {
        margin-left: calc(100% / 6 );
    }

    .col-under-{{ $i+1 }}:nth-child(2),
    .col-under-{{ $i+1 }}:last-child {
        margin-right: calc(100% / 6 );
    }
    
    @media (max-width: 768px) {
        .col-under-{{ $i+1 }} {
            width: calc(100% / 2 );
        }
    }

    @else

    .col-under-{{ $i+1 }} {
        width: calc(100% / {{ ceil($numUnders[$i]/2) }} );
    }

    .col-under-{{ $i+1 }}:nth-child({{ ceil($numUnders[$i]/2) + 1 }}) {
        margin-left: calc(50% / {{ ceil($numUnders[$i]/2) }} );
    }

    @media (max-width: 768px) {
        .col-under-{{ $i+1 }} {
            width: calc(100% / 2 );
        }

        .col-under-{{ $i+1 }}:nth-child({{ ceil($numUnders[$i]/2) + 1 }}) {
            margin-left: 0;
        }

        @if( ($numUnders[$i] % 2) == 1 )
        .col-under-{{ $i+1 }}:last-child {
            margin-left: calc(100% / 4 );
            width: calc(100% / 2 );
            margin-right: calc(100% / 4 );
        }
        @endif
    }

    @endif
@endfor

{{-- 研究生的細項目寬度 --}}
@for ($i = 0; $i < 2; $i++)
    @if( $numGraduates[$i] == 1 )
    
    .col-graduate-{{ $i+1 }} {
        margin-left: calc(100% / 3 );
        width: calc(100% / 3 );
        margin-right: calc(100% / 3 );
    }

    @media (max-width: 768px) {
        .col-graduate-{{ $i+1 }} {
            margin-left: calc(100% / 4 );
            width: calc(100% / 2 );
            margin-right: calc(100% / 4 );
        }
    }

    @elseif( $numGraduates[$i] == 2 )

    .col-graduate-{{ $i+1 }}:first-child {
        margin-left: calc(100% / 6 );
        width: calc(100% / 3 );
    }

    .col-graduate-{{ $i+1 }}:last-child {
        width: calc(100% / 3 );
        margin-right: calc(100% / 6 );
    }

    @media (max-width: 768px) {
        .col-graduate-{{ $i+1 }}:first-child {
            width: calc(100% / 2 );
        }

        .col-graduate-{{ $i+1 }}:last-child {
            width: calc(100% / 2 );
        }
    }

    @elseif( $numGraduates[$i] == 3 )

    .col-graduate-{{ $i+1 }} {
        width: calc(100% / 3 );
    }

    @media (max-width: 768px) {
        .col-graduate-{{ $i+1 }} {
            width: calc(100% / 2 );
        }

        .col-graduate-{{ $i+1 }}:last-child{
            margin-left: calc(100% / 4 );
            width: calc(100% / 2 );
            margin-right: calc(100% / 4 );
        }
    }

    @elseif( $numGraduates[$i] == 4 )
    
    .col-graduate-{{ $i+1 }} {
        width: calc(100% / 3 );
    }

    .col-graduate-{{ $i+1 }}:first-child,
    .col-graduate-{{ $i+1 }}:nth-last-child(2) {
        margin-left: calc(100% / 6 );
    }

    .col-graduate-{{ $i+1 }}:nth-child(2),
    .col-graduate-{{ $i+1 }}:last-child {
        margin-right: calc(100% / 6 );
    }
    
    @media (max-width: 768px) {
        .col-graduate-{{ $i+1 }} {
            width: calc(100% / 2 );
        }

        .col-graduate-{{ $i+1 }}:first-child,
        .col-graduate-{{ $i+1 }}:nth-last-child(2) {
            margin-left: 0;
        }

        .col-graduate-{{ $i+1 }}:nth-child(2),
        .col-graduate-{{ $i+1 }}:last-child {
            margin-right: 0;
        }
    }

    @else

    .col-graduate-{{ $i+1 }} {
        width: calc(100% / {{ ceil($numGraduates[$i]/2) }} );
    }

    .col-graduate-{{ $i+1 }}:nth-child({{ ceil($numGraduates[$i]/2) + 1 }}) {
        margin-left: calc(50% / {{ ceil($numUnders[$i]/2) }} );
    }

    @media (max-width: 768px) {
        .col-graduate-{{ $i+1 }} {
            width: calc(100% / 2 );
        }

        .col-graduate-{{ $i+1 }}:nth-child({{ ceil($numGraduates[$i]/2) + 1 }}) {
            margin-left: 0;
        }

        @if( ($numGraduates[$i] % 2) == 1 )
        .col-graduate-{{ $i+1 }}:last-child {
            margin-left: calc(100% / 4 );
            width: calc(100% / 2 );
            margin-right: calc(100% / 4 );
        }
        @endif
    }

    @endif
@endfor

</style>
@stop

@section('js')
<script src="{{ asset('docs/jquery.scrollbar.js') }}"></script>
<script src="{{ asset('docs/doc.js') }}"></script>

@can('management')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
CKEDITOR.replace( 'new_under', {
    filebrowserImageBrowseUrl: '{{ url('laravel-filemanager?type=Images') }}',
    filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '{{ url('laravel-filemanager?type=Files') }}',
    filebrowserUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
});
CKEDITOR.replace( 'new_gra', {
    filebrowserImageBrowseUrl: '{{ url('laravel-filemanager?type=Images') }}',
    filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '{{ url('laravel-filemanager?type=Files') }}',
    filebrowserUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
});
CKEDITOR.replace( 'new_mix', {
    filebrowserImageBrowseUrl: '{{ url('laravel-filemanager?type=Images') }}',
    filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '{{ url('laravel-filemanager?type=Files') }}',
    filebrowserUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
});
</script>
@endcan
<script type="text/javascript">
$(document).ready(function(){
    // 更換 scrollbar 的樣式
    $('.scrollbar-macosx').scrollbar();
});

// 利用 get 開啟特定 modal
var strUrl = location.search;
if (strUrl.indexOf("?") !== -1) {
    var getSearch = strUrl.split("?");
    var getString = getSearch[1];
    if(getString.indexOf("&") === -1){
        var getAll = getString.split("=");
        if(getAll[0]==="show"){
            $("#modal-"+getAll[1]).modal('show');
        }
    }
}
</script>
@stop

@section('content')
<!-- 新生必讀 -->
<div class="wrapper">
    <!-- 上方兩個按鈕畫面 -->
    <div class="jumbotron" id="topScreen">
        <div class="container-fluid">
            <div class="row vertical-middle little-button-container">
                <!-- 左邊大學部導覽列 -->
                <div class="col-xs-6 text-right" id="outerLeftSidebar">
                    <div class="img-wrapper">
                        <a href="#under-1">
                            <img src="{{ asset('docs/img/col.png') }}" alt="大學部" id="openLeft">
                        </a>
                    </div>
                </div>
                <!-- /左邊大學部導覽列 -->
                <!-- 右邊研究所導覽列 -->
                <div class="col-xs-6 text-left" id="outerRightSidebar">
                    <div class="img-wrapper">
                        <a href="#graduate-1">
                            <img src="{{ asset('docs/img/gra.png') }}" alt="研究所" id="openRight">
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#topScreen -->
    </div>
    <!-- /.jumbotron -->
    <!-- /上方兩個按鈕畫面 -->
    <!-- #midScreen 中間畫面 -->
    <section id="midScreen">
        <!-- #leftScreen 大學部畫面 -->
        <div class="container-fluid text-center" id="leftScreen">
            <div class="row vertical-middle">
                <div class="col-md-2 col-xs-3 col-fluid" id="innerLeftSidenav">
                    <ul class="nav side-nav" id="leftNav">
                        <li>
                            <h1 class="side-nav-title">大學部</h1></li>
                        <li><a href="#under-1"><img src="{{ asset('docs/img/sign.png') }}" alt="註冊"></a></li>
                        <li><a href="#under-2"><img src="{{ asset('docs/img/firstweek.png') }}" alt="新生週"></a></li>
                        <li><a href="#under-3"><img src="{{ asset('docs/img/course.png') }}" alt="共同課程"></a></li>
                    </ul>
                    @can('management')
                    {{-- 新增大學部資料 --}}
                    <button type="button" class="btn btn-raised btn-warning btn-lg" data-toggle="modal" data-target="#modal-new-under" style="z-index: 3;">新增</button>
                    <!-- Modal -->
                    <div id="modal-new-under" class="modal fade text-left" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form action="{{ url('/doc/under') }}" method="POST">
                                {{ csrf_field() }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h1 class="modal-title">大學部 - 新增內容</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="focusedInput1">標題</label>
                                            <input name="title" class="form-control input-lg" id="focusedInput1" type="text" required>
                                        </div>
                                        <h3>內文</h3>
                                        <textarea name="content" id="new_under" required></textarea>
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="select" class="col-xs-4 control-label" style="font-size: 20px; margin: 0 auto; padding:">
                                                    <p>隸屬於哪個主項目</p>
                                                </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <select id="select" class="form-control" name="position_of_main">
                                                        <option value="1">大學部 - 註冊</option>
                                                        <option value="2">大學部 - 新生週</option>
                                                        <option value="3">大學部 - 共同課程</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-4 text-right">
                                                    <button type="submit" class="btn btn-raised btn-success">新增</button>
                                                    <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">關閉</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal -->
                    {{-- /新增大學部資料 --}}
                    @endcan
                </div>
                <!-- /#innerLeftSidenav-->
                <?php $mainCount = 0; 
                      $mainTitles = array("註冊", "新生週", "共同課程"); ?>
                {{-- 產生三個大學部主要項目 --}}
                @foreach ($mainUnders as $unders)
                    <section id="under-{{ ++$mainCount }}" style="display: inline-table; width: 75%; margin-left: 15px;">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1 class="inner-page-title">大學部{{ $mainTitles[ $mainCount-1 ] }}</h1>
                            </div>
                        </div>
                        <div class="row">
                        <?php $subCount = 0; ?>
                        {{-- 產生大學部主要項目裡的細部項目 --}}
                        @foreach ($unders as $u)
                            <div class="col-under-{{ $mainCount }} col-padding-custom">
                                <!-- btn -->
                                <div class="btn-wrapper">
                                    <a class="btn btn-custom" type="button" data-toggle="modal" data-target="#modal-{{ $u->id }}">
                                        <div class="btn-mouseenter">{{ $u->title }}</div>
                                        <div class="btn-mouseleave">{{ $u->title }}</div>
                                    </a>
                                </div>
                                <!-- Modal -->
                                <div id="modal-{{ $u->id }}" class="modal fade text-left" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h1 class="modal-title">{{ $u->title }}</h1>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <p>{!! $u->content !!}</p>
                                                </div>
                                                @can('management')
                                                <div class="row">
                                                    <div class="col-xs-6 text-right">
                                                        <form action="{{ url('/doc/under/'.$u->id.'/edit') }}" method="GET">
                                                            <button type="submit" class="btn btn-raised btn-success btn-lg" id="edit-under-{{ $u->id }}">編輯</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-xs-6 text-left">
                                                        <form action="{{ url('/doc/under/'.$u->id) }}" method="POST" onsubmit="return confirm('確定要刪除 {{ $u->title }} 嗎？');">
                                                            {!! csrf_field() !!}
                                                            {!! method_field('DELETE') !!}
                                                            <button type="submit" class="btn btn-raised btn-danger btn-lg" id="delete-document-{{ $u->id }}">刪除</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                @endcan
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">關閉</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Modal -->
                            </div>
                        @endforeach
                        </div>
                    </section>
                    <!-- /#under-{{ $mainCount }} -->
                @endforeach
                <!-- 顯示綜合畫面的按鈕 -->
                <!-- <div class="little-button">
                    <div class="btn-circle-container">
                        <div>
                            <a href="#bottomScreen" class="btn btn-circle">
                                <i class="fa fa-angle-double-down fa-3x"></i>
                                <div class="ripple-container"></div>
                            </a>
                        </div>
                    </div>
                </div> -->
                <!-- /顯示綜合畫面的按鈕 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#leftScreen /大學部畫面 -->
        <!-- #rightScreen 研究所畫面 -->
        <div class="container-fluid text-center" id="rightScreen">
            <div class="vertical-middle">
                <div class="row" style="display: inline; width:100vw;">
                    <?php $mainCount = 0; ?>
                    {{-- 產生三個研究所主要項目 --}}
                    @foreach ($mainGraduates as $graduates)
                        <section id="graduate-{{ ++$mainCount }}" style="display: inline-table; width: 75%; float: none;">
                            <div class="row">
                                <div class="col-xs-12">
                                   <h1 class="inner-page-title">研究所{{ $mainTitles[ $mainCount-1 ] }}</h1> 
                                </div>
                            </div>
                            <div class="row">
                            <?php $subCount = 0; ?>
                            {{-- 產生研究所主要項目裡的細部項目 --}}
                            @foreach ($graduates as $g)
                                <div class="col-graduate-{{ $mainCount }} col-padding-custom">
                                    <div class="btn-wrapper">
                                        <a class="btn btn-custom" type="button" data-toggle="modal" data-target="#modal-{{ $g->id }}">
                                            <div class="btn-mouseenter">{{ $g->title }}</div>
                                            <div class="btn-mouseleave">{{ $g->title }}</div>
                                        </a>
                                    </div>
                                    <!-- Modal -->
                                    <div id="modal-{{ $g->id }}" class="modal fade  text-left" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h1 class="modal-title">{{ $g->title }}</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <p>{!! $g->content !!}</p>  
                                                    </div>
                                                    @can('management')
                                                    <div class="row">
                                                        <div class="col-xs-6 text-right">
                                                            <form action="{{ url('/doc/graduate/'.$g->id.'/edit') }}" method="GET">
                                                                <button type="submit" class="btn btn-raised btn-success btn-lg" id="edit-graduate-{{ $g->id }}">編輯</button>
                                                            </form>
                                                        </div>
                                                        <div class="col-xs-6 text-left">
                                                            <form action="{{ url('/doc/graduate/'.$g->id) }}" method="POST" onsubmit="return confirm('確定要刪除 {{ $g->title }} 嗎？');">
                                                                {!! csrf_field() !!}
                                                                {!! method_field('DELETE') !!}
                                                                <button type="submit" class="btn btn-raised btn-danger btn-lg" id="delete-document-{{ $g->id }}">刪除</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    @endcan
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">關閉</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Modal -->
                                </div>
                            @endforeach
                            </div>
                        </section>
                        <!-- /#graduate-{{ $mainCount }} -->
                    @endforeach
                    <!-- /.col-xs-8 /#innerRightPage -->
                    <div class="col-md-2 col-xs-3 col-fluid" id="innerRightSidenav" style="float: right;">
                        <ul class="nav side-nav" id="rightNav">
                            <li><h1 class="side-nav-title">研究所</h1></li>
                            <li><a href="#graduate-1"><img src="{{ asset('docs/img/sign.png') }}" alt="註冊"></a></li>
                            <li><a href="#graduate-2"><img src="{{ asset('docs/img/firstweek.png') }}" alt="新生週"></a></li>
                        </ul>
                        @can('management')
                        {{-- 新增研究所資料 --}}
                        <button type="button" class="btn btn-raised btn-warning btn-lg" data-toggle="modal" data-target="#modal-new-graduate" style="z-index: 3;">新增</button>
                        <!-- Modal -->
                        <div id="modal-new-graduate" class="modal fade text-left" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <form action="{{ url('/doc/graduate') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-content">
                                    
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h1 class="modal-title">研究所 - 新增內容</h1>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group label-floating">
                                                <label class="control-label" for="focusedInput1">標題</label>
                                                <input name="title" class="form-control input-lg" id="focusedInput1" type="text" required>
                                            </div>
                                            <h3>內文</h3>
                                            <textarea name="content" id="new_gra" required></textarea>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <label for="select" class="col-xs-4 control-label" style="font-size: 20px;">隸屬於哪個主項目</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-8">
                                                        <select id="select" class="form-control" name="position_of_main">
                                                            <option value="1">研究所 - 註冊</option>
                                                            <option value="2">研究所 - 新生週</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-4 text-right">
                                                        <button type="submit" class="btn btn-raised btn-success">新增</button>
                                                        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">關閉</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /Modal -->
                        @endcan
                    </div>
                    <!-- /.col-xs-3.col-fluid /#innerRightSidenav -->
                    <!-- 顯示綜合畫面的按鈕 -->
                    <!-- <div class="little-button">
                        <div class="btn-circle-container">
                            <div>
                                <a href="#bottomScreen" class="btn btn-circle">
                                    <i class="fa fa-angle-double-down fa-3x"></i>
                                    <div class="ripple-container"></div>
                                </a>
                            </div>
                        </div>
                    </div> -->
                    <!-- /顯示綜合畫面的按鈕 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.vertical-middle -->
        </div>
        <!-- /#rightScreen /研究所畫面 -->
    </section>
    <!-- /#midScreen /中間畫面 -->
    <!-- 綜合畫面 #bottomScreen -->
    <section class="mixed" id="bottomScreen">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="inner-page-title" style="padding-bottom:52px;">大學部 X 研究所</h1>
                </div>
            </div>
            <div class="row">
                @can('management')
                {{-- 新增共同資料 --}}
                <div class="col-xs-12 text-center">
                    <button type="button" class="btn btn-raised btn-warning btn-lg" data-toggle="modal" data-target="#modal-new-mix" style="z-index: 3;">新增</button>
                </div>
                <!-- Modal -->
                <div id="modal-new-mix" class="modal fade text-left" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <form action="{{ url('/doc/mix') }}" method="POST">
                            {{ csrf_field() }}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h1 class="modal-title">共同 - 新增內容</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="focusedInput1">標題</label>
                                        <input name="title" class="form-control input-lg" id="focusedInput1" type="text" required>
                                    </div>
                                    <h3>內文</h3>
                                    <p><textarea name="content" id="new_mix" required></textarea></p>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="select" class="col-xs-4 control-label" style="font-size: 20px;">隸屬於哪個主項目</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <div class="form-group">
                                                <select id="select" class="form-control" name="position_of_main">
                                                    <option value="1">共同項目 - 學習</option>
                                                    <option value="2">共同項目 - 生活</option>
                                                    <option value="3">共同項目 - 輔導</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 text-right">
                                            <button type="submit" class="btn btn-raised btn-success">新增</button>
                                            <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">關閉</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Modal -->
                {{-- /新增共同資料 --}}
                @endcan
            </div>
            <div class="row">
            <?php $mainCount = 0;
                  $mainTitles = array("學習", "生活", "輔導"); ?>
            @foreach ($mainMixs as $mixs)
                <div class="col-sm-4 col-padding-custom text-center">
                    <div class="btn-wrapper dropdown scrollbar-macosx" style="overflow: auto;" id="wrapper{{ ++$mainCount }}">
                        <a class="btn btn-custom dropdown-toggle" type="button" data-toggle="dropdown">
                            <div class="btn-mouseenter">
                                <div class="btn-txt">{{ $mainTitles[ --$mainCount ] }}</div>
                            </div>
                            <div class="btn-mouseleave">
                                <div class="btn-txt">{{ $mainTitles[ $mainCount++ ] }}</div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-custom">
                        @foreach($mixs as $m)
                            <li>
                                <a data-toggle="modal" data-target="#modal-{{ $m->id }}">{{ $m->title }}</a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                @foreach($mixs as $m)
                <!-- Modal {{ $m->id }} -->
                <div id="modal-{{ $m->id }}" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h1 class="modal-title">{{ $m->title }}</h1>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <p>{!! $m->content !!}</p>
                                </div>
                                @can('management')
                                <div class="row">
                                    <div class="col-xs-6 text-right">
                                        <form action="{{ url('/doc/mix/'.$m->id.'/edit') }}" method="GET">
                                            <button type="submit" class="btn btn-raised btn-success btn-lg" id="edit-mix-{{ $m->id }}">編輯</button>
                                        </form>
                                    </div>
                                    <div class="col-xs-6 text-left">
                                         <form action="{{ url('/doc/mix/'.$m->id) }}" method="POST" onsubmit="return confirm('確定要刪除 {{ $m->title }} 嗎？');">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            <button type="submit" class="btn btn-raised btn-danger btn-lg" id="delete-mix-{{ $m->id }}">刪除</button>
                                        </form>
                                    </div>
                                </div>
                                @endcan
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">關閉</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Modal {{ $m->id }} -->
                @endforeach
            @endforeach
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /綜合畫面 /#bottomScreen -->
</div>
<!-- /新生必讀 -->
@endsection