<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <title>@yield('title', '記得改標題!!不是改我')</title>
    <!-- mete區 -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- 引入Styles -->
    <link rel="stylesheet" href="{{ asset('include/bootstrap/css/bootstrap.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('include/font-awesome/css/font-awesome.css') }}" media="screen">

    <!-- 個人Styles -->
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @yield('css')

</head>
<body id="app-layout" data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- 左上角LOGO -->
                <a class="navbar-brand" href="{{ url('/') }}">新生知訊網</a>
            </div>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- 左邊的 Navbar -->
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            常用連結<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="http://lovenery.me/old/">去年的</a></li>
                            <li><a href="http://ncufresh.ncu.edu.tw/summer/">今年的</a></li>
                            <li><a href="{{ route('watchtower.index') }}">權限後台</a></li>
                            <li><a href="{{ url('/ann') }}">公告</a></li>
                        </ul>
                    </li>
                    @if(Request::path() === '/')
                        <li><a href="#mustread">新生必讀</a></li>
                        <li><a href="#myCarousel">廣告</a></li>
                        <li><a href="#board">公告</a></li>
                    @endif
                </ul>

                <!-- 右邊的 Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/campus') }}">校園導覽</a></li>
                    <li><a href="{{ url('/groups') }}">系所社團</a></li>
                    <li><a href="{{ url('/smallgame') }}">小遊戲</a></li>
                     <li><a href="{{ url('/Q&A') }}">新生Q&A</a></li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">登入</a></li>
                        <li><a href="{{ url('/register') }}">註冊</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>登出</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer id="footer">
          <div class="container text-center">
            <a class="up-arrow" href="#app-layout" data-toggle="tooltip" title="To top">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a><br><br>
            <p>國立中央大學2016新生知訊網團隊 版權所有 © 2016 NCU Fresh All Rights Reserved</p>
            <p>建議使用Chrome、Firefox或者IE11等瀏覽器，以獲得最佳體驗</p>
          </div>
    </footer>

    <!-- JavaScripts -->
    <script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('include/jquery/jquery.ujs.js') }}"></script>
    <script src="{{ asset('include/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/layout.js') }}"></script>
    @yield('js')
</body>
</html>
