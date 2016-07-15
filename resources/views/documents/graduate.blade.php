@extends('layouts.layout')

@section('title', '新生必讀 - 研究所')

@section('css')

@stop

@section('js')

@stop

@section('content')

<div class="container">
    <div class="row">
        {{-- 顯示研究所的新生必讀資料 --}}
        <h1>研究所　<small><a href="{{ url('/doc/under') }}">大學部</a></small></h1>
        <ul>
            <?php $count = 0; ?>
            @foreach ($mainGraduates as $graduates)
                <li>研究所主條目 {{ ++$count }}</li>
                <ul>
                    @foreach ($graduates as $g)
                        <li>{{ $g->title }}</li>
                        <ul>
                            <li>{{ $g->content }}</li>
                            <form action="{{ url('/doc/graduate/'.$g->id.'/edit') }}" method="GET">
                                <button type="submit" id="edit-document-{{ $g->id }}">編輯</button>
                            </form>
                            <form action="{{ url('/doc/graduate/'.$g->id) }}" method="POST">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button type="submit" id="delete-document-{{ $g->id }}">刪除</button>
                            </form>
                        </ul>
                    @endforeach 
                </ul>
            @endforeach
        </ul>
    </div>
    {{-- 新增研究所的新生必讀資料 --}}
    <div class="row">
        <form action="{{ url('/doc/graduate') }}" method="POST">
            {{ csrf_field() }}
            <p>標題</p>
            <p><input type="textbox" name="title"></p>
            <p>內文</p>
            <p><input type="textbox" name="content"></p>
            <p>隸屬於哪個主項目</p>
            <p><input type="number" name="position_of_main" min="1" max="3" step="1" value="1" required></p>
            <p><button type="submit">新增</button></p>
        </form>
    </div>
</div>

@endsection


