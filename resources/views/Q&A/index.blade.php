@extends('layouts.layout')
@section('title','Q&A')
@section('css')
<style type="text/css">

  
  .panel.hot>.panel-heading {
    background-color: #FF4400;
}
.panel.gernal>.panel-heading {
    background-color: #FFA600;
}
tr{
     cursor:pointer;
}
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('../img/personal/search.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>
@stop
@section('content')
<div class="container">
@include('Q&A.Q&Alayouts')
  <div class="col-md-8">
  <div class="row">
  <input id="search" type="text" name="search" placeholder="搜尋標題..輸入完請按Enter">
</div><br>
<div class="row">
  <div class="panel panel-success" style="display:none;">
    <div class="panel-heading search"></div>
    <div  id="show" class="panel-body">
      <span class="result"></span>
    </div>
  </div>
</div>
  <div class="panel hot">
    <div class="panel-heading"><h1><img src="{{ asset('img/Q&A/bulb2.png') }}" width="5%" height="5%"><b> 熱門問題</b></h1></div>
    <div class="panel-body">
       <table class="table table-striped table-hover">
        <thead><tr><th>排行</th><th>分類</th><th>日期</th><th>標題</th><th>點閱率</th></tr></thead>
        <tbody>
        @for ($i = 0; $i < $count; $i++)
         <?php 
                switch ($Top5[$i]->classify) {
                    case 'school':
                        $Top5[$i]->classify='校園生活';
                        break;
                    case 'student':
                        $Top5[$i]->classify='學生事務';
                        break;
                    case 'dormitory':
                        $Top5[$i]->classify='宿舍生活';
                        break;
                    case 'other':
                        $Top5[$i]->classify='其他';
                        break;
                }
            ?>
          <tr class="danger" onclick="document.location = '{{action('QandAController@show',$Top5[$i]->id)}}' ;">
            <td>{{ $i+1 }}</td>
            <td>{{ $Top5[$i]->classify }}</td>
            <td class="col-md-1">{{substr($Top5[$i]->created_at,5,5)}}</td>
            <td class="col-md-6">{{mb_substr($Top5[$i]->topic,0,15)}}...</td>
            <td>{{ $Top5[$i]->click_count }}</td>
         
          </tr>
        @endfor
        </tbody>
      </table>
    </div>
  </div>
  <div class="panel gernal">
    <div class="panel-heading"><h1><img src="{{ asset('img/Q&A/fruit.png') }}" width="5%" height="5%"><b> {{$titles}}</b></h1></div>
    <div class="panel-body">
      <table class="table table-striped table-hover">
        <thead><tr><th>分類</th><th>日期</th><th>標題</th><th>點閱率</th></tr></thead>
        <tbody>
            @foreach ($QandAs as $Q)
            <?php 
                switch ($Q->classify) {
                    case 'school':
                        $Q->classify='校園生活';
                        break;
                    case 'student':
                        $Q->classify='學生事務';
                        break;
                    case 'dormitory':
                        $Q->classify='宿舍生活';
                        break;
                    case 'other':
                        $Q->classify='其他';
                        break;
                }
            ?>
              <tr onclick="document.location = '{{action('QandAController@show',$Q->id)}}' ;">
                <td>{{ $Q->classify }}</td>
                <td class="col-md-1">{{ substr($Q->created_at,5,5)}}</td>
                <td class="col-md-8">{{mb_substr($Q->topic,0,15)}}...</td>
                <td>{{ $Q->click_count }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>

        </div>

      </div>
          {{ $QandAs->links() }}
    
  </div>
</div>
@endsection
@section('js')
 <script type="text/javascript">
  $(document).ready(function(){
      $("input").change(function(){
        $(".result").remove();
        $(".panel").css('display','block');
        let keyy = $(this).val();
        $.get( "/Q&A/search", { key: keyy }, function( data ) {
          if(!data[0]){  
            $('.panel').addClass('panel-danger');
            $('.panel').removeClass('panel-success');
            $('.search').text("沒有\""+keyy+"\"的相關搜尋喔~(有沒有打錯字?)");
          }else{
            $('.panel').addClass('panel-success');
            $('.panel').removeClass('panel-danger');
            $('.search').text("搜尋到囉~");
            str = '<span class="result"><table class="table table-striped table-hover"><thead><tr><th>分類</th><th>日期</th><th>標題</th><th>點閱率</th></tr></thead><tbody>';
            for (var i=0;i<data.length;i++){
              var Q = data[i];
              var classify = Q.classify;
              switch (classify) {
                    case 'school':
                        classify='校園生活';
                        break;
                    case 'student':
                        classify='學生事務';
                        break;
                    case 'dormitory':
                        classify='宿舍生活';
                        break;
                    case 'other':
                        classify='其他';
                        break;
                }
              str += '<tr class="danger" onclick="document.location = \'/Q&A/content/'+Q.id+'\' ;"><td>'+classify+'</td><td class="col-md-1">'+Q.created_at.substr(5,5)+'</td><td class="col-md-6">'+Q.topic.substr(0,15)+'...</td><td>'+Q.click_count+'</td></tr>';
             }
              str += ' </tbody></table></span>';
              $("#show").append(str);
          }
            
          });
      });
    });
 </script>
@endsection
