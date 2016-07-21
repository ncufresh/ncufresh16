@extends('layouts.layout')

@section('title', 'NCU Fresh | 新生知訊網')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<style media="screen">

#about .row {
  padding: 30px;
}
</style>
@stop

@section('js')
@stop

@section('content')
<div id="all">

<header id="logo">
    <div class="blur">
        <div class="container">
            <div class="intro-text">
                <img class="img-responsive center-block" src="{{ asset('img/home/logo.png') }}">
                <h1 class="text-center">新生都該擁有的校園生活攻略</h1>
                <br>
                <a href="#ann" class="btn btn-circle">
                    <i class="fa fa-angle-double-down fa-3x"></i>
                </a>
            </div>
        </div>
    </div>
</header>

<section id="ann">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="section-heading">最新消息</h2>
            <h4 class="section-subheading text-muted">我們將會定期更新最新消息</h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-6 ann-item">
            <a href="#" class="ann-link" data-toggle="modal">
                <div class="ann-hover">
                    <div class="ann-hover-content">
                        <i class="fa fa-search-plus fa-3x"></i>
                    </div>
                </div>
                <div class="ann-caption">
                    <h4 class="text-muted">2016-08-08</h4>
                    <h4>受理課程停修申請(線上列印停修單)</h4>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-sm-6 ann-item">
            <a href="#" class="ann-link" data-toggle="modal">
                <div class="ann-hover">
                    <div class="ann-hover-content">
                        <i class="fa fa-search-plus fa-3x"></i>
                    </div>
                </div>
                <div class="ann-caption">
                    <h4 class="text-muted">2016-08-08</h4>
                    <h4>顏色可以改</h4>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-sm-6 ann-item">
            <a href="#" class="ann-link" data-toggle="modal">
                <div class="ann-hover">
                    <div class="ann-hover-content">
                        <i class="fa fa-search-plus fa-3x"></i>
                    </div>
                </div>
                <div class="ann-caption">
                    <h4 class="text-muted">2016-08-08</h4>
                    <h4>大一周會-戰勝網路成癮—給網路族／手機族的完全攻略手冊</h4>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-sm-6 ann-item">
            <a href="#" class="ann-link" data-toggle="modal">
                <div class="ann-hover">
                    <div class="ann-hover-content">
                        <i class="fa fa-search-plus fa-3x"></i>
                    </div>
                </div>
                <div class="ann-caption">
                    <h4 class="text-muted">2016-08-08</h4>
                    <h4>大一周會-我的翻轉教室--地球證詞(暫訂)</h4>
                </div>
            </a>
        </div>
    </div>
</div>
</section>

<section id="about">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="section-heading">我們的產品</h2>
            <h4 class="section-subheading text-muted">介紹導覽列的功能</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>新生必讀</h3>
            <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>新生Q&amp;A</h3>
            <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>校園導覽</h3>
            <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>系所社團</h3>
            <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>中大生活</h3>
            <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>影音專區</h3>
            <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
        </div>
    </div>
</div>
</section>


</div> {{-- div#all --}}
@endsection
