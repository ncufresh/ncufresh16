@extends('layouts.app')
@section('content')
	<form>
		<div>
			<input>
			<label>選擇類別</label>
				<div>
					<select>
						<option>
						</option>
					</select>
				</div>	
		</div>
		<div>
			<input>
			<label>負責人</label>
		</div>
		<div>
			<input>
			<label>社辦位置</label>
		</div>
		<div>
			<input>
			<label>社課時間</label>
		</div>
		<div>
			<input>
			<label>社團網址/臉書</label>
		</div>
		<div>
			<input>
			<label>社團名稱</label>
		</div>
		<div>
			<textarea>
			<label>社團簡介</label>
		</div>
		<div>
			<input>
			<label>負責人</label>
		</div>
		<div>
			<input>
				<label>選擇圖片</label>
		</div>
	</form>	
	


	<form action="{{ url('') }}" method="POST">
    	{{ csrf_field() }}
    	<input type="text" name="body">
    	<button type="submit">確認</button>
	</form>

	
@endsection
