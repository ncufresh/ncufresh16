@extends('layouts.layout')

@section('title', '中大生活')

@section('css')
<style>
body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%); }
main { background-image:url('../../img/home/spring.png'); }

button{
   border: 3px solid black;
}

  #contentModal{
    background-color: #e1f5fe;
    margin-top: 10%;

  }
  #background{
    position: relative;
    width: 100%;
    height: 150%;
/*    background-color: #fff9c4;*/
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
    max-width: 180px; 
    height: auto;   
   
  }

  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
    width: 100%;
    margin: auto;

  }


.container {
  display: none;
}


  .modal-body ,.modal-content .modal-body{
    padding: 0px;
  }

  .btn-default{
      margin:10px 1px;
      padding:8px 30px;
      background:0 0;
      border-color:#00D4FF ;
  }


  
</style>

@stop

@section('js')

<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>

  <script type="text/javascript">
  $('#lfm').filemanager('image');
   $(document).ready(function(){
        $(".container").fadeIn(1300);
          CKEDITOR.instances['textArea'].setData($("#tempText").val());
});

  </script>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">

CKEDITOR.replace( 'textArea', {
    filebrowserImageBrowseUrl: '{{ url('laravel-filemanager?type=Images') }}',
    filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '{{ url('laravel-filemanager?type=Files') }}',
    filebrowserUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
});

</script>


@stop

@section('content')


<div class="container" id="background" >
<div class="row">
  <div class="col-md-4" id="leftPart">
<div class="row">
    <div  class="col-md-offset-3 col-md-9"" id="titleFrame">
      <img src="{{ asset($content->image) }}" class="img-responsive">
    </div>

    <div class="col-md-offset-3 col-md-9" id="more">   
      <img src="{{ asset('img/life/detail/more.png')  }}" href="javascript:void(0)" class="btn img-rounded " data-toggle="collapse" data-target="#linkMenu">
      <!--  <a href="javascript:void(0)" class="btn btn-info btn-fab  dropdown-toggle-right" data-toggle="collapse" data-target="#linkMenu"><i class="material-icons">grade</i></a> -->

      <ul class="collapse" id="linkMenu" role="group" >
        <!-- Trigger the modal with a button -->
        <button class="btn-default btn-block" data-toggle="modal" data-target="#myModal">相片導覽</button>

        @foreach ($more as $more)
        <a target="_blank" href="{{ asset($more->link) }}"><button class="btn-default btn-block">{{ $more->location }}</button></a>
        @endforeach

        <form action="{{ url('life/'.$content->topic.'/'.$content->id).'/add' }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="life_id" value="{{$content->id}}">
            <input type="text" name="location">
            <input type="text" name="link" >
            <button type="submit">新增</button>
        </form>
        
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


  <div class="col-md-8" id="rightPart">
<div class="row">
    <div class="col-md-10 modal-content" id="contentModal">
     <form action="{{ url('life/'.$content->topic.'/'.$content->id).'/updateContent' }}" method="POST">
     {{ csrf_field() }}
     {{ method_field('PATCH') }}
      <div class="modal-header">
     <!--    <button class="material-icons" data-toggle="collapse" data-target="#showArea">edit</button> -->
     
        <button class="material-icons"><a id="lfm" data-input="thumbnail" data-preview="holder">add_a_photo</a></button>
        <button class="material-icons">edit</button>
        <button type="submit" class="material-icons">done</button>
        <a href=".." class="material-icons close">clear</a> 
        
      </div>

        <div class="modal-body">

          <!-- <div id="showArea" class="collapse"> -->
          <textarea type="text" name="content" id="textArea"></textarea>
          <input type="hidden" value="{{$content->content}}" id="tempText">
         <!--  </div>  -->

        <p>{!!$content->content!!}</p>
      </div>
     <!--  主題圖片路徑 -->
       <input id="thumbnail" class="form-control" type="hidden" name="filepath">
</form>
    </div>
    </div>
  </div>

<!-- <div class="input-group">
  <span class="input-group-btn">
    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
      <i class="material-icons">add_a_photo</i>
    </a>
  </span>
  
  

</div> -->
<img id="holder" style="margin-top:15px;max-height:100px;">
      
     



</div>
</div>


@endsection

