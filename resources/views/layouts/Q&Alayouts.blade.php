@extends('layouts.app')

@section('title','Q&A')

@section('css')
@stop

@section('js')
@stop

@section('content')
  <div class="container">
      <div class="jumbotron">
          <h1>Q&A</h1>
          <a href="{{action('QandAController@create')}}" class="btn btn-info btn-lg"><i class="fa fa-question-circle-o fa-lg" aria-hidden="true"></i>我要發問</a>
      </div>
      <div class="row">
          <div class="col-xs-3" >
              <div class="btn-group-vertical col-sm-12" role="group">
                   
                   <a href="{{action('QandAController@index','all')}}" class="btn btn-primary btn-lg">所有問題</a>
                   <a href="{{action('QandAController@index','school')}}" class="btn btn-primary btn-lg">校園生活</a>
                   <a href="{{action('QandAController@index','student')}}" class="btn btn-primary btn-lg">學生事務</a>
                   <a href="{{action('QandAController@index','dormitory')}}" class="btn btn-primary btn-lg">宿舍生活</a>
                   <a href="{{action('QandAController@index','other')}}" class="btn btn-primary btn-lg">其他</a>
                   <button type="button" class="btn btn-default btn-lg btn-block">我的發問記錄</button>
              </div>
          </div>

          @yield('Q&Acontent')
      </div>
  </div>                

@endsection


