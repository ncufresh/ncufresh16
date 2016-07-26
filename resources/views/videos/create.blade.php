@extends('layouts.layout')
@section('title', '新增')

@section('content')
<style>
.row{
	margin-top: 8%;
	margin-left: 2%;
}
</style>

<form action="{{ URL::action('videoController@store') }}" id="videos_kind" name="videos_kind" method="POST">
  {{ csrf_field() }}
  <div class="col-lg-6">
    <div class="input-group">
      <br><br>
      <input type="text" class="form-control" placeholder="嵌入網址" name="videos">
    <div class="form-group error">
      <label for="videos_kind" class="col-sm-3 control-label" name="videos_kind">選擇影片類別</label>
        <div class="col-sm-9">
          <select name="videos_kind" id="videos_kind" form="videos_kind" class="form-control has-error">
            <option value="food" selected="">食</option>
            <option value="live" selected="">住</option>
            <option value="traffic" selected="">行</option>
            <option value="edu" selected="">育</option>
            <option value="fun" selected="">樂</option>
            <option value="others" selected="">其他</option>
          </select>                                  
        </div>
      </div>
      <br><br>
      <textarea name="videos_intro" cols="50" rows="10"></textarea>
      <br><br>
      </div>
        <button type="submit">確定</button>

    </form>
  </div>
</div>


@endsection