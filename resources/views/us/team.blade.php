@extends('us.index')

@section('us')
<div class="col-xs-12">
	<div class="thumbnail about center-block">
		<div id="team">
			<img src="{{ asset('img/us/'.$team.'.JPG') }}" class="about-img">
		@if($team=="execute")
			<a data-toggle="modal" data-target="#execute1"><img src="{{ asset('img/us/blank.png') }}" id="img-execute1"></a>
			<a data-toggle="modal" data-target="#execute2"><img src="{{ asset('img/us/blank.png') }}" id="img-execute2"></a>
		@elseif($team=="plan")
			<a data-toggle="modal" data-target="#plan1"><img src="{{ asset('img/us/blank.png') }}" id="img-plan1"></a>
			<a data-toggle="modal" data-target="#plan2"><img src="{{ asset('img/us/blank.png') }}" id="img-plan2"></a>
			<a data-toggle="modal" data-target="#plan3"><img src="{{ asset('img/us/blank.png') }}" id="img-plan3"></a>
			<a data-toggle="modal" data-target="#plan4"><img src="{{ asset('img/us/blank.png') }}" id="img-plan4"></a>
			<a data-toggle="modal" data-target="#plan5"><img src="{{ asset('img/us/blank.png') }}" id="img-plan5"></a>
			<a data-toggle="modal" data-target="#plan6"><img src="{{ asset('img/us/plan6.jpg') }}" class="img-circle" id="img-plan6"></a>
			<a data-toggle="modal" data-target="#plan6" class="about-size" id="name-plan6">賴<br>子<br>安</a>
		@elseif($team=="program")
			<a data-toggle="modal" data-target="#program1"><img src="{{ asset('img/us/blank.png') }}" id="img-program1"></a>
			<a data-toggle="modal" data-target="#program2"><img src="{{ asset('img/us/blank.png') }}" id="img-program2"></a>
			<a data-toggle="modal" data-target="#program3"><img src="{{ asset('img/us/blank.png') }}" id="img-program3"></a>
			<a data-toggle="modal" data-target="#program4"><img src="{{ asset('img/us/blank.png') }}" id="img-program4"></a>
			<a data-toggle="modal" data-target="#program5"><img src="{{ asset('img/us/blank.png') }}" id="img-program5"></a>
			<a data-toggle="modal" data-target="#program6"><img src="{{ asset('img/us/blank.png') }}" id="img-program6"></a>
			<a data-toggle="modal" data-target="#program7"><img src="{{ asset('img/us/blank.png') }}" id="img-program7"></a>
			<a data-toggle="modal" data-target="#program8"><img src="{{ asset('img/us/blank.png') }}" id="img-program8"></a>
		@elseif($team=="art")
			<a data-toggle="modal" data-target="#art1"><img src="{{ asset('img/us/blank.png') }}" id="img-art1"></a>
			<a data-toggle="modal" data-target="#art2"><img src="{{ asset('img/us/blank.png') }}" id="img-art2"></a>
			<a data-toggle="modal" data-target="#art3"><img src="{{ asset('img/us/blank.png') }}" id="img-art3"></a>
			<a data-toggle="modal" data-target="#art4"><img src="{{ asset('img/us/blank.png') }}" id="img-art4"></a>
			<a data-toggle="modal" data-target="#art5"><img src="{{ asset('img/us/blank.png') }}" id="img-art5"></a>
			<a data-toggle="modal" data-target="#art6"><img src="{{ asset('img/us/blank.png') }}" id="img-art6"></a>
		@else($team=="video")
			
		@endif
		</div>
		
		<div class="caption about-size row">
		@if($team=="execute")
			<style>
				a#execute {
					color: #6280a1;
				}
			</style>
			@include('us.execute')
			<div class="col-xs-12">
				<div class="team-introduce center-block">
					<p>
					<br>
					&emsp;&emsp;執行組負責統籌整個知訊網的相關事宜，與學校各單位、各系學會、社團、學生組織聯絡以及協調；招募知訊網工人、規劃進度、預算、指引整個網站的年度大方向，擔任各組之間溝通橋梁，協同身邊這群一起努力的夥伴，為新生製作最好的知訊網。<br>
					(背景為美工組的各項作品，可惜未能放入其他頁面中)
					</p>
					<a href="." class="btn btn-default pull-right">Return</a>
				</div>
			</div>
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
			<style>
				a#art {
					color: #6280a1;
				}
			</style>
			@include('us.art')
			<div class="col-xs-12">
				<div class="team-introduce center-block">
					<p>
					<br>
					&emsp;&emsp;美工組用他們的畫筆在枯燥乏味的網頁上增添了許多色彩，用心地繪製出網站的各個頁面、和許多精美的圖片，為新生繪出最有活力、最精美的知訊網。
					</p>
					<a href="." class="btn btn-default pull-right">Return</a>
				</div>
			</div>
		@else($team=="video")
			<h3>媒體影音組</h3>
		@endif
		</div>
	</div>
</div>
@endsection