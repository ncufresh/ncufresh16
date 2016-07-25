@extends('layouts.app')
@section('title', '新增')

@section('content')

<style>
.row{
	margin-top: 4%;
	margin-left: 2%;
}
</style>

<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="嵌入網址">
      <br><br>
      <input type="text" class="form-control" placeholder="輸入類型">
      <br><br>
      <textarea name="departments_intro" cols="50" rows="10"></textarea>
      <br><br>
      </div>
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">確定</button>
      </span>
    
  </div>
</div>
@endsection