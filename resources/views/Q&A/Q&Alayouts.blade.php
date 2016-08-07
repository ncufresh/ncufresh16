<style type="text/css">
    
    body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(197,121,002,.8) 100%); }
    main { background-image:url("{{asset('img/layout/fall.png')}}"); }
    .leftbutton .btn-primary{
        background-color: #C57A02 !important;
    }
    .fixed {

  position: fixed;
  bottom: 3%;
  left: 85%;
  z-index: 100;
}
@media (max-width: 700px) {
  .fixed {
  position: fixed;
  bottom: 0;
  left: 70%;
  width:30%;
  cursor:pointer;
}
}

</style>
<div class="row head">
<img src="{{ asset('img/Q&A/QQAA.png') }}" width="90%" height="350">
</div>
    
<div class="col-md-3 leftbutton" >
    <div class="btn-group-vertical col-md-11" role="group">
     <a href="{{action('QandAController@index','all')}}" class="btn btn-primary btn-raised btn-lg">所有問題</a>
     <a href="{{action('QandAController@index','school')}}" class="btn btn-primary btn-raised btn-lg">校園生活</a>
     <a href="{{action('QandAController@index','student')}}" class="btn btn-primary btn-raised btn-lg">學生事務</a>
     <a href="{{action('QandAController@index','dormitory')}}" class="btn btn-primary btn-raised btn-lg">宿舍生活</a>
     <a href="{{action('QandAController@index','other')}}" class="btn btn-primary btn-raised btn-lg">其他</a>
     <a href="{{action('QandAController@indexPersonal')}}" class="btn btn-primary btn-raised btn-lg">我的發問記錄</a>
     @can('management')
      <a href="{{action('QandAController@indexAdmin')}}" class="btn btn-success btn-raised btn-lg">GM</a>
     @endcan
    </div>
</div>
      
      <a class="fixed" href="{{action('QandAController@create')}}"  ><img src="{{ asset('img/Q&A/ask.png') }}" width="80%"></a>       


