@extends('layouts.layout')

@section('title', '中大生活')

@section('css')
<style>
body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%); }
main { background-image:url("{{asset('img/layout/spring.png')}}"); }

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
  }

  #more img{
    max-width: 180px; 
    height: auto;   
   
  }

  #more button{
    font-size: 1.3em;
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

  .carousel-control{
    width: 5vw;
  
  }
  
</style>

@stop

@section('js')

<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>

<script type="text/javascript">
    $('#PicChooser').filemanager('image');
    $('#themePicChooser').filemanager('image');
    $(document).ready(function(){
          $(".container").fadeIn(1000);
            // CKEDITOR.instances['textArea'].setData($("#textArea").val());
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
                <div  class="col-md-offset-3 col-md-9" id="titleFrame">
                    <img src="{{ asset($content->image) }}" class="img-responsive">
                </div>

                <div class="col-md-offset-3 col-md-9" id="more">   
                    
                    <?php if($content->title != "夜市"){  ?>   
                    <img src="{{ asset('img/life/more.png')  }}" href="javascript:void(0)" class="btn img-rounded " data-toggle="collapse" data-target="#linkMenu">
                    <?php } ?>

                    <ul class="collapse" id="linkMenu" role="group" >
                    <!-- Trigger the modal with a button -->
                    <button class="btn-default btn-block" data-toggle="modal" data-target="#myModal">相片導覽</button>

                    @foreach ($more as $more)
                    <a class="" target="_blank" href="{{ url('http://'.$more->link) }}"><button class="btn-default btn-block">{{ $more->location }}</button></a>
                    
                   
                    @can('management')
                    <!--  修改鈕 -->
                    <form action="{{ url('life/'.$content->topic.'/'.$content->id).'/update' }}" method="POST">
                         {{ csrf_field() }}
                         {{ method_field('PATCH') }}
                         <input type="hidden" name="more_id" value="{{$more->id}}">
                        <input class="form-control type="text" name="location" value="{{$more->location}}">
                        <input class="form-control type="text" name="link" value="{{$more->link}}">
                          <button type="submit" class="material-icons">done</button>
                    </form>    
                    <!-- 刪除紐 -->
                    <form action="{{ url('life/'.$content->id.'/deleteDetail') }}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <input type="hidden" name="linkId" value="{{$more->id}}">
                        <button type="submit" class="material-icons">delete_forever</button>
                    </form>
                    @endcan 
                    @endforeach
                    
                    @can('management')
                    <!-- 新增鈕 -->
                    <form action="{{ url('life/'.$content->topic.'/'.$content->id).'/add' }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="life_id" value="{{$content->id}}">
                        <input class="form-control type="text" name="location" placeholder="在這裡輸入連結名稱">
                        <input class="form-control type="text" name="link" placeholder="在這裡輸入連結網址">
                        <button type="submit">新增</button>
                    </form>
                    @endcan     
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
        @can('management')
          <!--新增相片導覽的照片 -->
              <form action="{{ url('life/'.$content->topic.'/'.$content->id).'/add' }}" method="POST">
                {{ csrf_field() }}
                  <button class="material-icons"><a id="PicChooser" data-input="pics" data-preview="hold">add_circle</a></button>
                  <img id="hold" style="margin-top:15px;max-height:100px;">
                <input id="pics" class="form-control" type="hidden" name="filename"> 
                <input type="hidden" name="life_id" value="{{$content->id}}">
                 <button type="submit" class="material-icons">done</button>

              </form> 
         @endcan    

            </ol>
           <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
             <div class="item active">
              <img src="{{ asset($image[0]->filename) }}" alt="Chania" width="460" height="345">
              <div class="carousel-caption">
 @can('management')
                <!--  刪除相片導覽的照片 -->
                <form action="{{ url('life/'.$content->id.'/deleteDetail') }}" method="POST">
              {!! csrf_field() !!}
              {!! method_field('DELETE') !!}
              <input type="hidden" name="imgId" value="{{$image[0]->id}}">
              <button type="submit" class="material-icons">delete_forever</button>
            </form>
@endcan   
                <h3>{{ $image[0]->imagesTitle}}</h3>
                <p>{{ $image[0]->imagesContent}}</p>

              </div>
            </div>

          
            @for ($i = 1; $i < $num_of_pics; $i++)
            <div class="item">
             <img src="{{ asset($image[$i]->filename) }}" alt="Chania" width="460" height="345">
             <div class="carousel-caption">
@can('management')
              <!--  刪除相片導覽的照片 -->
                <form action="{{ url('life/'.$content->id.'/deleteDetail') }}" method="POST">
              {!! csrf_field() !!}
              {!! method_field('DELETE') !!}
              <input type="hidden" name="imgId" value="{{$image[$i]->id}}">
              <button type="submit" class="material-icons">delete_forever</button>
            </form>
@endcan
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

                    <div class="modal-header">
       <!--    <button class="material-icons" data-toggle="collapse" data-target="#showArea">edit</button> -->
          <a href=".." class="material-icons close">clear</a> 
          
        </div>

        <div class="modal-body">
        <p2 style="font-size:1.3em">{!!$content->content!!}</p2>
        <p>&nbsp;</p>
@can('management')  
        <form action="{{ url('life/'.$content->topic.'/'.$content->id).'/update' }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <button class="material-icons"><a id="themePicChooser" data-input="thumbnail" data-preview="holder">add_a_photo</a></button>
            <!--  主題圖片路徑 -->
            <input id="thumbnail" class="form-control" type="hidden" name="filepath">
            <!-- <button class="material-icons">edit</button> -->
            <button type="submit" class="material-icons">done</button>

            <!-- <div id="showArea" class="collapse"> -->
            <textarea type="text" name="content" id="textArea" >{{$content->content}}</textarea>
        </form>
@endcan
        </div>
     

      </div>
    </div>
  </div>
</div>

    <a class="left carousel-control" href="{{ url('/life/'.$topic.'/'.$arr_prev->id ) }}" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
     <a class="right carousel-control" href="{{ url('/life/'.$topic.'/'.$arr_next->id ) }}"><i class="glyphicon glyphicon-chevron-right"></i></a>
     <img id="holder" style="margin-top:15px;max-height:100px;">
</div>


@endsection

<i class="">keyboard_arrow_right</i>