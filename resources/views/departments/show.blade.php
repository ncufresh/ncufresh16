@extends('layouts.layout')
@section('title', '系所社團')
@section('content')
@section('js')
<script type="text/javascript">
	$(document).ready(function(){
    	$(".container").css('display','none').fadeIn(1000);
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	<script type="text/javascript">
	    $('.selectpicker').selectpicker({
	    	style: 'btn-primary',
  			size: 7
	    });
	</script>
@stop
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
<style type="text/css">
body{
	background-image: url({{asset('img/group/BG1.jpg')}});
	background-repeat: no-repeat;
    background-size:cover;
    color: #333;
}
.modal-content{
	background-image: url({{asset('img/group/BG2.jpg')}});
	background-repeat: no-repeat;
    background-size:cover;
    color: #333;
}
.img{
	width: 90%;
    height: auto;
}
.modal-title{
	margin-bottom: 0px;
	text-align:center;
}
.col-sm-3{
	margin-top: 20px;

}
.col-xs-3{
	margin-top: 20px;
}
pre{
	white-space: pre-wrap;
	max-height: 400px;
  	overflow: auto;
}
h3{
	text-align:center;
}
.open{
	max-height: 500px !important;
}
.breadcrumb{
	margin-bottom: 5px;
}
.carousel-inner > .item > img{
    min-width:100%;
  	height:auto;
}
</style>
@stop
<div class="container">
	<ol class="breadcrumb">
		<li><a href="/">首頁</a></li>
		<li><a href="{{ url('/groups') }}">系所社團</a></li>
		<li><a href="{{ url('/groups/departments') }}">系所</a></li>
		@foreach ($departments as $department)
			@if($department->departments_kind == 1)
			<li><a href="{{ url('/groups/departments/1') }}">文學院</a></li>
			@break	
			@elseif($department->departments_kind == 2)
			<li><a href="{{ url('/groups/departments/2') }}">理學院</a></li>
			@break
			@elseif($department->departments_kind == 3)
			<li><a href="{{ url('/groups/departments/3') }}">工學院</a></li>
			@break
			@elseif($department->departments_kind == 4)
			<li><a href="{{ url('/groups/departments/4') }}">管理學院</a></li>
			@break
			@elseif($department->departments_kind == 5)
			<li><a href="{{ url('/groups/departments/5') }}">資訊電機學院</a></li>
			@break
			@elseif($department->departments_kind == 6)
			<li><a href="{{ url('/groups/departments/6') }}">地球科學學院</a></li>
			@break
			@elseif($department->departments_kind == 7)
			<li><a href="{{ url('/groups/departments/7') }}">客家學院</a></li>
			@break
			@else
			<li><a href="{{ url('/groups/departments/8') }}">生醫理工學院</a></li>
			@break
			@endif
		@endforeach</ol>
	<div class="select">
	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	<select class="selectpicker" data-live-search="true" onChange="window.location.href=this.value" title="我想找OO社/系..." data-width="fit">
			<optgroup label="社團">
				<option data-tokens="學術性 手語社 如來實證社 弦樂團 青年領袖社 動畫社 演辯社 酷兒文化研究社 模擬聯合國社 禪學社 攝影社 ERP顧問研習社 中智社 天文社 布袋戲研究社 松林詩社 法輪功社 美術社 馬術社 聖經真理研究社 福智青年社 網路開源社 機車研究社 證券研究社 覺聲佛學社" data-subtext="手語社 模聯社 天文社..." value="/groups/clubs/1">學術性</option>
		  		<option data-tokens="康樂性 滑板社 火舞藝術研究社 足球社 跆拳道社 國樂社 網球社 管樂社 熱門舞蹈社 鋼琴社 魔術社 松濤電台 太極社 合氣道社 吉他社 羽球社 中央大學松濤壘球聯盟 松韻口琴社 柔道社 國術社 國際標準舞蹈社 現代舞蹈社 圍棋社 登山社 街頭地板舞蹈社 象棋社 劍道社 熱門音樂社 雜技社 競技拉拉社 籃球聯盟社" data-subtext="熱舞社 熱音社 吉他社..." value="/groups/clubs/2">康樂性</option>
		  		<option data-tokens="聯誼性 彰化校友會 雄友會 美食社 咖啡研究社 蘭陽校友會 轉學生聯誼會 僑生聯誼社 新竹校友會 雲嘉會 港澳同學會 桃園地區校友會 信心之家 金門地區校友會 花蓮地區校友會 松山校友會 台南校友會 台中南投地區學生校友會" data-subtext="各地區校友會 美食社 咖啡社..." value="/groups/clubs/3">聯誼性</option>
		  		<option data-tokens="服務性 汪汪社 真善美社 AIESEC國際經濟商管學生會 基服社 崇青社 慈青社 小松鼠志工隊 急救社 原愛社 愛鄰社 慈幼社 瑪潮關懷社 小中大電視台" data-subtext="AIESEC 慈幼社 小中大..." value="/groups/clubs/4">服務性</option>
		  	</optgroup>
		  	<optgroup label="系所">
				<option data-tokens="文學院 法國語文學系 英美語文學系 中國語文學系 哲學研究所 學習與教學研究所 歷史研究所 藝術學研究所" data-subtext="法文系 英文系 中文系..." value="/groups/departments/1">文學院</option>
		  		<option data-tokens="理學院 理學院學士班 化學學系 光電科學與工程學系 物理學系 數學系 天文研究所 統計研究所" data-subtext="化學系 光電系 物理系..." value="/groups/departments/2">理學院</option>
		  		<option data-tokens="工學院 土木工程學系 化學工程與材料工程學系 機械工程學系 材料科學與工程研究所 能源工程研究所 營建管理研究所 環境工程研究所" data-subtext="機械系 化工系 材料系..." value="/groups/departments/3">工學院</option>
		  		<option data-tokens="管理學院 企業管理學系 財務金融學系 經濟學系 資訊管理學系 人力資源管理研究所 工業管理研究所 產業經濟研究所 會計研究所" data-subtext="資管系 企管系 財經系..." value="/groups/departments/4">管理學院</option>
				<option data-tokens="資訊電機學院 通訊工程學系 資訊工程學系 電機工程學系 網路學習科技研究所" data-subtext="資工系 電機系 通訊系..." value="/groups/departments/5">資訊電機學院</option>
		  		<option data-tokens="地球科學學院 大氣科學學系 地球科學學系 太空科學研究所 水文與海洋科學研究所 應用地質研究所" data-subtext="大氣系 地科系..." value="/groups/departments/6">地球科學學院</option>
		  		<option data-tokens="客家學院 客家語文暨社會科學學系 法律與政府研究所" data-subtext="客家系 法律與政府研究所" value="/groups/departments/7">客家學院</option>
		  		<option data-tokens="生醫理工學院 生命科學系 生醫科學與工程學系 認知神經科學研究所" data-subtext="生科系 生醫系..." value="/groups/departments/8">生醫理工學院</option>
			</optgroup>
			</select></div>

<!-- 權限 -->
@can('management')		
	<a href="{{ url('/groups/departments/create') }}" class="btn btn-success btn-raised" role="button">新增</a>
@endcan
<div class="row">
	@foreach ($departments as $department)
	<div class="col-sm-4 col-xs-12 col-md-3 col-lg-3">
	
		<!-- json_decode變陣列 -->
		<?php if ($department->departments_photo_1 != null) {
			$photo1 = json_decode($department->departments_photo_1);
		} ?>
		<?php if ($department->departments_photo_2 != null) {
			$photo2 = json_decode($department->departments_photo_2);
		} ?>
		<?php if ($department->departments_photo_3 != null) {
			$photo3 = json_decode($department->departments_photo_3);
		} ?>
		<?php if ($department->departments_photo_4 != null) {
			$photo4 = json_decode($department->departments_photo_4);
		} ?>
		<?php if ($department->departments_photo_5 != null) {
			$photo5 = json_decode($department->departments_photo_5);
		} ?>
		@can('management')	
		<a href="{{ url('/groups/departments/'.$department->id.'/edit') }}" class="btn btn-warning btn-raised btn-sm" role="button">編輯</a>
		<form class="form" method="post" action="{{ URL::action('DepartmentController@destroy',$department->id) }}">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />  
            <input type="hidden" name="_method" value="delete" />
            <input type="submit" value="刪除" class="btn btn-danger btn-raised btn-sm" onclick="return confirm('是否確定刪除?')"/>
        </form>
		@endcan	  
		  <!-- Trigger the modal with a button -->
		  <!-- 要{{$department->id}} 才不會只顯示第一筆資料 -->
		  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$department->id}}"><img class="img" src="{{$department->departments_file}}"></button>
	</div>
	
		  <!-- Modal -->
		  <!-- 要{{$department->id}} 才不會只顯示第一筆資料 -->
		  <div class="modal fade" id="myModal{{$department->id}}" role="dialog">
		    <div class="modal-dialog  modal-lg">
		      <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body" style="padding-top: 10px;">
		          
					  <h2 class="modal-title">{{$department->departments_intro}}</h2>
					  <div class="row">
					  <div class="col-sm-3	col-xs-3">
					  <ul class="nav nav-pills nav-stacked">
					    <li class="active"><a data-toggle="tab" href="#home{{$department->id}}">系所介紹</a></li>
					    <li><a data-toggle="tab" href="#menu1{{$department->id}}">系學會</a></li>
					    <li><a data-toggle="tab" href="#menu2{{$department->id}}">系所活動</a></li>
					    <li><a data-toggle="tab" href="#menu3{{$department->id}}">系隊</a></li>
					    <li><a data-toggle="tab" href="#menu4{{$department->id}}">系所課程</a></li>
					  </ul>
					  </div>
					  <div class="col-sm-9	col-xs-9">
					  <div class="tab-content">
					    <div id="home{{$department->id}}" class="tab-pane fade in active">
					      <h3>系所介紹</h3>
					      <p>{!!$department->departments_summary!!}</p>
					      <!-- 幻燈片1 -->
					      @if($photo1 != null)
					      	<div id="myCarousel1{{$department->id}}" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo1 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel1{{$department->id}}" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel1{{$department->id}}" data-slide-to="{{$key}}"></li>
									@endif
								@endforeach
								</ol>
							 
							    <!-- Wrapper for slides -->
							    <div class="carousel-inner" role="listbox">
							   	@foreach ($photo1 as $key => $p)
								    @if($key == 0)
										<div class="item active">
								        	<img src="{{$p}}" alt="FailQQ">
								      	</div>
									@else
										<div class="item">
								        	<img src="{{$p}}" alt="FailQQ">
								      	</div>
								    @endif
								@endforeach
								</div>
				    
							     <!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel1{{$department->id}}" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel1{{$department->id}}" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							@endif
							<!-- 幻燈片1 -->
					    </div>
					    <div id="menu1{{$department->id}}" class="tab-pane fade">
					      <h3>系學會</h3>
					      <p>{!!$department->departments_association!!}</p>
					      <!-- 幻燈片2 -->
					      @if($photo2 != null)
					      <div id="myCarousel2{{$department->id}}" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo2 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel2{{$department->id}}" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel2{{$department->id}}" data-slide-to="{{$key}}"></li>
									@endif
								@endforeach
								</ol>
							 
							    <!-- Wrapper for slides -->
							    <div class="carousel-inner" role="listbox">
							   	@foreach ($photo2 as $key => $p)
								    @if($key == 0)
										<div class="item active">
								        	<img src="{{$p}}" alt="FailQQ">
								      	</div>
									@else
										<div class="item">
								        	<img src="{{$p}}" alt="FailQQ">
								      	</div>
								    @endif
								@endforeach
								</div>
				    
							     <!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel2{{$department->id}}" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel2{{$department->id}}" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							@endif
					      	<!-- 幻燈片2 -->
					    </div>
					    <div id="menu2{{$department->id}}" class="tab-pane fade">
					      <h3>系所活動</h3>
					      <p>{!!$department->departments_activity!!}</p>
					      <!-- 幻燈片3 -->
					      @if($photo3 != null)
					      <div id="myCarousel3{{$department->id}}" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo3 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel3{{$department->id}}" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel3{{$department->id}}" data-slide-to="{{$key}}"></li>
									@endif
								@endforeach
								</ol>
							 
							    <!-- Wrapper for slides -->
							    <div class="carousel-inner" role="listbox">
							   	@foreach ($photo3 as $key => $p)
								    @if($key == 0)
										<div class="item active">
								        	<img src="{{$p}}" alt="FailQQ">
								      	</div>
									@else
										<div class="item">
								        	<img src="{{$p}}" alt="FailQQ">
								      	</div>
								    @endif
								@endforeach
								</div>
				    
							     <!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel3{{$department->id}}" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel3{{$department->id}}" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							@endif
					      	<!-- 幻燈片3 -->
					    </div>
					    <div id="menu3{{$department->id}}" class="tab-pane fade">
					      <h3>系隊</h3>
					      <p>{!!$department->departments_sport!!}</p>
					      <!-- 幻燈片4 -->
					      @if($photo4 != null)
					      <div id="myCarousel4{{$department->id}}" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo4 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel4{{$department->id}}" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel4{{$department->id}}" data-slide-to="{{$key}}"></li>
									@endif
								@endforeach
								</ol>
							 
							    <!-- Wrapper for slides -->
							    <div class="carousel-inner" role="listbox">
							   	@foreach ($photo4 as $key => $p)
								    @if($key == 0)
										<div class="item active">
								        	<img src="{{$p}}" alt="FailQQ">
								      	</div>
									@else
										<div class="item">
								        	<img src="{{$p}}" alt="FailQQ">
								      	</div>
								    @endif
								@endforeach
								</div>
				    
							     <!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel4{{$department->id}}" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel4{{$department->id}}" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							@endif
					      	<!-- 幻燈片4 -->
					    </div>
					    <div id="menu4{{$department->id}}" class="tab-pane fade">
					      <h3>系所課程</h3>
					      <p>{!!$department->departments_course!!}</p>
					      <!-- 幻燈片5 -->
					      @if($photo5 != null)
					      <div id="myCarousel5{{$department->id}}" class="carousel slide" data-ride="carousel">
				  			    <!-- Indicators -->
							    <ol class="carousel-indicators">
							    @foreach ($photo5 as $key => $p)
								    @if($key == 0)
										<li data-target="#myCarousel5{{$department->id}}" data-slide-to="{{$key}}" class="active"></li>
									@else
										<li data-target="#myCarousel5{{$department->id}}" data-slide-to="{{$key}}"></li>
									@endif
								@endforeach
								</ol>
							 
							    <!-- Wrapper for slides -->
							    <div class="carousel-inner" role="listbox">
							   	@foreach ($photo5 as $key => $p)
								    @if($key == 0)
										<div class="item active">
								        	<img src="{{$p}}" alt="FailQQ">
								      	</div>
									@else
										<div class="item">
								        	<img src="{{$p}}" alt="FailQQ">
								      	</div>
								    @endif
								@endforeach
								</div>
				    
							     <!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel5{{$department->id}}" role="button" data-slide="prev">
								   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								   <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel5{{$department->id}}" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							@endif
					      	<!-- 幻燈片5 -->
					    </div>
					  </div>
				  	</div>
		        </div>	
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>

		      </div>
		    </div>
		</div>
	@endforeach
</div>
</div>
@endsection