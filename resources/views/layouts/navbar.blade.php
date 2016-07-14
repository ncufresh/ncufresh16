<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
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
                <li><a href="{{ url('/campus') }}">影音專區</a></li>
                <li><a href="{{ url('/campus') }}">校園導覽</a></li>
                <li><a href="{{ url('/life') }}">中大生活</a></li>
                <li><a href="{{ url('/groups') }}">系所社團</a></li>
                <li><a href="{{ url('/smallgame') }}">小遊戲</a></li>
                <li><a href="{{ url('/Q&A/all') }}">新生Q&A</a></li>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登入</a></li>
                    <li><a href="{{ url('/register') }}">註冊</a></li>
                @else
                <li><a href="{{ url('/personal') }}">個人專區</a></li>
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
