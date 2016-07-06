@extends('layouts.Q&Alayouts')
@section('Q&Acontent')
<div class="col-xs-7">
                 <table class="table table-hover">
                    <thead><tr><th>排行</th><th>分類</th><th>日期</th><th>標題</th><th>點閱率</th></tr></thead>
                    <tbody>
                    @foreach ($QandAs as $Q)
                      <tr onclick="document.location = '{{action('QandAController@show',$Q->id)}}' ;">
                        <td>{{ $Q->id }}</td>
                        <td>{{ $Q->classify }}</td>
                        <td><?php echo substr($Q->created_at,5,5) ?></td>
                        <td>{{ $Q->content }}</td>
                        <td>{{ $Q->click_count }}</td>
                        <td></td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  {{ $QandAs->links() }}
        </div>
@endsection
