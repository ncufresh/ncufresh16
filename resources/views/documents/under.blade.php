@extends('layouts.layout')

@section('title', '新生必讀 - 大學部')

@section('css')

@stop

@section('js')

@stop

@section('content')

<div class="container">
    <div class="row">
        {{-- 顯示大學部的新生必讀資料 --}}
        <h1>大學部　<small><a href="{{ url('/doc/graduate') }}">研究所</a></small></h1>
        <ul>
            <?php $count = 0; ?>
            @foreach ($mainUnders as $unders)
                <li>大學部主條目 {{ ++$count }}</li>
                <ul>
                    @foreach ($unders as $u)
                        <li>{{ $u->title }}</li>
                        <ul>
                            <li>{{ $u->content }}</li>
                            <form action="{{ url('/doc/under/'.$u->id.'/edit') }}" method="GET">
                                <button type="submit" id="edit-under-{{ $u->id }}">編輯</button>
                            </form>
                            <form action="{{ url('/doc/under/'.$u->id) }}" method="POST">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                            <button type="submit" id="delete-document-{{ $u->id }}">刪除</button>
                        </form>
                        </ul>
                    @endforeach 
                </ul>
            @endforeach
        </ul>
    </div>
    {{-- 新增大學部的新生必讀資料 --}}
    <div class="row">
        <form action="{{ url('/doc/under') }}" method="POST">
            {{ csrf_field() }}
            <p>標題</p>
            <p><input type="text" name="title" id="title" required></p>
            <p>內文</p>
            <p><input type="text" name="content" id="content" required></p>
            <p>隸屬於哪個主項目</p>
            <p><input type="number" name="position_of_main" min="1" max="3" step="1" value="1" required></p>
            <p><button type="submit">新增</button></p>
        </form>
    </div>
</div>

@endsection