@extends('personal.layout')
@section('title','閒聊')
@section('css')
<style type="">
.tt{
  background-color: #F8BCD0;
}
.tt .time{
    position: absolute;
    left: 90%;
    top: 30%;
}
.ttt{
  background-color: #676767;
}
.ttt h1{
    margin-top: 0px;
    margin-bottom: 0px;
    color: rgb(237, 255, 0);
}

.label{
	background-color: #fce4ec;
	color: red;
	border-radius: 5px;
	font-size: 100%;
}
.profile{
	/*width: 3vw;
	height :4vh;*/
  width: 70px;
  height: 70px;
	background-size: 100% 100%;
	background-repeat: no-repeat;
}

</style>
@stop
@section('content')
<div class="container-fluid">
<br><br><br><br>
<div class="row">
    <div class="col-md-offset-5">
      <a class="btn btn-raised btn-info btn-lg " data-toggle="modal" data-target="#myModal"><img src="{{asset('img/personal/pic38.jpg')}}">我要尬廣</a>
      @can('management')
      <a class="btn btn-success btn-raised btn-lg" data-toggle="modal" data-target="#attention">GM公告</a>
     @endcan
    </div>
</div>
<div class="row">
@foreach($Chats as $row)

@if(!$row->attention)
<div class=" col-md-12">
  <div class="tt">
		<img class="img-circle profile" style="background-image: url({{asset('upload/avatars/'.$row->avatar)}});">
		<b>{{$row->name}}</b>
		<span class="label"><b>ch XX系</b></span>
	  <b>: {{$row->content}}<span class="time">{{$row->created_at}}</span> </b>
    @can('management')
    <button class="btn btn-danger submit" data-id="{{$row->id}}"><i class="fa fa-trash fa-lg"></i> 刪除</button>
    @endcan
  </div>
</div>
@else
<div class=" col-md-12">
  <div class="ttt">
    <h1><b>{{$row->content}}</b>@can('management')
    <button class="btn btn-danger submit" data-id="{{$row->id}}"><i class="fa fa-trash fa-lg"></i> 刪除</button>
    @endcan</h1>
    
  </div>
</div>
@endif
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

 <!-- Modal -->
  <div class="modal fade" id="attention" role="dialog">
    <div class="modal-dialog  modal-lg">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">公告</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" enctype="multipart/form-data" action="{{action('PersonalController@postAttention') }}" method="POST">
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
<script type="text/javascript">
  $( ".submit" ).click(function() {
     if(confirm("你要刪除此則尬廣嗎")){
        var id = $(this).data('id');
        $.post("/personal/chat/admin/"+id, {'_token': '{{ csrf_token() }}' } );
        window.location.reload();
     }
     
});
</script>
@stop