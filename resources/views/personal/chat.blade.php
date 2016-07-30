@extends('personal.layout')
@section('title','閒聊')
@section('css')
<style type="">
.col-md-4{
	margin-top: 0.5rem; 
	margin-bottom: 1rem;
}
.panel-body{
	background-color: #F8BCD0;
}
.label{
	background-color: #fce4ec;
	color: red;
	border-radius: 5px;
	font-size: 100%;
}
.profile{
	width: 3vw;
	height :4vh;
	background-size: 100% 100%;
	background-repeat: no-repeat;
}
</style>
@stop
@section('content')
<div class="container">
<div class="row">
<a class="btn btn-raised btn-info"  data-toggle="modal" data-target="#myModal">我要尬廣</a>
</div>
<div class="row">
@foreach($Chats as $row)
	<div class=" col-md-12">
		<div class="panel">
			<div class="panel-body">
			<img class="img-circle profile" style="background-image: url({{asset('upload/avatars/'.$row->avatar)}});">
			<b>{{$row->name}}</b>
			<span class="label"><b>ch XX系</b></span>
		     <b>: {{$row->content}}</b>
  			</div>
		</div>
	</div>
@endforeach
</div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">尬廣很貴</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="{{action('PersonalController@postChat') }}" method="POST">
        {{ csrf_field() }}
           <div class="form-group label-floating">
              <label class="control-label" for="focusedInput1">你要說啥</label>
              <input class="form-control" name="content" type="text">
               <p class="help-block">太露骨的 別說喔 <3</p>
            </div>
        
        </div>
        <div class="modal-footer">
        <input type="submit" class="btn btn-lg btn-raised btn-primary" value="送出">  
          <button type="button" class="btn btn-default btn-raised" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
@stop