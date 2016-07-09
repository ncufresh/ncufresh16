@extends('layouts.app')
@section('content')
	<form action="{{ URL::action('ClubController@store') }}" method="post">
	{{csrf_field()}}
		<br><br><br><br><br><br><br><br>
		<<div>
			
			<label>選擇類別</label>
				<div>
					<select name="clubs_kind">
						<option value="1">學術性</option>
						<option value="2">康樂性</option>
						<option value="3">聯誼性</option>
						<option value="4">服務性</option>	
					</select>
				</div>
			</input>	
		</div>
		<div>
			<input type="text" name="clubs_intro">
			<label>社團名稱</label>
		</div>
		<div>
			<input type="file" class="form-control" id="clubs_file" name="clubs_file" placeholder="上傳圖片">
        		<th colspan="2">
               		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
               		<input type="submit" value="submit">
           		</th>
       
		</div>
		
	</form>

	
@endsection
