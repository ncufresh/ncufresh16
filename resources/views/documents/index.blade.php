@extends('layouts.layout')

@section('title', '新生必讀')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('docs/doc.css') }}"> -->
<style type="text/css">
  /*html {
    overflow: hidden;
  }*/

  body {
    display: none;
  }

  body,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  .h1,
  .h2,
  .h3,
  .h4 {
    font-family: Helvetica, Arial, '微軟正黑體', '新細明體', sans-serif;
  }

  h3 span {
    color: #286090;
  }

  section {
    padding: 40px 0;
    border-bottom: 1px solid #c1e1ec;
  }

  #main-1,
  #main-2,
  #main-3 {
    padding-bottom: 0;
  }

  section:last-child {
    border-bottom: none;
  }

  .side-nav a {
    color: black;
    font-style: italic;
  }

  .side-nav li a:hover,
  .side-nav li a:focus {
    background: #86c5da;
  }

  .side-nav .active {
    font-weight: bold;
    background: #72bcd4;
  }

  .side-nav .side-nav {
    display: none;
  }

  .side-nav .active .side-nav {
    display: block;
  }

  .side-nav .side-nav a {
    font-weight: normal;
    font-size: .85em;
  }

  .side-nav .side-nav span {
    margin: 0 5px 0 2px;
  }

  .side-nav .side-nav .active a,
  .side-nav .side-nav .active:hover a,
  .side-nav .side-nav .active:focus a {
    font-weight: bold;
    padding-left: 30px;
    border-left: 5px solid black;
  }

  .side-nav .side-nav .active span,
  .side-nav .side-nav .active:hover span,
  .side-nav .side-nav .active:focus span {
    display: none;
  }

  #innerLeftSidebar {
    background: rgba(71, 163, 218, 250);
  }

  #innerRightSidebar {
    background: rgba(255, 255, 255, 250);
  }

  #outerLeftSidebar {
    background: #47a3da;
  }

  #innerLeftSidebar,
  #innerRightSidebar {
    padding-right: 15px;
    padding-left: 15px;
  }

  #innerLeftContent {
    background: #34495e;
    color: white;
  }

  #innerRightPage {
    background: #ecf0f1;
  }

  #outerRightSidebar {
    background: #fff;
  }

  .col-center {
    text-align: center;
  }

  #addNewUnderScreen {
    background: #eee;
  }

  #addNewGraduateScreen {
    background: #eee;
  }

  .wrapper {
    margin-top: 60px;
  }
</style>
@stop

@section('js')
<!-- <script src="{{ asset('docs/doc.js') }}"></script> -->
<script>
  $(document).ready(function() {
  $("body").fadeIn("slow");
  var getNavBlockHeight = ($("nav").outerHeight(true) - 20);
  var getFooterBlockHeight = 150;

  function test() {
    $(".test1").text('$("body").width(): ' + $("body").width());
    $(".test2").text('$("body").innerWidth():' + $("body").innerWidth());
    $(".test3").text($("#addNewUnderScreen").css("display"));
    $(".test4").text('$(window).innerWidth(): ' + $(window).innerWidth());
    $("body").attr("data-target", ".scrollspy").css("background-color", "#2d2d30");
  }

  // status : 頁面的狀態
  const INIT_SCREEN = 0; // 初始畫面
  const LEFT_SCREEN = 1; // 開啟左邊的大學部新生必讀
  const RIGHT_SCREEN = 2; // 開啟右邊的研究所新生必讀

  var status = INIT_SCREEN;
  const scrollbarWidth = 17;

  function init() {
    $("#addNewUnderScreen").css("display", "none");
    $("#addNewGraduateScreen").css("display", "none");
    $("#leftScreen").css("display", "none");
    $("#rightScreen").css("display", "none");
    $("#openAnimationScreen").css("display", "none");
    $("#innerLeftContent").css("display", "none");
    $("#innerRightPage").css("display", "none");
    $("#innerLeftSidebar").css({
      "display": "none",
      "position": "fixed",
      "top": getNavBlockHeight,
      "left": 0,
      "width": ($(window).width() - 17) / 4,
      "height": $(window).height()
    });
    $("#innerRightSidebar").css({
      "display": "none",
      "position": "fixed",
      "top": getNavBlockHeight,
      "left": ($(window).width() - 17) * 3 / 4,
      "width": $(window).width() / 4,
      "height": $(window).height()
    });
    $("#outerLeftSidebar").css({
      "height": $(window).height() - getNavBlockHeight - getFooterBlockHeight,
      "display": "none"
    }).fadeIn("slow");
    $("#outerRightSidebar").css({
      "height": $(window).height() - getNavBlockHeight - getFooterBlockHeight,
      "display": "none"
    }).fadeIn("slow");
  }

  function setNavBlockHeight() {
    $("#navBlock").css("height", getNavBlockHeight);
  }

  function hasHorizontalScrollbar() {
    if ($("body").height() > $(window).height()) {
      return true;
    } else {
      return false;
    }
  }

  setNavBlockHeight();
  init();
  test();

  // open left page
  $("#btnOpenLeftPage").click(function() {
    test();
    // close init screen
    $("#initScreen").fadeOut("fast");
    status = LEFT_SCREEN; // set status for resize condition
    // animation...
    $("#openAnimationScreen").css("display", "block");
    $("#openAnimationBox").removeAttr("style").css({
      "display": "block",
      "background": "#47a3da",
      "position": "fixed",
      "top": getNavBlockHeight,
      "left": 0,
      "width": $(window).width() / 2,
      "height": $(window).height() - getNavBlockHeight
    }).delay("fast").animate({ "width": ($(window).width() - 17) / 4 }, "fast");
    // show left screen
    $("#openAnimationScreen").delay("fast").delay("fast").fadeOut("slow");
    $("#leftScreen").css("display", "block");
    $("#innerLeftSidebar").delay("fast").delay("fast").fadeIn("slow");
    $("#innerLeftContent").delay("fast").delay("fast").fadeIn("slow");
  });

  // back to origin from left
  $("#btnBackLeftPage").click(function() {
    test();
    // close left screen
    $("#addNewUnderScreen").css("display", "none");
    $("#leftScreen").fadeOut("slow");
    $("#innerLeftSidebar").fadeOut("slow");
    $("#innerLeftContent").fadeOut("slow");
    // set status for resize condition
    status = INIT_SCREEN;
    // animation...
    $("#openAnimationScreen").css("display", "block");
    $("#openAnimationBox").css({
      "top": getNavBlockHeight,
      "width": $(window).width() / 4,
      "height": $(window).height() - getNavBlockHeight
    }).delay("fast").animate({ "width": ($(window).width() + 17) / 2 }, "fast");
    // open init srceen
    $("#openAnimationScreen").delay("slow").delay("fast").fadeOut("slow");
    $("#initScreen").delay("slow").delay("fast").fadeIn("slow");
  });

  // open right page
  $("#btnOpenRightPage").click(function() {
    test();
    // close init screen
    $("#initScreen").fadeOut("fast");
    status = RIGHT_SCREEN; // set status for resize condition
    // animation...
    $("#openAnimationScreen").css("display", "block");
    $("#openAnimationBox").removeAttr("style").css({
      "display": "block",
      "position": "fixed",
      "background": "#fff",
      "top": getNavBlockHeight,
      "left": $(window).width() / 2,
      "width": $(window).width() / 2,
      "height": $(window).height() - getNavBlockHeight
    }).delay("fast").animate({
      "left": ($(window).width() - 17) * 3 / 4,
      "width": ($(window).width() - 17) / 4
    }, "fast");
    // show right screen
    $("#openAnimationScreen").delay("fast").delay("fast").fadeOut("fast");
    $("#rightScreen").css("display", "block");
    $("#innerRightSidebar").delay("fast").delay("fast").fadeIn("slow");
    $("#innerRightPage").delay("fast").delay("fast").fadeIn("slow");
  });

  // back to origin from right
  $("#btnBackRightPage").click(function() {
    test();
    // close right screen
    $("#addNewGraduateScreen").css("display", "none");
    $("#rightScreen").fadeOut("slow");
    // set status for resize condition
    status = INIT_SCREEN;
    // animation...
    $("#openAnimationScreen").css("display", "block");
    $("#openAnimationBox").css({
      "top": getNavBlockHeight,
      "left": $(window).width() * 3 / 4,
      "width": $(window).width() / 4,
      "height": $(window).height() - getNavBlockHeight
    }).delay("fast").animate({
      "left": ($(window).width() + 17) / 2,
      "width": ($(window).width() + 17) / 2
    }, "fast");
    // open init srceen
    $("#openAnimationScreen").delay("slow").delay("fast").fadeOut("slow");
    $("#initScreen").delay("slow").delay("fast").fadeIn("slow");
  });

  // if resize set navBlock height again
  $(window).resize(function() {
    test();
    getNavBlockHeight = ($("nav").outerHeight(true) - 20);
    setNavBlockHeight();
    // 若在初始狀態
    // if (status === INIT_SCREEN) {
    $("#outerLeftSidebar").css("height", $(window).height() - getNavBlockHeight - getFooterBlockHeight);
    $("#outerRightSidebar").css("height", $(window).height() - getNavBlockHeight - getFooterBlockHeight);
    // }
    // 若打開了左邊大學部新生必讀
    // if (status === LEFT_SCREEN) {
    $("#innerLeftSidebar").css({
      "top": getNavBlockHeight,
      "width": ($(window).width() / 4),
      "height": $(window).height()
    });
    // }
    // 若打開了右邊研究所新生必讀
    // if (status === RIGHT_SCREEN) {
    $("#innerRightSidebar").css({
      "top": getNavBlockHeight,
      "left": ($(window).width() * 3 / 4),
      "width": ($(window).width() / 4),
      "height": $(window).height()
    });
    // }
  });

  $("#test1").click(function() {
    test();
  });

  $("#test2").click(function() {
    test();
  });

  $("#test3").click(function() {
    test();
  });

  $("#test4").click(function() {
    test();
  });

  $("#btnAddUnder").click(function() {
    if ($("#addNewUnderScreen").css("display") === "none") {
      $("#addNewUnderScreen").css("display", "block");
    } else {
      $("#addNewUnderScreen").css("display", "none");
    }
  });

  $("#btnAddGraduate").click(function() {
    if ($("#addNewGraduateScreen").css("display") === "none") {
      $("#addNewGraduateScreen").css("display", "block");
    } else {
      $("#addNewGraduateScreen").css("display", "none");
    }
  });

  // $("#innerLeftContent").mouseover(function(){
  //   $("html").css("overflow", "auto");
  // });

  // $("#innerLeftContent").mouseout(function(){
  //   $("html").css("overflow", "hidden");
  // });

  // $("#innerRightPage").mouseover(function(){
  //   $("html").css("overflow", "auto");
  // });

  // $("#innerRightPage").mouseout(function(){
  //   $("html").css("overflow", "hidden");
  // });
  });

</script>
@stop

@section('content')
<div class="wrapper">
<!-- 新生必讀 -->
  <div class="container-fluid">
    <!-- 最上方畫面 -->
    <div class="row" id="initScreen">
      <!-- 左半邊大學部按鈕 -->
      <div class="col-xs-6 col-center" id="outerLeftSidebar">
        <h1>大學部<small>新生必讀</small></h1>
        <p>
          <button id="btnOpenLeftPage">GOGO</button>
          <button id="test3">TEST</button>
        </p>
        <p class="test1"></p>
        <p class="test2"></p>
        <p class="test3"></p>
        <p class="test4"></p>
      </div>
      <!-- /左半邊大學部按鈕 -->
      <!-- 右半邊研究所按鈕 -->
      <div class="col-xs-6 col-center" id="outerRightSidebar">
        <h1>研究所<small>新生必讀</small></h1>
        <p>
          <button id="btnOpenRightPage">GOGO</button>
          <button id="test2">TEST</button>
        </p>
        <p class="test1"></p>
        <p class="test2"></p>
        <p class="test3"></p>
        <p class="test4"></p>
      </div>
      <!-- /右半邊研究所按鈕 -->
    </div>
    <!-- /最上方畫面 -->
    <!-- 左邊大學部畫面 -->
    <div class="row" id="leftScreen">
      <div class="scrollspy" id="innerLeftSidebar">
        <h1>大學部<br><small>新生必讀</small></h1>
        <button id="btnBackLeftPage">back</button>
        <button id="test1">TEST</button>
        <button id="btnAddUnder">ADD</button>
        <p class="test1"></p>
        <p class="test2"></p>
        <p class="test3"></p>
        <p class="test4"></p>
        {{-- 顯示大學部的新生必讀資料 --}}
        <ul class="nav side-nav hidden-xs hidden-sm"><!-- data-spy="affix" -->
          <li><h1 class="center">大學部　<small><a href="{{ url('/doc/graduate') }}">研究所</a></small></h1></li>
          @foreach ($mainUnders as $unders)
            <li><a href="#main-{{ ++$count[0] }}">大學部主條目 {{ $count[0] }}</a>
            <ul class="nav side-nav">
            @foreach ($unders as $u)
              <li><a href="#section-{{ $count[0] }}-{{ $u->id }}"><span class="fa fa-angle-double-right"></span>{{ $u->title }}</a>
              </li>
            @endforeach 
            </ul>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="col-xs-3"></div>
      <!-- 為了對齊 -->
      <div class="col-xs-9" id="innerLeftContent">
        <h1>新生必讀 - 大學部</h1>
        @foreach ($mainUnders as $unders)
        <section id="main-{{ ++$count[1] }}">
          <h2><span class="fa fa-edit"></span> Main {{ $count[1] }}</h2>
          <p>Main {{ $count[1] }}</p>

          @foreach ($unders as $u)
          <section id="section-{{ $count[1] }}-{{ $u->id }}">
            <h3>{{ $u->title }}</h3>
            <button type="button" class="btn btn-primary">Learn More</button>
          </section>
          @endforeach
        @endforeach
      </div>
    </div>
    <!-- /左邊大學部畫面 -->
    <!-- 右邊研究所畫面 -->
    <div class="row" id="rightScreen">
      <div class="col-xs-9" id="innerRightPage">
        <h1>新生必讀 - 研究所</h1>
        {{-- 研究所資料 --}}
        @foreach ($mainGraduates as $graduates)
        <section id="main-{{ ++$count[1] }}">
          <h2><span class="fa fa-edit"></span> Main {{ $count[1] }}</h2>
          <p>Main {{ $count[1] }}</p>

          @foreach ($graduates as $g)
          <section id="section-{{ $count[1] }}-{{ $g->id }}">
            <h3>{{ $g->title }}</h3>
            <p>{{ $g->content }}</p>
            <button type="button" class="btn btn-primary">Learn More</button>
          </section>
          @endforeach
        </section>
        @endforeach
      </div>
      <div class="scrollspy" id="innerRightSidebar">
        <h1>研究所<br><small>新生必讀</small></h1>
        <button id="btnBackRightPage">back</button>
        <button id="test4">TEST</button>
        <button id="btnAddGraduate">ADD</button>
        <p class="test1"></p>
        <p class="test2"></p>
        <p class="test3"></p>
        <p class="test4"></p>
        <ul class="nav side-nav hidden-xs hidden-sm"><!-- data-spy="affix" -->
          <li><h1 class="center"><small><a href="{{ url('/doc/under') }}">大學部</a></small>　研究所</h1></li>
          @foreach ($mainGraduates as $graduates)
            <li><a href="#main-{{ ++$count[0] }}">研究所主條目 {{ $count[0] }}</a>
            <ul class="nav side-nav">
            @foreach ($graduates as $g)
              <li><a href="#section-{{ $count[0] }}-{{ $g->id }}"><span class="fa fa-angle-double-right"></span>{{ $g->title }}</a>
              </li>
            @endforeach 
            </ul>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    <!-- /右邊研究所畫面 -->
  </div>
  <!-- 動畫 -->
  <div class="row" id="openAnimationScreen">
    <div id="openAnimationBox"></div>
  </div>
  <!-- /動畫 -->
  </div>
  <!-- /新生必讀 -->

  <!-- <div class="row">
      {{-- 顯示大學部的新生必讀資料 --}}
      <h1>大學部　<small><a href="{{ url('/doc/graduate') }}">研究所</a></small></h1>
      <ul>
          <?php $count = 0; ?>
          @foreach ($mainUnders as $unders)
              <li>大學部主條目 {{ ++$count }}</li>
              <ul>
                  @foreach ($unders as $u)
                      <li>{{ $u->title }}</li>
                      <ul>
                          <li>{{ $u->content }}</li>
                          <form action="{{ url('/doc/under/'.$u->id.'/edit') }}" method="GET">
                              <button type="submit" id="edit-under-{{ $u->id }}">編輯</button>
                          </form>
                          <form action="{{ url('/doc/under/'.$u->id) }}" method="POST">
                              {!! csrf_field() !!}
                              {!! method_field('DELETE') !!}
                          <button type="submit" id="delete-document-{{ $u->id }}">刪除</button>
                      </form>
                      </ul>
                  @endforeach 
              </ul>
          @endforeach
      </ul>
  </div> -->
  {{-- 新增大學部的新生必讀資料 --}}
  <div class="container-fluid" id="addNewUnderScreen">
    <div class="row">
      <div class="col-xs-3"></div>
      <div class="col-xs-6">
        <h1>新增內容</h1>
        <form action="{{ url('/doc/under') }}" method="POST">
          {{ csrf_field() }}
          <p>標題</p>
          <p><input type="text" name="title" id="title" required></p>
          <p>內文</p>
          <p><input type="text" name="content" id="content" required></p>
          <p>隸屬於哪個主項目</p>
          <p><input type="number" name="position_of_main" min="1" max="3" step="1" value="1" required></p>
          <p><button type="submit">新增</button></p>
        </form><!-- 
        留白給 footer
        <br><br><br><br><br><br><br><br> -->
      </div>
      <div class="col-xs-3"></div>
    </div>
  </div>

  {{-- 新增研究所的新生必讀資料 --}}
  <div class="container-fulid" id="addNewGraduateScreen">
    <div class="row">
      <div class="col-sm-9">
        <h1>新增內容</h1>
        <form action="{{ url('/doc/graduate') }}" method="POST">
          {{ csrf_field() }}
          <p>標題</p>
          <p><input type="textbox" name="title"></p>
          <p>內文</p>
          <p><input type="textbox" name="content"></p>
          <p>隸屬於哪個主項目</p>
          <p><input type="number" name="position_of_main" min="1" max="3" step="1" value="1" required></p>
          <p><button type="submit">新增</button></p>
        </form> 
        <!-- 留白給 footer
        <br><br><br><br><br><br><br><br> -->
      </div><!-- /col-sm-9 -->
      <div class="col-sm-3"></div>
    </div><!-- /row -->
  </div><!-- /container-fulid -->

</div>

@endsection