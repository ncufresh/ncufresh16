@extends('layouts.layout')

@section('title', '新生必讀 - 大學部')

@section('css')
<style>
  body {
    background: lightblue;
    position: relative;
    line-height: 1.5;
    margin-bottom: 0px;
  }
  
  h1,
  h2 {
    font-weight: 700;
    font-family: Helvetica, Arial, 'LiHei Pro', '微軟正黑體', '新細明體', sans-serif;
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
  
  .side-nav {
    background: #4baac8;
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
  
  .mixed {
    border-top: 1px solid #c1e1ec;
  }
  
  .affix-top {
    position: relative;
  }
  
  .affix {
    width: 25%;
  }
  
  .affix-bottom {
    position: absolute;
    width: 98.5%;
  }

  footer {
    border-top: 1px solid #c1e1ec;
  }

  .wrapper {
    margin-top: 60px;
  }

  .center-col {
    margin-left: 5%;
    margin-right: 5%;
  }

  .center {
    text-align: center;
  }
</style>
@stop

@section('js')
<script>
  // 在 body 添加 data-target=".scrollspy"，讓 Bootstrap scrollspy 正常運作
  $(document).ready(function(){
    $("body").attr("data-target", ".scrollspy");
  });
  // Bootstrap affix effect
  $('#nav').affix({
    offset: {
      top: $('#nav').offset().top - 100,
      bottom: $('footer').outerHeight(true) + $('.mixed').outerHeight(true) + $('#add').outerHeight(true) - 100
    }
  });
</script>
@stop

@section('content')
<div class="wrapper">
  <div class="container-fulid">
    <div class="row">
      <div class="col-md-3 scrollspy">
        <ul id="nav" class="nav side-nav hidden-xs hidden-sm" data-spy="affix">
          <li><h1 class="center">大學部　<small><a href="{{ url('/doc/graduate') }}">研究所</a></small></h1></li>
          {{-- 顯示大學部的新生必讀資料 --}}
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
      <div class="col-md-6">

        @foreach ($mainUnders as $unders)
        <section id="main-{{ ++$count[1] }}">
          <h2><span class="fa fa-edit"></span> Main {{ $count[1] }}</h2>
          <p>Main {{ $count[1] }}</p>

          @foreach ($unders as $u)
          <section id="section-{{ $count[1] }}-{{ $u->id }}">
            <h3>{{ $u->title }}</h3>
            <p>{{ $u->content }}</p>
            <button type="button" class="btn btn-primary">Learn More</button>
          </section>
          @endforeach
        @endforeach

      </div>
      <div class="col-md-3"></div>
    </div><!-- /row -->
  </div><!-- /container -->
  <section class="mixed">
    <div class="container">
      <h2>大學部 X 研究所</h2>
      <div class="row">
        <div class="col-sm-6">
          <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.
          </p>
          <img class="img-responsive  " src="http://placehold.it/500x250/5fb3ce/000000">
        </div><!-- /col-sm-6 -->
        <div class="col-sm-6">
          <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
          </p>
          <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
          </p>
          <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
          </p>
          <button type="button" class="btn btn-primary">Apply Now</button>
        </div><!-- /col-sm-6 -->
      </div><!-- /row -->
      <div class="row">
        <div class="col-sm-12">
          <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
          </p>
          <p>End of container. XD</p>
        </div><!-- /col-sm-12 -->
      </div><!-- /row -->
    </div><!-- /container -->
  </section><!-- /mixed -->

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
  <div class="container-fulid" id="add">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 center">
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
        </form>
        <!-- 留白給 footer -->
        <br><br><br><br><br><br><br><br>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</div>

@endsection