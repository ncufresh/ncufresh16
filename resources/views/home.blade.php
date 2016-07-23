@extends('layouts.layout')

@section('title', 'NCU Fresh | 新生知訊網')

@section('css')
<link rel="stylesheet" href="{{ asset('include/izimodal/css/iziModal.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

@section('js')
<script src="{{ asset('include/jquery/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('include/izimodal/js/iziModal.min.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
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
                {{-- <br> --}}
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
  			<a href="#">
            <div class="timeline-icon">
                <i class="material-icons">rss_feed</i>
  			    </div>
        </a>
				<div class="timeline-content left">
  					<h2>新生必讀</h2>
  					<p>
              QQ
            </p>
				</div>
		</div>
		<div class="timeline-item">
        <a href="#">
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
        <a href="#">
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
        <a href="#">
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
        <a href="#">
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
        <a href="#">
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
        <a href="#">
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
