@extends('layouts.app')

@section('title','Q&A')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

@section('js')
@stop

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1>Q&A</h1>
        <a href="{{action('QandAController@create')}}" class="btn btn-lg">我要發問!</a>
    </div>
    <div class="row">
        
    </div>

    <div class="row">
        <div class="col-xs-3" >
            <div class="btn-group-vertical col-sm-12" role="group">
                 <button type="button" class="btn btn-default btn-lg btn-block">所有問題</button>
                 <button type="button" class="btn btn-default btn-lg btn-block">校園生活</button>
                 <button type="button" class="btn btn-default btn-lg btn-block">學生事務</button>
                 <button type="button" class="btn btn-default btn-lg btn-block">宿舍生活</button>
                 <button type="button" class="btn btn-default btn-lg btn-block">其他</button>
                 <button type="button" class="btn btn-default btn-lg btn-block">我的發問記錄</button>            
            </div>
        </div>

        <div class="well col-xs-7">
                 <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>排行</th>
                        <th>日期</th>
                        <th>標題</th>
                        <th>點閱率</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($QandAs as $Q)
                      <tr>
                        <td>{{ $Q->id }}</td>
                        <td>{{ $Q->created_at }}</td>
                        <td>{{ $Q->content }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
        </div>
    </div>
                      
</div>                

 



@endsection