@extends('layouts.layout')
@section('title','提出疑問|Q&A')


@section('content')
<div class="container">
@include('Q&A.Q&Alayouts')
    <div class="col-md-8">
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
            
            <div class="form-group label-floating">
              <label class="control-label" for="focusedInput1">標題</label>
              <input class="form-control" name="topic" type="text">
            </div>

             <div class="form-group label-floating">
              <label class="control-label">詳細描述</label>
              <textarea name="content" class="form-control" rows="5"></textarea>
              <span class="help-block">TESTTTT</span>
            </div>
            
            <button type="submit" class="col-md-3 btn btn-info btn-raised">Submit</button>
          </form>
    </div>
</div>  
@endsection