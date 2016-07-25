@extends('layouts.layout')

	@section('js')
	<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
	<script type="text/javascript">
	$('#lfm').filemanager('image');
	</script>
	@stop

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
		  	<input id="thumbnail" class="form-control" type="text" name="clubs_file" value="{{$clubs->clubs_file}}">
		  	
       		</input>
		</div>
		<img id="holder" style="margin-top:15px;max-height:100px;" src="{{$clubs->clubs_file}}">

		
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

		<!-- 修改幻燈片 -->
		<!-- json_decode變陣列 -->
		<?php $photo = json_decode($clubs->clubs_photo); ?>
		@foreach ($photo as $key => $p)
		<div class="input-group">
			
			<span class="input-group-btn">
		    <a id="lfm{{$key}}" data-input="thumbnail{{$key}}" data-preview="holder{{$key}}" class="btn btn-primary">
		      <i class="fa fa-picture-o"></i> Choose
		    </a>
		  	</span>
		  	<input id="thumbnail{{$key}}" class="form-control" type="text" name="clubs_photo[]" value="{{$p}}">
		  	
       		</input>
		</div>
		<img id="holder{{$key}}" style="margin-top:15px;max-height:100px;" src="{{$p}}">
		<!-- 更改已有的幻燈片 -->
		<script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>
		<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
		<script type="text/javascript">
			var m = <?php echo $key ?>;
			$('#lfm'+ m).filemanager('image');
		</script>
		
		<!-- 新增幻燈片 -->
		@if($key == count($photo)-1)
			<script type="text/javascript">
			$(document).ready(function(){
				var r = <?php echo $key+1 ?>;
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
		@endif
		@endforeach

		<input id="button" type="button" value="Add photo" />
 		<div id="test"></div>
		

		<th colspan="2">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="submit" value="submit">
        </th>
	
	</form>


	
@endsection
	
         