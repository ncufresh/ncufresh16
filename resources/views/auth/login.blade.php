@extends('layouts.layout')

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#email').focus();
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">登入</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label">E-Mail</label>

                            <div class="col-md-9">

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="電子郵件">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label">Password</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control" name="password" placeholder="密碼">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-1">
                                <div class="checkbox" style="display:inline;">
                                    <label>
                                        <input type="checkbox" name="remember" checked="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 記住密碼
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-raised btn-block btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> &nbsp;登入
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                              <div class="btn-group btn-group-justified btn-group-raised">
                                  <a href="{{ url('/register') }}" class="btn btn-danger">註冊</a>
                                  <a href="{{ url('/register') }}" class="btn btn-success">校內Portal登入</a>
                                  <a href="{{ url('/register') }}" class="btn btn-info">Facebook登入</a>
                              </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
