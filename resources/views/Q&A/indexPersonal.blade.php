@extends('layouts.layout')
@section('title','發問紀錄|Q&A')

@section('content')
<div class="container">
@include('Q&A.Q&Alayouts')
  <div class="col-md-7">
    <table class="table table-hover">
        <thead><tr><th>分類</th><th>日期</th><th>標題</th><th>點閱率</th></tr></thead>
        <tbody>
        @foreach ($QandAs as $Q)
          <tr onclick="document.location = '{{action('QandAController@show',$Q->id)}}' ;" >
            <td>{{ $Q->classify }}</td>
            <td><?php echo substr($Q->created_at,5,5) ?></td>
            <td>{{ $Q->content }}</td>
            <td>{{ $Q->click_count }}</td>
            <td>
              @if(empty($Q->response))
                尚未回覆
              @else
                已回復
              @endif
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    {{ $QandAs->links() }}  <!--分頁用-->
  </div>
</div>
@endsection

