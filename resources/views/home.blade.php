@extends('layouts.layout')

@section('title', 'NCU Fresh | 新生知訊網')

@section('css')
<link rel="stylesheet" href="{{ asset('include/izimodal/css/iziModal.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
{{-- 入場動畫 --}}
<style media="screen">
#logo .intro-text {
  display: none;
}
</style>
@stop

@section('js')
<script src="{{ asset('include/jquery/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('include/izimodal/js/iziModal.min.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script type="text/javascript">
$("document").ready(function () {
$("#logo .intro-text").fadeIn(1000); // 入場動畫
// 換生活照
$("#logo").backstretch([
    "{{asset('upload/home_bg/background1.jpg')}}"
  , "{{asset('upload/home_bg/background2.jpg')}}"
  , "{{asset('upload/home_bg/background3.jpg')}}"
], {duration: 3000, fade: 1250});

// 隨機季節
var spring = "{{asset('img/layout/spring.png')}}";
var spring_bc = 'linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%)';
var summer = "{{asset('img/layout/summer.png')}}";
var summer_bc = 'linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(31,170,145,.8) 100%)';
var fall = "{{asset('img/layout/fall.png')}}";
var fall_bc = 'linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(197,121,002,.8) 100%)';
var winter = "{{asset('img/layout/winter.png')}}";
var winter_bc = 'linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(1,50,104,.8) 100%)';
// final var
var primary_color = '';
var background_url = '';
var background_color = '';

var rand = Math.floor((Math.random() * 4) + 1);
switch(rand) {
    case 1:
        background_url = spring;
        background_color = spring_bc;
        primary_color = 'spring';
        break;
    case 2:
        background_url = summer;
        background_color = summer_bc;
        primary_color = 'summer';
        break;
    case 3:
        background_url = fall;
        background_color = fall_bc;
        primary_color = 'fall';
        break;
    case 4:
        background_url = winter;
        background_color = winter_bc;
        primary_color = 'winter'
        break;
    default:
        console.log('fuck');
}
$("main").css("background-image"," url("+background_url+") ");
$("body").css("background", background_color);
$("#ann i").addClass(primary_color + '_c');
$("#timeline .timeline-item .timeline-icon").addClass(primary_color + '_c');
$("#timeline .timeline-item .timeline-content h2").addClass(primary_color + '_c');
// 難用
$("#timeline").addClass(primary_color); // 線
$("#timeline .timeline-item .timeline-content.left").addClass(primary_color); // 左箭頭
$("#timeline .timeline-item .timeline-content.right").addClass(primary_color); // 右箭頭
});
</script>
@stop

@section('content')
{{-- 到最上面的按鈕 --}}
<a href="#app-layout" class="btn btn-fab" id="totop"><i class="material-icons">arrow_upward</i></a>

{{-- 第一區 logo --}}
<header id="logo">
    <div class="blur">
        <div class="container">
            <div class="intro-text">
                <img class="img-responsive center-block" src="{{ asset('img/home/logo.png') }}">
                <h1 class="text-center">新生都該擁有的校園生活攻略</h1>

                <a href="#news" class="btn btn-circle">
                    <i class="fa fa-angle-double-down fa-3x"></i>
                </a>
            </div>
        </div>
    </div>
</header>

{{-- 第二區 公告和廣告 --}}
<section id="news">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="section-heading">最新消息</h1>
            <h4 class="section-subheading text-muted">我們將會定期更新最新消息</h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6" id="ann">
            <div class="list-group">
                @foreach ($anns as $ann)
                <a href="#" data-toggle="modal" data-target="#myModal{{ $ann->id }}">
                    <div class="list-group-item">
                        <div class="row-action-primary">
                        @if($ann->is_top)
                            <i class="material-icons">face</i>
                        @else
                            <i class="material-icons">folder</i>
                        @endif
                        </div>
                        <div class="row-content">
                            <div class="least-content">{{ $ann->post_at }}</div>
                            <h4 class="list-group-item-heading">{{ $ann->title }}</h4>
                            <p class="list-group-item-text">{{ $ann->short_content }} ..........</p>
                        </div>
                    </div>
                </a>
                <div class="list-group-separator"></div>

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
            </div>
        </div>
        <div class="col-md-6">
            <div id="carousel-single" class="carousel slide add-big-bottom" data-ride="carousel">
            		<!-- Indicators -->
            		<ol class="carousel-indicators">
            			   <li data-target="#carousel-single" data-slide-to="0" class="active"></li>
                     	<li data-target="#carousel-single" data-slide-to="1" class=""></li>
                </ol>

            		<!-- Wrapper for slides -->
            		<div class="carousel-inner">
            				<figure class="item preload loaded active" style="background-image: url(http://lorempicsum.com/futurama/750/400/3);">
              					<figcaption class="carousel-caption">不要</figcaption>
            				</figure>
            				<figure class="item preload loaded" style="background-image: url(http://lorempicsum.com/futurama/750/400/1);">
              					<figcaption class="carousel-caption">中央大學</figcaption>
            				</figure>
            		</div>

            		<!-- Controls -->
            		<a class="left carousel-control" href="#carousel-single" data-slide="prev">
              			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M15.422 7.406L10.828 12l4.594 4.594L14.016 18l-6-6 6-6z"></path>
                    </svg>
                </a>
            		<a class="right carousel-control" href="#carousel-single" data-slide="next">
              			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M9.984 6l6 6-6 6-1.406-1.406L13.172 12 8.578 7.406z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row text-center">
      <a href="#about" class="btn-down">
          <i class="fa fa-angle-down fa-5x"></i>
      </a>
    </div>
</div>
</section>

{{-- 第三區 介紹時間軸 --}}
<section id="about">
<div class="container">
<div class="row">
    <div class="col-md-12 text-center">
        <h2 class="section-heading">無論身在何處, 都能瀏覽新生知訊網</h2>
        <h4 class="section-subheading text-muted">我們的特色</h4>
    </div>
</div>
<div id="timeline">
	  <div class="timeline-item">
  			<a href="{{url('/doc')}}">
            <div class="timeline-icon">
                <i class="material-icons">rss_feed</i>
  			    </div>
        </a>
        <div class="timeline-clickme">
            <img src="img/home/squirrel.png" alt="" />
        </div>
				<div class="timeline-content left">
  					<h2>新生必讀</h2>
  					<p>
              QQ
            </p>
				</div>
		</div>
		<div class="timeline-item">
        <a href="{{url('/Q&A/all')}}">
    				<div class="timeline-icon">
                <i class="material-icons">cloud</i>
    				</div>
        </a>
  			<div class="timeline-content right">
  					<h2>新生Q&amp;A</h2>
            <p>
              QQ
            </p>
  			</div>
		</div>
		<div class="timeline-item">
        <a href="{{url('/campus')}}">
    				<div class="timeline-icon">
                <i class="material-icons">directions_bike</i>
    				</div>
        </a>
  			<div class="timeline-content left">
      			<h2>校園導覽</h2>
            <p>
              QQ
            </p>
  			</div>
		</div>
    <div class="timeline-item">
        <a href="{{url('/groups')}}">
    				<div class="timeline-icon">
                <i class="material-icons">face</i>
    				</div>
        </a>
  			<div class="timeline-content right">
  					<h2>系所社團</h2>
            <p>
              QQ
            </p>
  			</div>
		</div>
    <div class="timeline-item">
        <a href="{{url('/life')}}">
    				<div class="timeline-icon">
                <i class="material-icons">pets</i>
    				</div>
        </a>
  			<div class="timeline-content left">
      			<h2>中大生活</h2>
            <p>
              QQ
            </p>
  			</div>
		</div>
    <div class="timeline-item">
        <a href="{{url('/videos')}}">
    				<div class="timeline-icon">
                <i class="material-icons">play_circle_outline</i>
    				</div>
        </a>
  			<div class="timeline-content right">
  					<h2>影音專區</h2>
            <p>
              QQ
            </p>
  			</div>
		</div>
    <div class="timeline-item">
        <a href="{{url('/')}}">
    				<div class="timeline-icon">
                <i class="material-icons">bubble_chart</i>
    				</div>
        </a>
  			<div class="timeline-content left">
  					<h2>關於我們</h2>
            <p>
              QQ
            </p>
  			</div>
		</div>
</div>
</div>
</section>

@endsection
