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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')

</head>
<body id="app-layout" data-spy="scroll" data-target=".navbar" data-offset="50">

    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    <!-- JavaScripts -->
    <script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('include/jquery/jquery.ujs.js') }}"></script>
    <script src="{{ asset('include/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>
