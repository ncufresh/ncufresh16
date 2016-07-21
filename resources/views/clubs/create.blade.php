@extends('layouts.layout')

@section('js')
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script type="text/javascript">
$('#lfm').filemanager('image');

</script>
@stop

@section('content')
@foreach($test as $t)
<p>{{$t}}</p>
@endforeach
	<form action="{{ URL::action('ClubController@store') }}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
		<br><br><br><br><br><br><br><br>
		<div>
			
			<label>選擇類別</label>
				<div>
					<select name="clubs_kind">
						<option value="1">學術性</option>
						<option value="2">康樂性</option>
						<option value="3">聯誼性</option>
						<option value="4">服務性</option>	
					</select>
				</div>
				
		</div>
		<div>
			<input type="text" name="clubs_intro">
			<label>社團名稱</label>
		</div>


		
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
			<input type="text" name="clubs_summary">
			<label>社團簡介</label>
		</div>

		<div>
			<input type="text" name="clubs_activity">
			<label>社團活動</label>
		</div>

		<div>
			<input type="text" name="clubs_join">
			<label>如何參加</label>
		</div>

		<th colspan="2">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="submit" value="submit">
        </th>
        
		<div class="input-group">
			<span class="input-group-btn">
		    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
		      <i class="fa fa-picture-o"></i> Choose
		    </a>
		  	</span>
		  	<input id="thumbnail" class="form-control" type="text" name="clubs_file">
		  	
       		</input>
		</div>
			
	</form>

	
@endsection
