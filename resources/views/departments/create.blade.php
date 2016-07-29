@extends('layouts.layout')
@section('title', '系所社團')
@section('content')


	<form action="{{ URL::action('DepartmentController@store') }}" method="post">
	{{csrf_field()}}
		<br><br><br><br><br><br><br><br>
		<div>
			
			<label>選擇類別</label>
				<div>
					<select name="departments_kind">
						<option value="1">文學院</option>
						<option value="2">理學院</option>
						<option value="3">工學院</option>
						<option value="4">管理學院</option>
						<option value="5">資訊電機學院</option>	
						<option value="6">地球科學學院</option>	
						<option value="7">客家學院</option>	
						<option value="8">生醫理工學院</option>		
					</select>
				</div>
				
		</div>
		<div>
			<input type="text" name="departments_intro">
			<label>系所名稱</label>
		</div>
 		
		<!-- 系所封面照 -->		
		<div class="input-group">
			<span class="input-group-btn">
		    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
		      <i class="fa fa-picture-o"></i> Choose
		    </a>
		  	</span>
		  	<input id="thumbnail" class="form-control" type="text" name="departments_file">
		  	
       		</input>
		</div>
		<img id="holder" style="margin-top:15px;max-height:100px;">




		<div>
			<input type="text" name="departments_summary">
			<label>系所介紹</label>
			<input id="button1" type="button" value="Add photo" />
 			<div id="test1"></div>
		</div>

		<div>
			<input type="text" name="departments_association">
			<label>系學會</label>
			<input id="button2" type="button" value="Add photo" />
 			<div id="test2"></div>
		</div>

		<div>
			<input type="text" name="departments_activity">
			<label>系上活動</label>
			<input id="button3" type="button" value="Add photo" />
 			<div id="test3"></div>
		</div>

		<div>
			<input type="text" name="departments_sport">
			<label>系隊</label>
			<input id="button4" type="button" value="Add photo" />
 			<div id="test4"></div>
		</div>

		<div>
			<input type="text" name="departments_course">
			<label>系上課程</label>
			<input id="button5" type="button" value="Add photo" />
 			<div id="test5"></div>
		</div>
		
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
		$('#button1').click(function(){
			$('#test1').append('<div class="input-group"><span class="input-group-btn"><a id="lfm1'+r+ 
				'" data-input="thumbnail1'+r+
				'" data-preview="holder1'+r+
				'" class="btn btn-primary"><i class="fa fa-picture-o"></i> Choose</a></span><input id="thumbnail1'+r+
				'" class="form-control" type="text" name="departments_photo_1[]"></input></div><img id="holder1'+r+
				'" style="margin-top:15px;max-height:100px;">');
					$('#lfm1' + r ).filemanager('image');
			r++;

		});

	});
	$(document).ready(function(){
		var r = 1;
		$('#button2').click(function(){
			$('#test2').append('<div class="input-group"><span class="input-group-btn"><a id="lfm2'+r+ 
				'" data-input="thumbnail2'+r+
				'" data-preview="holder2'+r+
				'" class="btn btn-primary"><i class="fa fa-picture-o"></i> Choose</a></span><input id="thumbnail2'+r+
				'" class="form-control" type="text" name="departments_photo_2[]"></input></div><img id="holder2'+r+
				'" style="margin-top:15px;max-height:100px;">');
					$('#lfm2' + r ).filemanager('image');
			r++;

		});

	});
	$(document).ready(function(){
		var r = 1;
		$('#button3').click(function(){
			$('#test3').append('<div class="input-group"><span class="input-group-btn"><a id="lfm3'+r+ 
				'" data-input="thumbnail3'+r+
				'" data-preview="holder3'+r+
				'" class="btn btn-primary"><i class="fa fa-picture-o"></i> Choose</a></span><input id="thumbnail3'+r+
				'" class="form-control" type="text" name="departments_photo_3[]"></input></div><img id="holder3'+r+
				'" style="margin-top:15px;max-height:100px;">');
					$('#lfm3' + r ).filemanager('image');
			r++;

		});

	});
	$(document).ready(function(){
		var r = 1;
		$('#button4').click(function(){
			$('#test4').append('<div class="input-group"><span class="input-group-btn"><a id="lfm4'+r+ 
				'" data-input="thumbnail4'+r+
				'" data-preview="holder4'+r+
				'" class="btn btn-primary"><i class="fa fa-picture-o"></i> Choose</a></span><input id="thumbnail4'+r+
				'" class="form-control" type="text" name="departments_photo_4[]"></input></div><img id="holder4'+r+
				'" style="margin-top:15px;max-height:100px;">');
					$('#lfm4' + r ).filemanager('image');
			r++;

		});

	});
	$(document).ready(function(){
		var r = 1;
		$('#button5').click(function(){
			$('#test5').append('<div class="input-group"><span class="input-group-btn"><a id="lfm5'+r+ 
				'" data-input="thumbnail5'+r+
				'" data-preview="holder5'+r+
				'" class="btn btn-primary"><i class="fa fa-picture-o"></i> Choose</a></span><input id="thumbnail5'+r+
				'" class="form-control" type="text" name="departments_photo_5[]"></input></div><img id="holder5'+r+
				'" style="margin-top:15px;max-height:100px;">');
					$('#lfm5' + r ).filemanager('image');
			r++;

		});

	});

	</script>
	@stop


	
@endsection



