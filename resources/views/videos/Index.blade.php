@extends('layouts.layout')
@section('title', '影音專區')

@section('content')

<style>
.panel.panel-default{
	margin-left: 2%;
	margin-right: 2%;
	margin-top: 2%;
}
.panel.panel-success{
	margin-left: 2%;
	margin-right: 2%;
	margin-top: 2%;
}
.panel.panel-info{
	margin-left: 2%;
	margin-right: 2%;
	margin-top: 2%;
}
.panel.panel-warning{
	margin-left: 2%;
	margin-right: 2%;
	margin-top: 2%;
}
.panel.panel-danger{
	margin-left: 2%;
	margin-right: 2%;
	margin-top: 2%;
}
.panel.panel-primary{
	margin-left: 2%;
	margin-right: 2%;
	margin-top: 2%;
}
.add{
	margin-top: 4%;
	margin-left: 2%;
}
</style>

<div class="add">
	<a href="{{ url('/videos/create') }}">
	<input type="button" value="新增" style="width:120px;height:40px;border:2px blue none;"></a>
</div>
  {{ csrf_field() }}
<div class="panel panel-primary">
  <div class="panel-heading">食</div>
  <div class="panel-body">
    新增
  </div>
</div>

<div class="panel panel-success">
  <div class="panel-heading">住</div>
  <div class="panel-body">
    新增
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">行</div>
  <div class="panel-body">
    新增
  </div>
</div>

<div class="panel panel-warning">
  <div class="panel-heading">育</div>
  <div class="panel-body">
    新增
  </div>
</div>

<div class="panel panel-danger">
  <div class="panel-heading">樂</div>
  <div class="panel-body">
    新增
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">其他</div>
  <div class="panel-body">
    新增
  </div>
</div>
<br>
@endsection