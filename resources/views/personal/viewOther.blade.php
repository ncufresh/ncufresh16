@extends('personal.layout')
@section('title','找尋他人')
@section('css')
<style type="text/css">
.col-sm-3{
	margin-top: 0.5rem; 
	margin-bottom: 1rem;
}
.card-img-top{
	width: 100%;
	height :150px;
	background-size: 100% 100%;
	background-repeat: no-repeat;

}
.profile{
	width: 250px;
	height :200px;
	background-size: 100% 100%;
	background-repeat: no-repeat;
}
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('../img/personal/search.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
.jump{
	display: none;  
}
</style>
@stop
@section('content')
<div class="container">
<div class="row">
	<input id="search" type="text" name="search" placeholder="Search..輸入完請按Enter">
</div><br>
<div class="row">
	<div class="panel panel-success" style="display:none;">
		<div class="panel-heading">可以搜尋人喔</div>
		<div  id="show" class="panel-body">
			<span class="result">可以搜尋人喔</span>
		</div>
	</div>
</div>
<div class="row">
		@foreach($users as  $row)
		<style type="text/css">
		#a{{$row->id}}:hover .jump{
		display: block;  /* 當滑鼠移至該篇文章時，設定以block顯示，可設定超連結以一個區塊顯示 */
		width: auto;  /* 設定長與寬 */
		height: auto;
		position: absolute;  /* 將繼續閱讀的位置放置於文章左上角，top=0, left=0 */
		top: -20px;
		left: 50px;
		z-index: 100;
		}
		</style>
		<div class="col-sm-3">
		<section id="a{{$row->id}}">
			<div class="card">
		
				<img class="img card-img-top" style="background-image: url({{asset('upload/background/'.$row->background)}});">
				<div class="card-block">
				    <h4 class="card-title">{{$row->name}}</h4>
				    <p class="card-text" style="height:20px;"><?php echo substr($row->intro,0,10) ?></p>
				    
			  	</div>		
			</div>
				<div class="jumbotron jump"><img class="img profile img-thumbnail" style="background-image: url({{asset('upload/avatars/'.$row->avatar)}});"><a  href="{{action('PersonalController@index',$row->id)}}" class="btn btn-primary btn-raised">看大圖</a></div>
		</section>
		</div>

		@endforeach
</div>
 {{ $users->links() }}
</div>
@endsection

@section('js')
 <script type="text/javascript">
 	$(document).ready(function(){
    	$("input").change(function(){
    		
	    	let keyy = $(this).val();
		    $.get( "/personal/viewOther/search", { key: keyy }, function( data ) {
		    	$(".result").remove();
		    	$(".panel").css('display','block');
		    	if(!data[0]){
		    		
			    	$('.panel').addClass('panel-danger');
					$('.panel').removeClass('panel-success');
					$('.panel-heading').text("沒有\""+keyy+"\"的相關搜尋喔~(有沒有打錯字?)");
				}else{
					$('.panel').addClass('panel-success');
					$('.panel').removeClass('panel-danger');
					$('.panel-heading').text("搜尋到囉~");
		    		for (var i=0;i<data.length;i++){
		    			str = "<span class='result'><style type='text/css'>.jump{ display: none;}#a"+data[i].id+":hover .jump{display: block;width: auto;height: auto;position: absolute; top: -20px;left: 50px;z-index: 100;}</style><div class='col-sm-3'><section id='a"+data[i].id+"'><div class='card'><img class='img card-img-top' style='background-image: url(\"../upload/background/"+data[i].background+"\");'><div class='card-block'><h4 class='card-title'>"+data[i].name+"</h4><p class='card-text' style='height:20px;'>"+data[i].intro.substring(0, 10)+"</p></div></div><div class='jumbotron jump'><img class='img profile img-thumbnail' style='background-image: url(\"../upload/avatars/"+data[i].avatar+"\");'><a  href='/personal/"+data[i].id+"' class='btn btn-primary btn-raised'>看大圖</a></div></section></div></span>";
			    	$("#show").append(str);

		    	}
			    	
			    }
			});
		});

	});
 </script>
@stop