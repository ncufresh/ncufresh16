@extends('layouts.layout')

@section('title', '住')

@section('css')
<style>
	.carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }

  #more{
  	float:right;             
   	width: 20%;

  }

  #textField{
  		width:60%;
  }
	 	
	
</style>
	
@stop
	 
@section('js')

	

@stop

@section('content')
			<div class="container">


			<div id="textField">
				  <p>{{ $content->content }}</p>

{{$content->id}}
			</div>

	<section id="more">		
  	<a href="javascript:void(0)" class="btn btn-info btn-fab  dropdown-toggle-right" data-toggle="collapse" data-target="#linkMenu"><i class="material-icons">grade</i></a>
	<div class="collapse" id="linkMenu" role="group" >
	 	<!-- Trigger the modal with a button -->
		<button class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal">相片導覽</button>
	 	 <a class="btn btn-default btn-block"  href="http://in.ncu.edu.tw/ncu7221/OSDS/">宿舍服務中心</a>
	 	 <a class="btn btn-default btn-block"  href="#">大一新生住宿意願調查</a>
	 	 <a class="btn btn-default btn-block"  href="#">住宿Q&A</a>
	</div>
	</section>	
 

			<!-- Modal -->
			 <div id="myModal" class="modal fade" role="dialog">
			    <div class="modal-dialog modal-lg">
			      <div class="modal-content">
			        
			        <div class="modal-body">
			        	<div id=" myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="{{ asset($image[0]->filename) }}" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>{{ $image[0]->imagesTitle}}</h3>
			<p>{{ $image[0]-> imagesContent}}</p>
          
        </div>
      </div>

    
      
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


			        	
					  </div>

			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			    </div>
			  </div>

			
			  
			</div>
		

@endsection
