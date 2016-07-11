@extends('layouts.Q&Alayouts')
@section('title','提出疑問')

@section('Q&Acontent')
    <div class="col-sm-7">
       <form role="form" action="{{action('QandAController@update',$Q->id)}}" method="post">
        {{ csrf_field() }}{{ method_field('PATCH') }}
            <div class="form-group">
              <label for="classify">分類</label>
              <select name="classify" class="form-control" value="{{$Q->classify}}">
                <option value="school" {{$Q->classify=='school' ? 'SELECTED' : '' }}>校園生活</option>
                <option value="student" {{$Q->classify=='student' ? 'SELECTED' : '' }}>學生事務</option>
                <option value="dormitory" {{$Q->classify=='dormitory' ? 'SELECTED' : ''}}>宿舍生活</option>
                <option value="other" {{$Q->classify=='other' ? 'SELECTED' : '' }}>其他</option>
              </select>
            </div>
            <div class="form-group">
              <label for="content">想要問的問題</label>
              <textarea name="content" class="form-control" rows="5">{{$Q->content}}</textarea>
            </div>
            <div class="form-group">
              <label for="content">回復</label>
              <textarea name="response" class="form-control" rows="5">{{$Q->response}}</textarea>
            </div>
            
            <button type="submit" class="col-sm-4 col-md-offset-4 btn btn-info">Submit</button>
          </form>
    </div>
@endsection