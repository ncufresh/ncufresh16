@extends('layouts.layout')

@section('title', '顯示')

@section('css')
<style>
/* background setting */
body {
    background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(197,121,002,.8) 100%);
}

main {
    background-image: url("{{ asset('docs/img/fal.png') }}");
}

.page-title {
    font-size: 50px;
    font-weight: 700;
}
</style>
@stop

@section('js')
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1 class="page-title">
                    {{ $doc->title }}
                </h1>
            </div>
            <div class="panel">
                <div class="panel-body">
                    {!! $doc->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop