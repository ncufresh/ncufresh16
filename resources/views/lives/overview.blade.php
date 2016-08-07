@extends('layouts.layout')

@section('title', '中大生活')

@section('css')
<link rel="stylesheet" href="{{ asset('css/overview.css') }}">
<style type="text/css">
	body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%); }
	main { background-image:url("{{asset('img/layout/spring.png')}}"); }
	#groundFrame{
			height: 100vh;	
			position: relative;
			background-image: url({{asset('img/life/sun.png')}});
		 	background-repeat:no-repeat;
		 	background-position: center center;
	}
	
	

</style>


@stop

@section('js')
<script src="{{ asset('js/overview.js') }}"></script>

@stop

@section('content')
				
<div class="container" >
	
	<!-- 背景 -->
	<div id="groundFrame">
			
	<div id="lifeFrame">
		<img src= "{{asset('img/life/nculife.png')}}">
	</div>
	
	<!-- 食 -->
		<div class="puzzle" id="foodFrame">
		<img class="img-responsive dropdown-toggle" data-toggle="collapse" data-target="#foodMenu" src="{{ asset('img/life/food.png')  }}">
		</div>
		<ul class="collapse menu" id="foodMenu">
		@foreach ($food as $food)
		<li><img src="{{ asset('img/life/knife.png')  }}"><a href="{{action('LifeController@getContent',['food', $food->id])}}">{{ $food->title }}</a></li>
		@can('management') 
		<!--title更改鈕 -->
		<form action="{{ url('life/'.$food->topic.'/'.$food->id).'/update' }}" method="POST">
		     {{ csrf_field() }}
		     {{ method_field('PATCH') }}
		<input class="form-control type="text" name="title" value="{{ $food->title }}">
		<!-- <button class="material-icons">edit</button> -->
		<button type="submit" class="material-icons">done</button>
		</form>	

		<!-- title刪除紐 -->
		<form action="{{ url('life/'.$food->id) }}" method="POST">
			{!! csrf_field() !!}
			{!! method_field('DELETE') !!}
				<button type="submit" class="material-icons">delete_forever</button>
			</form>
			@endcan
		@endforeach

		<!--title新增鈕 -->
		@can('management') 
		<li>
			<form action="{{ url('life') }}" method="POST">
		    {{ csrf_field() }}
		    <input class="form-control" type="text" name="title" placeholder="在這裡新增標題">
		    <input type="hidden" name="topic" value="food">
		    <button class="submit-title" type="submit">新增</button>
			</form>
		</li>
		@endcan
	</ul>	
	
	<!-- 住 -->
	<div class="puzzle" id="housingFrame">
		<img class="img-responsive dropdown-toggle" data-toggle="collapse" data-target="#housingMenu" src="{{ asset('img/life/housing.png')  }}">
	</div>	
	<ul class="collapse menu" id="housingMenu">
		@foreach ($housing as $housing)
		<li><img  src="{{ asset('img/life/cloth.png')  }}"> <a href="{{action('LifeController@getContent',['housing', $housing->id])}}">{{ $housing->title }}</a></li>

		@can('management') 
		<!--title更改鈕 -->
		<form action="{{ url('life/'.$housing->topic.'/'.$housing->id).'/update' }}" method="POST">
		     {{ csrf_field() }}
		     {{ method_field('PATCH') }}
		<input class="form-control type="text" name="title" value="{{ $housing->title }}">
		<!-- <button class="material-icons">edit</button> -->
		<button type="submit" class="material-icons">done</button>
		</form>	

		<!-- title刪除紐 -->
		<form action="{{ url('life/'.$housing->id) }}" method="POST">
			{!! csrf_field() !!}
			{!! method_field('DELETE') !!}
				<button type="submit" class="material-icons">delete_forever</button>
			</form>
		@endcan
		@endforeach

		@can('management') 
		<li>
			<form action="{{ url('life') }}" method="POST">
		    {{ csrf_field() }}
		    <input class="form-control" type="text" name="title">
		    <input type="hidden" name="topic" value="housing">
		    <button class="submit-title" type="submit">新增</button>
			</form>
		</li>
		@endcan
	</ul>
	
	<!-- 行 -->
	<div class="puzzle" id="transportationFrame">
		<img class="img-responsive dropdown-toggle" data-toggle="collapse" data-target="#transportationMenu" src="{{ asset('img/life/transportation.png')  }}">
	</div>
	<ul class="collapse menu" id="transportationMenu">
		@foreach ($transportation as $transportation)
		<li><img   src="{{ asset('img/life/foot.png')  }}"> <a href="{{action('LifeController@getContent',['transportation', $transportation->id])}}">{{ $transportation->title }}</a></li>
		@can('management') 
		<!--title更改鈕 -->
		<form action="{{ url('life/'.$transportation->topic.'/'.$transportation->id).'/update' }}" method="POST">
	    {{ csrf_field() }}
	    {{ method_field('PATCH') }}
		<input class="form-control type="text" name="title" value="{{ $transportation->title }}">
		<button type="submit" class="material-icons">done</button>
		</form>	

		<!-- title刪除紐 -->
		<form action="{{ url('life/'.$transportation->id) }}" method="POST">
			{!! csrf_field() !!}
			{!! method_field('DELETE') !!}
				<button type="submit" class="material-icons">delete_forever</button>
			</form>
		@endcan
		@endforeach

		@can('management') 
		<li>
			<form action="{{ url('life') }}" method="POST">
		    {{ csrf_field() }}
		    <input class="form-control" type="text" name="title">
		    <input type="hidden" name="topic" value="transportation">
		    <button class="submit-title" type="submit">新增</button>
			</form>
		</li>
		@endcan
		</ul>
	
	
	<!-- 育 -->
	<div class="puzzle" id="educationFrame">
		<img class="img-responsive dropdown-toggle" type="button" data-toggle="collapse" data-target="#educationMenu" src="{{ asset('img/life/education.png')  }}">
	</div>
	<ul class="collapse menu" id="educationMenu">
		@foreach ($education as $education)
		<li><img  src="{{ asset('img/life/pen.png')  }}"> <a href="{{action('LifeController@getContent',['education', $education->id])}}">{{ $education->title }}</a></li>
		@can('management') 
		<!--title更改鈕 -->
		<form action="{{ url('life/'.$education->topic.'/'.$education->id).'/update' }}" method="POST">
		     {{ csrf_field() }}
		     {{ method_field('PATCH') }}
		<input class="form-control type="text" name="title" value="{{ $education->title }}">
		<!-- <button class="material-icons">edit</button> -->
		<button type="submit" class="material-icons">done</button>
		</form>	

		<!-- title刪除紐 -->
		<form action="{{ url('life/'.$education->id) }}" method="POST">
			{!! csrf_field() !!}
			{!! method_field('DELETE') !!}
			<button type="submit" class="material-icons">delete_forever</button>
		</form>
		@endcan
		@endforeach

		@can('management') 
		<li>
			<form action="{{ url('life') }}" method="POST">
		    {{ csrf_field() }}
		    <input class="form-control" type="text" name="title">
		    <input type="hidden" name="topic" value="education">
		    <button class="submit-title" type="submit">新增</button>
			</form>
		</li>
		@endcan
	</ul>
	
	
	<!-- 樂 -->
	<div class="puzzle" id="entertainmentFrame">
		<img class="img-responsive dropdown-toggle" type="button" data-toggle="collapse" data-target="#entertainmentMenu" src="{{ asset('img/life/entertainment.png')  }}">
	</div>
	<ul class="collapse menu" id="entertainmentMenu">
		@foreach ($entertainment as $entertainment)
		<li><img  src="{{ asset('img/life/mic.png')  }}"> <a href="{{action('LifeController@getContent',['entertainment', $entertainment->id])}}">{{ $entertainment->title }}</a></li>
		@can('management') 
		<!--title更改鈕 -->
		<form action="{{ url('life/'.$entertainment->topic.'/'.$entertainment->id).'/update' }}" method="POST">
		     {{ csrf_field() }}
		     {{ method_field('PATCH') }}
		<input class="form-control type="text" name="title" value="{{ $entertainment->title }}">
		<!-- <button class="material-icons">edit</button> -->
		<button type="submit" class="material-icons">done</button>
		</form>	

		<!-- title刪除紐 -->
		<form action="{{ url('life/'.$entertainment->id) }}" method="POST">
			{!! csrf_field() !!}
			{!! method_field('DELETE') !!}
			<button type="submit" class="material-icons">delete_forever</button>
		</form>
		@endcan
			@endforeach

		@can('management') 
		<li>
			<form action="{{ url('life') }}" method="POST">
			    {{ csrf_field() }}
			    <input class="form-control" type="text" name="title">
			    <input type="hidden" name="topic" value="entertainment">
			    <button class="submit-title" type="submit">新增</button>
			</form>
		</li>
		@endcan
		</ul>

	</div>
	 	<a href=""><img class="video_url" id="food_video" src="{{ asset('img/videos/TV.png') }}"></a>
	 	<a href=""><img class="video_url" id="housing_video" src="{{ asset('img/videos/TV.png') }}"></a>
	 	<a href=""><img class="video_url" id="transportation_video" src="{{ asset('img/videos/TV.png') }}"></a>
	 	<a href=""><img class="video_url" id="education_video" src="{{ asset('img/videos/TV.png') }}"></a>
	 	<a href=""><img class="video_url" id="entertainment_video" src="{{ asset('img/videos/TV.png') }}"></a>
	</div>

@endsection
