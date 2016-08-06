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
			<a data-toggle="modal" data-target="#plan3"><img src="{{ asset('img/us/blank.png') }}" id="img-plan3"></a>
			<a data-toggle="modal" data-target="#plan4"><img src="{{ asset('img/us/blank.png') }}" id="img-plan4"></a>
			<a data-toggle="modal" data-target="#plan5"><img src="{{ asset('img/us/blank.png') }}" id="img-plan5"></a>
			<a data-toggle="modal" data-target="#plan6"><img src="{{ asset('img/us/plan6.jpg') }}" class="img-circle" id="img-plan6"></a>
			<a data-toggle="modal" data-target="#plan6" class="about-size" id="name-plan6">賴<br>子<br>安</a>
		@elseif($team=="program")
			
		@elseif($team=="art")
			
		@else($team=="video")
			
		@endif
		</div>
		
		<div class="caption about-size row">
		@if($team=="execute")
			
		@elseif($team=="plan")
			<style>
				a#plan {
					color: #6280a1;
				}
			</style>
			@include('us.plan')
			<div class="col-xs-12">
				<div class="team-introduce center-block">
					<p>
					<br>
					&emsp;&emsp;企劃組決定了知訊網的首頁風格，以及各種項目的網頁版面、內容。將自己的想法告訴美工組及程設組，由美工使網頁更加生動活潑、由程設使網頁能呈現於新生面前，打造出理想中的知訊網。
					</p>
					<a href="." class="btn btn-default pull-right">Return</a>
				</div>
			</div>
		@elseif($team=="program")
			<style>
				a#program {
					color: #6280a1;
				}
			</style>
			@include('us.program')
			<div class="col-xs-12">
				<div class="team-introduce center-block">
					<p>
					<br>
					&emsp;&emsp;程設組負責架構出網站，使網站有著各種功能，並且運用程式碼完成企劃組所設計出的風格，是將整個知訊網推動的幕後功臣，將帶給新生最好的知訊網體驗。
					</p>
					<a href="." class="btn btn-default pull-right">Return</a>
				</div>
			</div>
		@elseif($team=="art")
			<h3>網頁美工組</h3>
		@else($team=="video")
			<h3>媒體影音組</h3>
		@endif
		</div>
	</div>
</div>
@endsection