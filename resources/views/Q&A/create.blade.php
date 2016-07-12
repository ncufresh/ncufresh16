@extends('layouts.Q&Alayouts')
@section('title','提出疑問')
@section('js')
@if (Auth::guest())

  <script type="text/javascript">alert("請先登入喔");window.location.replace("/Q&A/all");</script>      
  @else
@endif
@endsection

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
            
            <div class="form-group label-floating">
              <label class="control-label" for="focusedInput1">標題</label>
              <input class="form-control" name="topic" type="text">
            </div>

             <div class="form-group label-floating">
              <label class="control-label">詳細描述</label>
              <textarea name="content" class="form-control" rows="5"></textarea>
              <span class="help-block">TESTTTT</span>
            </div>
            
            <button type="submit" class="col-sm-3 col-sm-offset-2 btn btn-info btn-raised">Submit</button>
          </form>
    </div>
@endsection