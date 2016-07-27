@extends('layouts.layout')

@section('title', '登入')

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
                <div class="panel-heading"><i class="fa fa-sign-in"></i> 登入</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <a href="{{ url('/register') }}" class="btn btn-success btn-lg btn-block btn-raised">
                                    <i class="fa fa-mortar-board"></i> 校內Portal登入
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <h4>一般使用者登入</h4>
                            </div>
                        </div>

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
                                <button type="submit" class="btn btn-primary btn-lg btn-raised btn-block">
                                    <i class="fa fa-btn fa-sign-in"></i> &nbsp;登入
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <a href="{{ url('/register') }}" class="btn btn-danger btn-lg btn-block btn-raised">
                                    <i class="fa fa-user-plus"></i> 註冊
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
