@extends('layouts.layout')

@section('title','更改個人資料')

@section('css')
<style media="screen">
.avatar {
    width:10em;
    height:10em;
    border-radius:50%;
}
body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%); }
main { background-image:url('../img/home/spring.png'); }
#profile > .row {
    padding: 1em;
}
#profile > .row > .col-md-8 {
    box-shadow: 0 0 10px #999;
}
</style>
@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
    @if ($errors->has('name'))
        $('#name').focus();
    @elseif($errors->has('intro'))
        $('#intro').focus();
    @endif
    });
</script>
@stop

@section('content')
<div class="container" id="profile">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br><h2>{{ $user->name }}的個人資料</h2>
            <h5 class="text-muted">帳號 {{$user->email=='' ? $user->student_id : 'E-Mail : '. $user->email }}</h5>
            <img class="avatar" src="{{url('/')}}/upload/avatars/{{ $user->avatar }}">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/user/update') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputFile" class="col-md-2 control-label">更新個人相片</label>
                    <div class="col-md-10">
                        <input type="text" readonly="" class="form-control" placeholder="找尋電腦上的檔案...">
                        <input type="file" name="avatar" id="inputFile" multiple="">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label" for="name">更新名字(1~10)</label>
                    <div class="col-md-10">
                        <input class="form-control" name="name" id="name" value="{{ $user->name }}" type="text" maxlength="10">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('intro') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label" for="intro">更新自介(0~255)</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="intro" id="intro" rows="3" maxlength="255">{{ $user->intro }}</textarea>
                        @if ($errors->has('intro'))
                            <span class="help-block">
                                <strong>{{ $errors->first('intro') }}</strong>
                            </span>
                        @endif
                        {{-- <input class="form-control" name="intro" id="intro" value="{{ $user->intro }}" type="text" maxlength="255"> --}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <input type="submit" class="btn btn-lg btn-block btn-raised btn-primary" value="更新">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br><h3>中大Portal資料</h3>
            <h5 class="text-muted">無法修改,使用portal登入方可取得資料 (ps.玩遊戲會有時數唷)</h5>
            <div class="form-group">
                <label class="col-md-2 control-label" for="stid">學號</label>
                <div class="col-md-10">
                    <input class="form-control" id="stid" type="text" placeholder="{{ $user->student_id }}" disabled="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="unit">系所</label>
                <div class="col-md-10">
                    <input class="form-control" id="unit" type="text" placeholder="{{ $user->student_id }}" disabled="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
