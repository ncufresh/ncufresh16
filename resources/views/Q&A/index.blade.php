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
</style>
@stop
@section('content')
<div class="container">
@include('Q&A.Q&Alayouts')
  <div class="col-md-7">

  <div class="panel hot">
        <div class="panel-heading"><h1><img src="{{ asset('img/Q&A/bulb2.png') }}" width="5%" height="5%"><b> 熱門問題</b></h1></div>
        <div class="panel-body">
           <table class="table table-striped table-hover">
            <thead><tr><th>排行</th><th>分類</th><th>日期</th><th>標題</th><th>點閱率</th></tr></thead>
            <tbody>
            @for ($i = 0; $i < $count; $i++)
              <tr class="danger" onclick="document.location = '{{action('QandAController@show',$Top5[$i]->id)}}' ;">
                <td>{{ $i+1 }}</td>
                <td>{{ $Top5[$i]->classify }}</td>
                <td><?php echo substr($Top5[$i]->created_at,5,5) ?></td>
                <td>{{ $Top5[$i]->topic }}</td>
                <td>{{ $Top5[$i]->click_count }}</td>
                <td></td>
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
              <tr onclick="document.location = '{{action('QandAController@show',$Q->id)}}' ;">
                <td>{{ $Q->classify }}</td>
                <td><?php echo substr($Q->created_at,5,5) ?></td>
                <td>{{ $Q->topic }}</td>
                <td>{{ $Q->click_count }}</td>
                <td></td>
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
