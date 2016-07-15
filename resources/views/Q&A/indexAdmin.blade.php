@extends('layouts.Q&Alayouts')
@section('title','管理Q&A|Q&A')
@section('js')
@if (Auth::guest())

  <script type="text/javascript">alert("請先登入喔");window.location.replace("/Q&A/all");</script>      
  @else
@endif

@section('Q&Acontent')
<div class="col-xs-7">
  <table class="table table-hover">
      <thead><tr><th>分類</th><th>日期</th><th>標題</th><th>點閱率</th></tr></thead>
      <tbody>
      @foreach ($QandAs as $Q)
        <tr>
          <td>{{ $Q->classify }}</td>
          <td><?php echo substr($Q->created_at,5,5) ?></td>
          <td>{{ $Q->topic }}</td>
          <td>{{ $Q->click_count }}</td>
          <td><a href="{{action('QandAController@show',$Q->id)}}"><i class="fa fa-eye" aria-hidden="true">檢視</i></a></td>
          <td><a href="{{action('QandAController@edit',$Q->id)}}"><i class="fa fa-eye" aria-hidden="true">編輯</i></a></td>
          <td><button type="button" class="btn btn-fab" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash fa-lg"></i></button></td>
        </tr>
      @endforeach
      </tbody>
    </table>
  {{ $QandAs->links() }}  <!--分頁用-->
</div>
@endsection



<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-trash fa-lg"></i> 刪除</h4>
        </div>
        <div class="modal-body">
          <p align="center">你真的確定要刪除嗎?</p>
        </div>
        <div class="modal-footer">
        <form action="{{ URL::action('QandAController@destroy',$Q->id) }}" method="post"  class="form_del">
        {{ csrf_field() }}{{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> 刪除</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">否</button>
        </form>
          
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->