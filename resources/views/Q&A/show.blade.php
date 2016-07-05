@extends('layouts.Q&Alayouts')

@section('title','Q&A')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

@section('js')
@stop

@section('Q&Acontent')
        <div class="col-xs-7">
                 <table class="table table-hover">
                    <thead><tr><th>排行</th><th>分類</th><th>日期</th><th>點閱率</th></tr></thead>
                    <tbody>
                      <tr>
                        <td>{{ $Q->id }}</td>
                        <td>{{ $Q->classify }}</td>
                        <td><?php echo substr($Q->created_at,5,5) ?></td>
                      </tr>
                    </tbody>
                  </table>
         

          <div class="panel panel-default">
            <div class="panel-heading"><h1><strong>問題:</strong>{{ $Q->content }}</h2></div>
            <div class="panel-body"><h3>我是回答</h3>dddddddddd</div>
          </div>
                        
          <button type="button" class="btn" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash fa-lg"></i> 刪除</button>
                        

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
                {{ csrf_field() }}
            {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> 刪除</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">否</button>
                        </form>
          
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->
