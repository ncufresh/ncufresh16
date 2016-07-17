@extends('layouts.layout')

@section('title','分數排行榜')
	@section('css')
		<style>
			.background{
				top:3%;
				left:0%;
				width: 100%;
				height:80%;
				z-index: -1;
				opacity:0.4;
				position:fixed;	
			}

			.title{
				font-size:40px;

			}
			.scores{
				font-size: 30px;
			}

			#totleBoard{

				background-color: rgba(242, 242, 242,0.7);
				border-radius: 20px;
				margin: 0px auto;
				margin-top: 5%;
				margin-left:8%;
				
				padding: 10px;

				height:400px;
				width: 40%;

				display:table; 
	            float: left;

	            text-align:center;
					
			}
			#personalBoard{

				background-color: rgba(242, 242, 242,0.7);
				border-radius: 20px;
				margin: 0px auto;
				margin-top: 5%;
				margin-left:5%;	
				
				padding: 10px;

				height:400px;
				width: 40%;

				display:table; 
	            float: left;

	            text-align:center;
			}
			#goback{
				margin: 0px auto;
				margin-top: 5%;
				margin-left:30px;	

				height:50px;
				width:50px;

			}
		</style>
	@endsection


	@section('content')

		<div>

			<img class="background" src="/img/game/BG_sky.jpg">
			<div class="container" id="totleBoard">
				<!--  這裡可以參考laravel ajax教學的結構 改為table，名次用排序演算法算出後再附上，不要用列表  -->

				<p class="title">總得分排行</p>
				<table class="table">
					<thead>
						<tr>
							<th>名次</th>
	                        <th>username</th>
	                        <th>score</th>
						</tr>
					</thead>
					<tbody id="tasks-list" name="tasks-list">
						<tr>
							<th>1.</th>
	                        <th>tommy522588</th>
	                        <th>100</th>
						</tr>
					</tbody>
				</table>



			</div>

			<div class="container" id="personalBoard">
				<p class="title">個人得分排行</p>
				<table class="table">
					<thead>
						<tr>
							<th>名次</th>
					        <th>username</th>
					        <th>score</th>
						</tr>
					</thead>
					<tbody id="tasks-list" name="tasks-list">
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>	
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
						<tr>
							<th>1.</th>
					        <th>tommy522588</th>
					        <th>100</th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

	@endsection


	@section('js')
		<script>
			$(document).ready(function(){
			  $.ajaxSetup({
			    headers: {
			        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')//csrf token
			    }
			  });
			  var url = "/getScores";
			  var a=2;

			  $.get(url , function (data) {//retrieve data from database
			    //success data
			    console.log(data);
			    questions=data;//若要從資料庫提取複數列的資料，則以陣列表示，真是佛心來的
			  }) 
			  //create new task / update existing task
			  //傳送資料開始
			});
		</script>
	@endsection