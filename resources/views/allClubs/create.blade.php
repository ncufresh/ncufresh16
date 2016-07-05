@extends('layouts.app')
@section('content')
	<form action="{{ URL::action('AllclubController@store') }}" method="post">
	{{ csrf_field() }}
		<!-- <div>
			<input type=>
			<label>選擇類別</label>
				<div>
					<select>
						<option>
							學術性
							康樂性
							聯誼性
							服務性
						</option>
					</select>
				</div>	
		</div> -->
		<br><br><br><br><br>
		<div>
			<label>社團名稱</label>
			<textarea name="clubs_name" cols="50" rows="10"></textarea>
		</div>
		<div>
			<label>社團簡介</label>
			<textarea name="clubs_content" cols="50" rows="10"></textarea>
		</div>
		<div>
			<label>社團活動</label>
			<textarea name="clubs_activity" cols="50" rows="10"></textarea>
		</div>
		<div>
			<label>如何參加</label>
			<textarea name="clubs_join" cols="50" rows="10"></textarea>
		</div>
		
		<div>
			<input>
				<label>選擇圖片</label>
		</div>
		
	
	<button type="submit">確認</button>
	</form>

	
@endsection
