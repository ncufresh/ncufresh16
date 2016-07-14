@extends('layouts.Q&Alayouts')

@section('title','Q&A')


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
                      <td>{{ $Q->click_count }}</td>
                    </tr>
            </tbody>
          </table>

          <div class="panel panel-primary">
              <div class="panel-heading"><h1><strong>問題:</strong>{{ $Q->topic }}</h2></div>
              <div class="panel-body">
              <h3><strong>{{$Q->content}}</strong></h3><h4><p>
               
              </div>
          </div>
          <div class="panel panel-success">
              <div class="panel-heading"><h1><strong>回答:</strong></h2></div>
              <div class="panel-body">
                  @if (!empty($Q->response))
                  <h4>{{$Q->response}}</h4>
                  @else
                  <h3>很抱歉目前尚無回答，請在稍等一會</h3>
                  @endif
                  </p></h4>
              </div>
          </div>
               <a href="#demo" class="btn btn-info btn-raised" data-toggle="collapse"><i class="glyphicon glyphicon-ok" aria-hidden="true"></i> 我要回答</a>
               <button type="button" class="btn btn-raised" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash fa-lg"></i> 刪除</button>
              <!-- collapse -->
              <div id="demo" class="collapse">
                <div class="panel panel-default">
                  <div class="panel-heading"><h3>回答:</h3></div>
                  <div class="panel-body">
                    <form role="form" action="{{action('QandAController@update',$Q->id)}}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('PATCH') }} 
                      <div class="form-group">
                        <textarea name="response" class="form-control" rows="5"></textarea>
                        <p></p>
                        <button type="submit" class="col-sm-2 col-md-offset-5 btn btn-info">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- collapse -->
              
       

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
