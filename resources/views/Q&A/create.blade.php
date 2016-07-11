@extends('layouts.Q&Alayouts')
@section('title','提出疑問')

@section('Q&Acontent')
    <div class="col-sm-7">
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
            
            <button type="submit" class="col-sm-4 col-md-offset-4 btn btn-info">Submit</button>
          </form>
    </div>
@endsection