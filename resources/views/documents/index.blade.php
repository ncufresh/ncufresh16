@extends('layouts.layout')

@section('title', '新生必讀')

@section('css')
<link rel="stylesheet" href="{{ asset('docs/doc.css') }}">
</style>
@stop

@section('js')
<script src="{{ asset('docs/doc.js') }}"></script>
@stop

@section('content')
<!-- 顯示綜合畫面的浮動按鈕 -->
<div class="fixed-button">
    <a href="#bottomPage" class="btn btn-circle">
        <i class="fa fa-angle-double-down fa-3x"></i>
        <div class="ripple-container"></div>
    </a>
</div>
<!-- /顯示綜合畫面的浮動按鈕 -->
<!-- 新生必讀 -->
<div class="wrapper">
    <!-- 上方兩個按鈕畫面 -->
    <div class="jumbotron" id="topScreen">
        <div class="container-fluid">
            <div class="row text-center">
                <!-- 左邊大學部導覽列 -->
                <div class="col-xs-6" id="outerLeftSidebar">
                    <h1>大學部</h1>
                    <p>
                        <a href="#under-1"><img src="{{ asset('docs/kirby.png') }}" alt="kirby" id="openLeft"></a>
                    </p>
                    <p class="test1"></p>
                    <p class="test2"></p>
                    <p class="test3"></p>
                    <p class="test4"></p>
                </div>
                <!-- /左邊大學部導覽列 -->
                <!-- 右邊研究所導覽列 -->
                <div class="col-xs-6" id="outerRightSidebar">
                    <h1>研究所</h1>
                    <p>
                        <a href="#graduate-1"><img src="{{ asset('docs/kirby.png') }}" alt="kirby" id="openRight"></a>
                    </p>
                    <p class="test1"></p>
                    <p class="test2"></p>
                    <p class="test3"></p>
                    <p class="test4"></p>
                </div>
                <!-- /右邊研究所導覽列 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#topScreen -->
    </div>
    <!-- /.jumbotron -->
    <!-- /上方兩個按鈕畫面 -->
    <!-- 大學部畫面 -->
    <div class="container-fluid" id="leftScreen">
        <div class="row">
            <div class="col-xs-3 col-fluid" id="innerLeftSidenav">
                <ul class="nav side-nav" id="leftNav">
                    <li>
                        <h1>大學部</h1></li>
                    <li><a href="#under-1">under-1</a></li>
                    <li><a href="#under-2">under-2</a></li>
                    <li><a href="#under-3">under-3</a></li>
                </ul>
            </div>
            <!-- /.col-xs-3.col-fluid /#innerLeftSidenav-->
            <div class="col-xs-6 innerLeftPage" id="innerLeftPage-1">
                <section id="under-1">
                    <h2><!-- <span class="fa fa-edit"> --></span> under-1</h2>
                    <p>under-1</p>
                    <section id="under-1-1">
                        <h3>section-1-1</h3>
                        <p>section-1-1</p>
                    </section>
                    <section id="under-1-2">
                        <h3>section-1-2</h3>
                        <p>section-1-2</p>
                    </section>
                    <section id="under-1-3">
                        <h3>section-1-3</h3>
                        <p>section-1-3</p>
                    </section>
                </section>
                <!-- /#under-1 -->
            </div>
            <div class="col-xs-6 innerLeftPage" id="innerLeftPage-2">
                <section id="under-2">
                    <h2><!-- <span class="fa fa-edit"> --></span> under-2</h2>
                    <p>under-2</p>
                    <section id="under-2-1">
                        <h3>section-2-1</h3>
                        <p>section-2-1</p>
                    </section>
                    <section id="under-2-2">
                        <h3>section-2-2</h3>
                        <p>section-2-2</p>
                    </section>
                    <section id="under-2-3">
                        <h3>section-2-3</h3>
                        <p>section-2-3</p>
                    </section>
                </section>
                <!-- /#under-2 -->
            </div>
            <div class="col-xs-6 innerLeftPage" id="innerLeftPage-3">
                <section id="under-3">
                    <h2><!-- <span class="fa fa-edit"> --></span> under-3</h2>
                    <p>under-3</p>
                    <section id="under-3-1">
                        <h3>section-3-1</h3>
                        <p>section-3-1</p>
                    </section>
                    <section id="under-3-2">
                        <h3>section-3-2</h3>
                        <p>section-3-2</p>
                    </section>
                    <section id="under-3-3">
                        <h3>section-3-3</h3>
                        <p>section-3-3</p>
                    </section>
                </section>
                <!-- /#under-3 -->
            </div>
            <!-- /.col-xs-6.innerLeftPage -->
            <div class="col-xs-3"></div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#leftScreen -->
    <!-- /大學部畫面 -->
    <!-- 研究所畫面 -->
    <div class="container-fluid" id="rightScreen">
        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-6 innerRightPage" id="innerRightPage-1">
                <section id="graduate-1">
                    <h2><!-- <span class="fa fa-edit"> --></span> graduate-1</h2>
                    <p>graduate-1</p>
                    <section id="graduate-1-1">
                        <h3>section-1-1</h3>
                        <p>section-1-1</p>
                    </section>
                    <section id="graduate-1-2">
                        <h3>section-1-2</h3>
                        <p>section-1-2</p>
                    </section>
                    <section id="graduate-1-3">
                        <h3>section-1-3</h3>
                        <p>section-1-3</p>
                    </section>
                </section>
                <!-- /#graduate-1 -->
            </div>
            <div class="col-xs-6 innerRightPage" id="innerRightPage-2">
                <section id="graduate-2">
                    <h2><!-- <span class="fa fa-edit"> --></span> graduate-2</h2>
                    <p>graduate-2</p>
                    <section id="graduate-2-1">
                        <h3>section-2-1</h3>
                        <p>section-2-1</p>
                    </section>
                    <section id="graduate-2-2">
                        <h3>section-2-2</h3>
                        <p>section-2-2</p>
                    </section>
                    <section id="graduate-2-3">
                        <h3>section-2-3</h3>
                        <p>section-2-3</p>
                    </section>
                </section>
                <!-- /#graduate-2 -->
                <div class="col-xs-6 innerRightPage" id="innerRightPage-3">
                    <section id="graduate-3">
                        <h2><!-- <span class="fa fa-edit"> --></span> graduate-3</h2>
                        <p>graduate-3</p>
                        <section id="graduate-3-1">
                            <h3>section-3-1</h3>
                            <p>section-3-1</p>
                        </section>
                        <section id="graduate-3-2">
                            <h3>section-3-2</h3>
                            <p>section-3-2</p>
                        </section>
                        <section id="graduate-3-3">
                            <h3>section-3-3</h3>
                            <p>section-3-3</p>
                        </section>
                    </section>
                    <section id="right-hiddden-section">
                    </section>
                    <!-- /#graduate-3 -->
                </div>
                <!-- /.col-xs-9 /#innerRightPage -->
                <div class="col-xs-3 col-fluid" id="innerRightSidenav">
                    <ul class="nav side-nav hidden-xs hidden-sm" id="rightNav" data-spy="affix">
                        <li>
                            <h1>研究所</h1></li>
                        <li><a href="#graduate-1">graduate-1</a></li>
                        <li><a href="#graduate-2">graduate-2</a></li>
                        <li><a href="#graduate-3">graduate-3</a></li>
                    </ul>
                </div>
                <!-- /.col-xs-3.col-fluid /#innerLeftSidenav-->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#leftScreen -->
        <!-- /研究所畫面 -->
        <div class="container" id="bottomScreen">
            <section class="mixed" id="bottomPage">
                <h2>大學部 X 研究所</h2>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
                <div class="row">
                    <div class="col-sm-4">
                        <p><img src="img/kirby.png" alt="kirby"></p>
                    </div>
                    <div class="col-sm-4">
                        <p><img src="img/kirby.png" alt="kirby"></p>
                    </div>
                    <div class="col-sm-4">
                        <p><img src="img/kirby.png" alt="kirby"></p>
                    </div>
                    <div class="col-sm-4">
                        <p><img src="img/kirby.png" alt="kirby"></p>
                    </div>
                    <div class="col-sm-4">
                        <p><img src="img/kirby.png" alt="kirby"></p>
                    </div>
                    <div class="col-sm-4">
                        <p><img src="img/kirby.png" alt="kirby"></p>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.container /#bottomScreen -->
    </div>
    <!-- /新生必讀 -->
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /新生必讀 -->
{{--
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
    <!-- 顯示大學部的新生必讀資料 -->
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
    <!-- 研究所資料 -->
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
--}}

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
  {{-- 新增大學部的新生必讀資料
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
  --}}
  {{-- 新增研究所的新生必讀資料
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
 --}}
</div>

@endsection