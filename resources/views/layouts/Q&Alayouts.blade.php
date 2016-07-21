@extends('layouts.layout')

@section('title','Q&A')

@section('css')
@stop

@section('js')
@stop

@section('content')
  <div class="container">
      <div class="jumbotron">
          <img src="{{ asset('img/Q&A/QA.png') }}" width="10%" height="10%">
          <img src="{{ asset('img/Q&A/maple4.png') }}" width="10%" height="10%"  align="right" ><br>
          <a href="{{action('QandAController@create')}}" class="btn btn-info btn-lg btn-raised"><i class="fa fa-question-circle-o fa-lg" aria-hidden="true"></i>我要發問</a>
      </div>
      <div class="row">
          <div class="col-xs-3" >
              <div class="btn-group-vertical col-sm-12" role="group">
                   
               <a href="{{action('QandAController@index','all')}}" class="btn btn-primary btn-raised btn-lg">所有問題</a>
               <a href="{{action('QandAController@index','school')}}" class="btn btn-primary btn-raised btn-lg">校園生活</a>
               <a href="{{action('QandAController@index','student')}}" class="btn btn-primary btn-raised btn-lg">學生事務</a>
               <a href="{{action('QandAController@index','dormitory')}}" class="btn btn-primary btn-raised btn-lg">宿舍生活</a>
               <a href="{{action('QandAController@index','other')}}" class="btn btn-primary btn-raised btn-lg">其他</a>
               <a href="{{action('QandAController@indexPersonal')}}" class="btn btn-primary btn-raised btn-lg">我的發問記錄</a>
               @can('management')
                <a href="{{action('QandAController@indexAdmin')}}" class="btn btn-success btn-raised btn-lg">GM</a>
               @endcan
               
              </div>
          </div>

          @yield('Q&Acontent')
      </div>
  </div>                

@endsection


