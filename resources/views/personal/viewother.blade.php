@extends('personal.layout')
@section('title','找尋他人')
@section('css')
<style type="text/css">
.col-sm-3{
	margin-top: 0.5rem; 
	margin-bottom: 1rem;
}
.img{
	width: 100%;
    height: auto;
}
</style>
@stop
@section('content')
<div class="container">
@foreach($users as  $row)
<style type="text/css">

#a{{$row->id}} div{  /* 因為繼續閱讀是個超連結，要用a來定義 */
display: none;  /* 平常設定不要顯示 */
}
#a{{$row->id}}:hover div{
display: block;  /* 當滑鼠移至該篇文章時，設定以block顯示，可設定超連結以一個區塊顯示 */
width: 150px;  /* 設定長與寬 */
height: 150px;
position: absolute;  /* 將繼續閱讀的位置放置於文章左上角，top=0, left=0 */
top: 0px;
left: 250px;
z-index: 100;
}
</style>
<div class="col-sm-3">
	<a id="a{{$row->id}}" href="{{action('PersonalController@index',$row->id)}}">
		<img class="img" src="{{asset('upload/background/'.$row->background)}}">
		<h4 class="card-title">{{$row->name}}</h4>
		<div class="jumbotron"><img class="img profile img-thumbnail" src="{{asset('upload/avatars/'.$row->avatar)}}">dddddddd</div>
	</a>
</div>
@endforeach
</div>
@endsection

@section('js')
 
@stop