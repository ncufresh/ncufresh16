@extends('layouts.layout')

	@section('js')
	<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
	<script type="text/javascript">
	$('#lfm').filemanager('image');
	</script>
	@stop

@section('content')
	<form method="post" action="{{ URL::action('DepartmentController@update',$departments->id) }}">
        {{ csrf_field() }}
    	{{ method_field('PATCH') }}
		<br><br><br><br><br><br><br><br>
		<div>
			<input type="text" name="departments_intro" value="{{$departments->departments_intro}}">
			<label>系所名稱</label>
		</div>
 		
		<!-- 系所封面照 -->		
		<div class="input-group">
			<span class="input-group-btn">
		    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
		      <i class="fa fa-picture-o"></i> Choose
		    </a>
		  	</span>
		  	<input id="thumbnail" class="form-control" type="text" name="departments_file" value="{{$departments->departments_file}}">
		  	
       		</input>
		</div>
		<img id="holder" style="margin-top:15px;max-height:100px;" src="{{$departments->departments_file}}">




		<div>
			<input type="text" name="departments_summary" value="{{$departments->departments_summary}}">
			<label>系所介紹</label>
			<input id="button1" type="button" value="Add photo" />
	 		<div id="test1"></div>
		</div>

		<div>
			<input type="text" name="departments_association" value="{{$departments->departments_association}}">
			<label>系學會</label>
			<input id="button2" type="button" value="Add photo" />
	 		<div id="test2"></div>
		</div>

		<div>
			<input type="text" name="departments_activity" value="{{$departments->departments_activity}}">
			<label>系上活動</label>
			<input id="button3" type="button" value="Add photo" />
	 		<div id="test3"></div>
		</div>

		<div>
			<input type="text" name="departments_sport" value="{{$departments->departments_sport}}"> 
			<label>系隊</label>
			<input id="button4" type="button" value="Add photo" />
	 		<div id="test4"></div>
		</div>

		<div>
			<input type="text" name="departments_course" value="{{$departments->departments_course}}">
			<label>系上課程</label>
			<input id="button5" type="button" value="Add photo" />
	 		<div id="test5"></div>
		</div>

		<div>
			<label>更改照片</label>
			
			<!-- 修改幻燈片 -->
			<!-- json_decode變陣列 -->
			<?php $photo1 = json_decode($departments->departments_photo_1); ?>
			<?php $photo2 = json_decode($departments->departments_photo_2); ?>
			<?php $photo3 = json_decode($departments->departments_photo_3); ?>
			<?php $photo4 = json_decode($departments->departments_photo_4); ?>
			<?php $photo5 = json_decode($departments->departments_photo_5); ?>		
			
			<label>更改 [系所介紹] 照片</label>
			@foreach ($photo1 as $key => $p)
			<div class="input-group">
				
				<span class="input-group-btn">
			    <a id="lfm1{{$key}}" data-input="thumbnail1{{$key}}" data-preview="holder1{{$key}}" class="btn btn-primary">
			      <i class="fa fa-picture-o"></i> Choose
			    </a>
			  	</span>
			  	<input id="thumbnail1{{$key}}" class="form-control" type="text" name="departments_photo_1[]" value="{{$p}}">
			  	
	       		</input>
			</div>
			<img id="holder1{{$key}}" style="margin-top:15px;max-height:100px;" src="{{$p}}">
			<!-- 更改已有的幻燈片 -->
			<script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>
			<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
			<script type="text/javascript">
				var m = <?php echo $key ?>;
				$('#lfm1'+ m).filemanager('image');
			</script>
		
			<!-- 新增幻燈片 -->
			@if( $key == count($photo1)-1 )
				<script type="text/javascript">
				$(document).ready(function(){
					var r = <?php echo $key+1 ?>;
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
				</script>
			@endif

		@endforeach

		<label>更改 [系學會] 照片</label>
		@foreach ($photo2 as $key => $p)
			<div class="input-group">
				
				<span class="input-group-btn">
			    <a id="lfm2{{$key}}" data-input="thumbnail2{{$key}}" data-preview="holder2{{$key}}" class="btn btn-primary">
			      <i class="fa fa-picture-o"></i> Choose
			    </a>
			  	</span>
			  	<input id="thumbnail2{{$key}}" class="form-control" type="text" name="departments_photo_2[]" value="{{$p}}">
			  	
	       		</input>
			</div>
			<img id="holder2{{$key}}" style="margin-top:15px;max-height:100px;" src="{{$p}}">
			<!-- 更改已有的幻燈片 -->
			<script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>
			<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
			<script type="text/javascript">
				var m = <?php echo $key ?>;
				$('#lfm2'+ m).filemanager('image');
			</script>
		
			<!-- 新增幻燈片 -->
			@if($key == count($photo2)-1)
				<script type="text/javascript">
				$(document).ready(function(){
					var r = <?php echo $key+1 ?>;
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
				</script>
			@endif

		@endforeach

		<label>更改 [系上活動] 照片</label>
		@foreach ($photo3 as $key => $p)
			<div class="input-group">
				
				<span class="input-group-btn">
			    <a id="lfm3{{$key}}" data-input="thumbnail3{{$key}}" data-preview="holder3{{$key}}" class="btn btn-primary">
			      <i class="fa fa-picture-o"></i> Choose
			    </a>
			  	</span>
			  	<input id="thumbnail3{{$key}}" class="form-control" type="text" name="departments_photo_3[]" value="{{$p}}">
			  	
	       		</input>
			</div>
			<img id="holder3{{$key}}" style="margin-top:15px;max-height:100px;" src="{{$p}}">
			<!-- 更改已有的幻燈片 -->
			<script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>
			<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
			<script type="text/javascript">
				var m = <?php echo $key ?>;
				$('#lfm3'+ m).filemanager('image');
			</script>
		
			<!-- 新增幻燈片 -->
			@if($key == count($photo3)-1)
				<script type="text/javascript">
				$(document).ready(function(){
					var r = <?php echo $key+1 ?>;
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
				</script>
			@endif

		@endforeach

		<label>更改 [系隊] 照片</label>
		@foreach ($photo4 as $key => $p)
			<div class="input-group">
				
				<span class="input-group-btn">
			    <a id="lfm4{{$key}}" data-input="thumbnail4{{$key}}" data-preview="holder4{{$key}}" class="btn btn-primary">
			      <i class="fa fa-picture-o"></i> Choose
			    </a>
			  	</span>
			  	<input id="thumbnail4{{$key}}" class="form-control" type="text" name="departments_photo_4[]" value="{{$p}}">
			  	
	       		</input>
			</div>
			<img id="holder4{{$key}}" style="margin-top:15px;max-height:100px;" src="{{$p}}">
			<!-- 更改已有的幻燈片 -->
			<script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>
			<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
			<script type="text/javascript">
				var m = <?php echo $key ?>;
				$('#lfm4'+ m).filemanager('image');
			</script>
		
			<!-- 新增幻燈片 -->
			@if($key == count($photo4)-1)
				<script type="text/javascript">
				$(document).ready(function(){
					var r = <?php echo $key+1 ?>;
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
				</script>
			@endif

		@endforeach

		<label>更改 [系上課程] 照片</label>
		@foreach ($photo5 as $key => $p)
			<div class="input-group">
				
				<span class="input-group-btn">
			    <a id="lfm5{{$key}}" data-input="thumbnail5{{$key}}" data-preview="holder5{{$key}}" class="btn btn-primary">
			      <i class="fa fa-picture-o"></i> Choose
			    </a>
			  	</span>
			  	<input id="thumbnail5{{$key}}" class="form-control" type="text" name="departments_photo_5[]" value="{{$p}}">
			  	
	       		</input>
			</div>
			<img id="holder5{{$key}}" style="margin-top:15px;max-height:100px;" src="{{$p}}">
			<!-- 更改已有的幻燈片 -->
			<script src="{{ asset('include/jquery/jquery-1.12.4.js') }}"></script>
			<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
			<script type="text/javascript">
				var m = <?php echo $key ?>;
				$('#lfm5'+ m).filemanager('image');
			</script>
		
			<!-- 新增幻燈片 -->
			@if($key == count($photo5)-1)
				<script type="text/javascript">
				$(document).ready(function(){
					var r = <?php echo $key+1 ?>;
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
			@endif

		@endforeach
		
		</div>	

		
			
		

		<th colspan="2">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="submit" value="submit">
        </th>
	
	</form>


	
@endsection
	
         