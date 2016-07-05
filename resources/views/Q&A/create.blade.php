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

    <div class="col-sm-6 col-md-offset-3">
       <form action="{{action('QandAController@store')}}" method="post">
        {{ csrf_field() }}
            <div class="form-group">
              <label for="classify">分類</label>
              <select name="classify" class="form-control">
                <option value="school">校園生活</option>
                <option value="student">學生事務</option>
                <option value="dormitory">宿舍生活</option>
                <option value="other">其他</option>
              </select>
            </div>
            <div class="form-group">
              <label for="content">想要問的問題</label>
              <textarea name="content" class="form-control" rows="5" id="comment"></textarea>
            </div>
            
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
    </div>
                      
</div>                

 



@endsection