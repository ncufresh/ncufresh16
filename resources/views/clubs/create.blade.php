@extends('layouts.layout')
@section('title', '系所社團')
@section('content')

	<div class="container">
		<form action="{{ URL::action('ClubController@store') }}" method="post">
		{{csrf_field()}}
		<div class="content">
			<div class="form-group">
			<label>選擇類別</label>
					<select class="selectpicker" data-live-search="true" name="clubs_kind">
						<option value="1">學術性</option>
						<option value="2">康樂性</option>
						<option value="3">聯誼性</option>
						<option value="4">服務性</option>	
					</select>
			</div>

			<div class="form-group">
			  	<label for="usr">社團名稱</label>
			  	<input type="text" class="form-control" id="usr" name="clubs_intro">
			</div>
				 		
			<!-- 社團封面照 -->
			<div class="form-group">
			  	<label>社團封面照</label>				
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
			</div>	
			<div class="form-group">
				<label>社團簡介</label>
				<textarea type="text" name="clubs_summary"></textarea>
			</div>

			<div class="form-group">
				<label>社團活動</label>
				<textarea type="text" name="clubs_activity"></textarea>
			</div>

			<div class="form-group">
				<label>如何參加</label>
				<textarea type="text" name="clubs_join"></textarea>
			</div>

			<div id="test">
				<input class="btn btn-warning btn-raised" id="button" type="button" value="Add photo" />
	 		</div>
				
			
			<th colspan="2">
	            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
	            <input class="btn btn-primary btn-raised" type="submit" value="submit">
	        </th>
        </div>
	</div>
	</form>

	@section('js')
	<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript">
	CKEDITOR.replace( 'clubs_summary', {
	    filebrowserImageBrowseUrl: '{{ url('laravel-filemanager?type=Images') }}',
	    filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
	    filebrowserBrowseUrl: '{{ url('laravel-filemanager?type=Files') }}',
	    filebrowserUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
	});
	CKEDITOR.replace( 'clubs_activity', {
	    filebrowserImageBrowseUrl: '{{ url('laravel-filemanager?type=Images') }}',
	    filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
	    filebrowserBrowseUrl: '{{ url('laravel-filemanager?type=Files') }}',
	    filebrowserUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
	});
	CKEDITOR.replace( 'clubs_join', {
	    filebrowserImageBrowseUrl: '{{ url('laravel-filemanager?type=Images') }}',
	    filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
	    filebrowserBrowseUrl: '{{ url('laravel-filemanager?type=Files') }}',
	    filebrowserUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
	});
	</script>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	<script type="text/javascript">
	    $('.selectpicker').selectpicker({
	    	style: 'btn-primary',
  			size: 4
	    });
	</script>
	@stop
	
@endsection



