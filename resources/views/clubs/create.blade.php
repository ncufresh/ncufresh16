@extends('layouts.app')
@section('content')
	<form action="{{ URL::action('ClubController@store') }}" method="post">
	{{csrf_field()}}
		<br><br><br><br><br><br><br><br>
		<div>
			<input type="text" name="clubs_kind">
			<label>社團名稱</label>
		</div>
		<div>
			<<img src="">
		</div>
		
    	<button type="submit">確認</button>
	</form>

	
@endsection
