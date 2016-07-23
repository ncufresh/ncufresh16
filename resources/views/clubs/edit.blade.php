@extends('layouts.layout')
@section('content')
	<form method="post" action="{{ URL::action('ClubController@update',$clubs->id) }}">
        {{ csrf_field() }}
    	{{ method_field('PATCH') }}
		<br><br><br><br><br><br><br><br>
		
		<div>
			<input type="text" name="clubs_intro" value="{{$clubs->clubs_intro}}">
			<label>社團名稱</label>
		</div>
 		
		<!-- 社團封面照 -->		
		<div class="input-group">
			<span class="input-group-btn">
		    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
		      <i class="fa fa-picture-o"></i> Choose
		    </a>
		  	</span>
		  	<input id="thumbnail" class="form-control" type="text" name="clubs_file">
		  	
       		</input>
		</div>
		<img id="holder" style="margin-top:15px;max-height:100px;">




		<div>
			<input type="text" name="clubs_summary" value="{{$clubs->clubs_summary}}">
			<label>社團簡介</label>
		</div>

		<div>
			<input type="text" name="clubs_activity" value="{{$clubs->clubs_activity}}">
			<label>社團活動</label>
		</div>

		<div>
			<input type="text" name="clubs_join" value="{{$clubs->clubs_join}}">
			<label>如何參加</label>
		</div>

		<input id="button" type="button" value="Add photo" />
 		<div id="test"></div>
			
		
		<th colspan="2">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="submit" value="submit">
        </th>
	
	</form>

	@section('js')
	<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
	<script type="text/javascript">
	$('#lfm').filemanager('image');
	
	$(document).ready(function(){
		var r = 1;
		$('#button').click(function(){
			$('#test').append('<div class="input-group"><span class="input-group-btn"><a id="lfm'+r+ 
				'" data-input="thumbnail'+r+
				'" data-preview="holder'+r+
				'" class="btn btn-primary"><i class="fa fa-picture-o"></i> Choose</a></span><input id="thumbnail'+r+
				'" class="form-control" type="text" name="clubs_photo[]"></input></div><img id="holder'+r+
				'" style="margin-top:15px;max-height:100px;">');
					$('#lfm' + r ).filemanager('image');
			r++;

		});

	});

	</script>
	@stop
	
@endsection
	
         