<style>
body{
	background-color: #ccf2ff;
}

.eat:hover img{
	width: 300px;
	height: 200px;
	-webkit-transform: translate(-8px, -5px);
	-moz-transform: translate(-8px, -5px);
	-o-transform: translate(-8px, -5px);
	transform: translate(-8px, -5px);
}

.live:hover img{
	width: 280px;
	height: 120px;
	-webkit-transform: translate(-8px, -5px);
	-moz-transform: translate(-8px, -5px);
	-o-transform: translate(-8px, -5px);
	transform: translate(-8px, -5px);
}

.traffic:hover img{
	width: 300px;
	height: 150px;
	-webkit-transform: translate(-8px, -5px);
	-moz-transform: translate(-8px, -5px);
	-o-transform: translate(-8px, -5px);
	transform: translate(-8px, -5px);
}
.edu:hover img{
	width: 320px;
	height: 170px;
	-webkit-transform: translate(-8px, -5px);
	-moz-transform: translate(-8px, -5px);
	-o-transform: translate(-8px, -5px);
	transform: translate(-8px, -5px);
}
.fun:hover img{
	width: 300px;
	height: 150px;
	-webkit-transform: translate(-6px, -3px);
	-moz-transform: translate(-6px, -3px);
	-o-transform: translate(-6px, -3px);
	transform: translate(-6px, -3px);
}
.ncu:hover img{
	width: 200px;
	height: 120px;
	-webkit-transform: translate(-6px, -3px);
	-moz-transform: translate(-6px, -3px);
	-o-transform: translate(-6px, -3px);
	transform: translate(-6px, -3px);
}
.sun img{
	z-index: -1;
}


</style>
<body>

<div class="eat">
	<a href="{{ url('/videos/food') }}">
	<img src="{{ asset('img/videos/eat.png') }}" style="position:absolute;top:180px;left:502px;width:160px;">
</div>
<div class="live">
	<a href="{{ url('/videos/live') }}">
	<img src="{{ asset('img/videos/live.png') }}" style="position:absolute;top:110px;left:692px;width:120px;">
	</div>
<div class="traffic">
	<a href="{{ url('/videos/traffic') }}">
	<img src="{{ asset('img/videos/traffic.png') }}" style="position:absolute;top:358px;left:808px;width:105px;">
	</div>
<div class="edu">
	<a href="{{ url('/videos/edu') }}">
	<img src="{{ asset('img/videos/edu.png') }}" style="position:absolute;top:378px;left:615px;width:150px;">
	</div>
<div class="fun">
	<a href="{{ url('/videos/fun') }}">
	<img src="{{ asset('img/videos/fun.png') }}" style="position:absolute;top:217px;left:842px;width:185px;">
	</div>
<div class="ncu">
	<a href="{{ url('/videos/ncu') }}">
	<img src="{{ asset('img/videos/ncu.png') }}" style="position:absolute;top:258px;left:678px;width:141px;">
	</div>
<div class="sun">
	<img src="{{ asset('img/videos/sun.png') }}" style="position:absolute;top:115px;left:539px;width:423px;">
</body>