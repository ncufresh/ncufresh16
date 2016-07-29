@extends('layouts.layout')

@section('title', '頁面不存在')

@section('css')
<style media="screen">
    img {
      width: 35vw;
    }
    @media (max-width:991px){
        /* 手機 */
        img {
          width: 70vw;
        }
    }
    main {
      background-color: white;
    }
</style>
@stop

@section('content')

<div class="container" id="abort">
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <img class="center-block" src="{{asset('img/error/404.png')}}" alt="" />
  </div>
</div>
<br>
<br>
<div class="row text-center">
  <div class="col-md-8 col-md-offset-2">
    <h2>您所查詢的頁面不存在</h2>
    <h2>如果有任何問題， 歡迎向我們反應</h2>
    <br>
    <h4>Email: ncufreshweb@gmail.com</h4>
    <h4>Facebook: <a href="https://www.facebook.com/groups/NCUgroup/">2016 嶄．望 中央大學</a> 私訊管理員</h4>
  </div>
</div>
</div>
@endsection
