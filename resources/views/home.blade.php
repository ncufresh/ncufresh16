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
    "{{asset('img/home/background1.jpg')}}"
  , "{{asset('img/home/background2.jpg')}}"
  , "{{asset('img/home/background3.jpg')}}"
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
                            <i class="material-icons">announcement</i>
                        @else
                            {{-- <i class="material-icons">folder</i> --}}
                            <i class="fa fa-bullhorn" aria-hidden="true"></i>
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
                    <li data-target="#carousel-single" data-slide-to="2" class=""></li>
                    <li data-target="#carousel-single" data-slide-to="3" class=""></li>
                    <li data-target="#carousel-single" data-slide-to="4" class=""></li>
                    <li data-target="#carousel-single" data-slide-to="5" class=""></li>
                    <li data-target="#carousel-single" data-slide-to="6" class=""></li>
                    <li data-target="#carousel-single" data-slide-to="7" class=""></li>
                    <li data-target="#carousel-single" data-slide-to="8" class=""></li>
                </ol>

            		<!-- Wrapper for slides -->
            		<div class="carousel-inner">
                    <figure class="item preload loaded active" onclick="javascript:location.href='https://www.facebook.com/groups/NCUgroup/'" style="background-image: url({{asset('img/home/ncufb.jpg')}});">
                        <figcaption class="carousel-caption">FB學生社團</figcaption>
                    </figure>
                    <figure class="item preload loaded" onclick="javascript:location.href='https://www.facebook.com/NCUGC/'" style="background-image: url({{asset('img/home/ncugc.jpg')}});">
                        <figcaption class="carousel-caption">中央創遊</figcaption>
                    </figure>
            				<figure class="item preload loaded" onclick="javascript:location.href='https://www.facebook.com/IEEE-NCU-Student-Branch-1045673762117443/?fref=ts'" style="background-image: url({{asset('img/home/ieee.jpg')}});">
              					<figcaption class="carousel-caption">IEEE</figcaption>
            				</figure>
            				<figure class="item preload loaded" onclick="javascript:location.href='https://www.facebook.com/2016ncuchungyuzootopia'" style="background-image: url({{asset('img/home/ncucy.png')}});">
              					<figcaption class="carousel-caption">中友迎新</figcaption>
            				</figure>
                    <figure class="item preload loaded" onclick="javascript:location.href='https://www.facebook.com/NCUGSA'" style="background-image: url({{asset('img/home/ncugg.jpg')}});">
              					<figcaption class="carousel-caption">新生初夜</figcaption>
            				</figure>
                    <figure class="item preload loaded" onclick="javascript:location.href='https://www.facebook.com/besidesmagazine'" style="background-image: url({{asset('img/home/ncubook.png')}});">
              					<figcaption class="carousel-caption">除了雜誌</figcaption>
            				</figure>
                    <figure class="item preload loaded" onclick="javascript:location.href='https://www.facebook.com/pinewave'" style="background-image: url({{asset('img/home/pinewave.jpg')}});">
              					<figcaption class="carousel-caption">松濤電台</figcaption>
            				</figure>
                    <figure class="item preload loaded" onclick="javascript:location.href='https://www.facebook.com/ncuhiphop'" style="background-image: url({{asset('img/home/ncuhiphop.jpg')}});">
						            <figcaption class="carousel-caption">中央嘻研</figcaption>
					          </figure>
                    <figure class="item preload loaded" onclick="javascript:location.href='https://goo.gl/forms/n0MRP68XznEJd3HJ3'" style="background-image: url({{asset('img/home/ncucsl.jpeg')}});">
						        <figcaption class="carousel-caption">資訊服務學習招募</figcaption>
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
              新生一定要知道的事。要如何註冊？住宿該如何申請嗎？學雜費什麼時候要繳？初來乍到，所有需要注意的大小事，都在「新生必讀」！
            </p>
            <a href="{{url('/doc')}}">前往新生必讀</a>
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
              初來乍到，不熟悉的環境裡，有任何問題就來新生Q&amp;A裡尋找吧！
            </p>
            <a href="{{url('/Q&A/all')}}">前往新生Q&amp;A</a>
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
              怕在校園裡迷路嗎？來看「校園導覽」就對了！不但讓你知道每棟建築物的位置，還有介紹和照片。遇到緊急狀況該往哪走？哪邊有AED？這兒也會告訴你！
            </p>
            <a href="{{url('/campus')}}">前往校園導覽</a>
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
              想知道自己系上究竟有什麼嗎?
              {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
              想決定上大學該跑什麼社團嗎?
              {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
              {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
              系所社團有最齊全的資料供您參考。
            </p>
            <a href="{{url('/groups')}}">前往系所社團</a>
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
              食、行、住、育、樂，「中大生活」提供你在中大生活一定要知道的資訊，想知道有什麼好吃好玩，就趕快點進來看吧！
            </p>
            <a href="{{url('/life')}}">前往中大生活</a>
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
              沒來過中央大學?沒關係，影音專區讓你待在螢幕前就能了解中央事，看見中央情。
            </p>
            <a href="{{url('/videos')}}">前往影音專區</a>
  			</div>
		</div>
    <div class="timeline-item">
        <a href="{{url('/about')}}">
    				<div class="timeline-icon">
                <i class="material-icons">bubble_chart</i>
    				</div>
        </a>
  			<div class="timeline-content left">
  					<h2>關於我們</h2>
            <p>
              一群由熱情的學生所組成，在暑假窩在一起，寫CODE，繪圖，拍攝影片，快點進來認識他們吧~
            </p>
            <a href="{{url('/about')}}">前往關於我們</a>
  			</div>
		</div>
</div>
</div>
</section>

@endsection
