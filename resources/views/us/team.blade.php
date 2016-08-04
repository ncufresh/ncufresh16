@extends('us.index')

@section('us')
<div class="col-xs-12">
	<div class="thumbnail about center-block">
		<div id="team">
			<img src="{{ asset('img/us/'.$team.'.JPG') }}" class="about-img">
		@if($team=="execute")
			成員：
		@elseif($team=="plan")
			<a data-toggle="modal" data-target="#plan1"><img src="{{ asset('img/us/blank.png') }}" id="img-plan1"></a>
			<a data-toggle="modal" data-target="#plan2"><img src="{{ asset('img/us/blank.png') }}" id="img-plan2"></a>
			<!-- !!!!!!!!!!!!!!!!!!-->
		@elseif($team=="program")
			<h3>程式設計組</h3>
		@elseif($team=="art")
			<h3>網頁美工組</h3>
		@else($team=="video")
			<h3>媒體影音組</h3>
		@endif
		</div>
		
		<div class="caption about-size row">
		@if($team=="execute")
			成員：
		@elseif($team=="plan")
			<style>
				a#plan {
					color: #6280a1;
				}
			</style>
			@include('us.plan')
		@elseif($team=="program")
			<h3>程式設計組</h3>
		@elseif($team=="art")
			<h3>網頁美工組</h3>
		@else($team=="video")
			<h3>媒體影音組</h3>
		@endif
		</div>
	</div>
</div>
@endsection