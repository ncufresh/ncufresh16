<nav class="navbar navbar-ncufresh navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{-- 左上角LOGO --}}
            <a class="navbar-brand" href="{{ url('/') }}">新生知訊網</a>
        </div>

        {{-- Collapse --}}
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            {{-- 左邊的 Navbar --}}
            {{--<ul class="nav navbar-nav">
                空空中
            </ul>--}}

            {{-- 右邊的 Navbar --}}
            <ul class="nav navbar-nav navbar-right">
                @can('management')
                <li class="dropdown mydropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        管理 <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="http://lovenery.me/old/">去年的</a></li>
                        <li><a href="http://lovenery.me/">今年的</a></li>
                        <li class="active"><a href="{{ url('/admin') }}">後台管理</a></li>
                        <li><a href="{{ url('/ann') }}">公告管理</a></li>
                        <li><a href="{{ url('/home/background') }}">變更背景</a></li>
                        <li><a href="{{ route('watchtower.user.index') }}">使用者列表</a></li>
                    </ul>
                </li>
                @endcan
                <li><a href="{{ url('/doc') }}">新生必讀</a></li>
                <li><a href="{{ url('/Q&A/all') }}">新生Q&amp;A</a></li>
                <li><a href="{{ url('/campus') }}">校園導覽</a></li>
                <li><a href="{{ url('/groups') }}">系所社團</a></li>
                <li><a href="{{ url('/life') }}">中大生活</a></li>
                <li><a href="{{ url('/videos') }}">影音專區</a></li>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> 登入</a></li>
                @else
                    <li class="dropdown mydropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{action('PersonalController@index',Auth::user()->id)}}"><i class="fa fa-users"></i>個人專區</a></li>
                            <li><a href="{{ url('/smallgame') }}"><i class="fa fa-gamepad"></i>小遊戲</a></li>
                            <li><a href="{{ url('/user/edit') }}"><i class="fa fa-user"></i>修改資料</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i>登出</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
