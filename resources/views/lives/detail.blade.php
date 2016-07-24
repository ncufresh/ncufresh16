@extends('layouts.layout')

@section('title', '中大生活')

@section('css')
<style>
  #contentModal{
    background-color: #e1f5fe;
    margin-top: 10%;

  }
  #background{
    position: relative;
    background-color: #fff9c4;
  }

  /*#leftPart{
    position: relative;
    width: 40%;
  }


  #titleFrame{ 
    position: absolute;
    width: 100%;
    height: 20%;
  }
  
  #more{
    position: absolute;
    width: 100%;
    height: 80%;
    border-
   
  }

  #rightPart{
    position: relative;
    left: 40%;
    width: 60%;
  }*/

#more img{
    width: 50%;    
   
  }

  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
    width: 70%;
    margin: auto;
  }


.container {
  display: none;
}

  

  

</style>

@stop

@section('js')
  <script type="text/javascript">
   $(document).ready(function(){
        $(".container").fadeIn(1300);
});
  </script>

@stop

@section('content')


<div class="container" id="background" >
<div class="row">
  <div class="col-md-3" id="leftPart">
<div class="row">
    <div  class="col-md-12" id="titleFrame">
      <img src="{{ asset($content->image) }}" class="img-responsive">
    </div>

    <div class="col-md-12" id="more">   
      <img src="{{ asset('img/life/detail/more.png')  }}" href="javascript:void(0)" class="btn img-rounded " data-toggle="collapse" data-target="#linkMenu">
      <!--  <a href="javascript:void(0)" class="btn btn-info btn-fab  dropdown-toggle-right" data-toggle="collapse" data-target="#linkMenu"><i class="material-icons">grade</i></a> -->

      <ul class="collapse" id="linkMenu" role="group" >
        <!-- Trigger the modal with a button -->
        <button class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal">相片導覽</button>

        @foreach ($more as $more)
        <a class="btn btn-default btn-block"  target="_blank" href="{{ asset($more->link) }}">{{ $more->location }}</a>
        @endforeach
      </ul>
    </div>  

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">

         <div class="modal-body">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
              @for ($i = 0; $i < $num_of_pics; $i++)
              <li data-target="#myCarousel" data-slide-to="{{$i}}" ></li>
              @endfor

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
             <div class="item active">
              <img src="{{ asset($image[0]->filename) }}" alt="Chania" width="460" height="345">
              <div class="carousel-caption">
                <h3>{{ $image[0]->imagesTitle}}</h3>
                <p>{{ $image[0]->imagesContent}}</p>
              </div>
            </div>

            @for ($i = 1; $i < $num_of_pics; $i++)
            <div class="item">
             <img src="{{ asset($image[$i]->filename) }}" alt="Chania" width="460" height="345">
             <div class="carousel-caption">

              <h3>{{ $image[$i]->imagesTitle}}</h3>
              <p>{{ $image[$i]->imagesContent}}</p>

              </div>
            </div>
            @endfor

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
      </div>
    </div>
  </div>
</div>
  </div>

  <div class="col-md-9" id="rightPart">
    <div class="modal-content" id="contentModal">
      <div class="modal-header">
        <a href=".." type="button" class="close">×</a>
      </div>

      <div class="modal-body">
        <p>{{$content->content}}</p>
      </div>

    </div>
  </div>
</div>
</div>


@endsection
