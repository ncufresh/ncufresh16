@extends('layouts.app')
@section('content')
	<form action="{{ URL::action('ClubController@store') }}" method="post">
	{{csrf_field()}}
		<br><br><br><br><br><br><br><br>
		<div>
			<input type="text" name="clubs_kind">
			<label>社團類型</label>
		</div>
		<div>
			<label>類型介紹</label>
			<textarea name="clubs_intro" cols="50" rows="10"></textarea>
		</div>
		
    	<button type="submit">確認</button>
	</form>

	
@endsection
