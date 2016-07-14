<h1>大學部</h1>
<ul>
    <li>Main 1</li>
    <ul>
        @foreach ($unders1 as $u1)
        <li>{{ $u1->title }}</li>
        <ul>
            <li>{{ $u1->content }}</li>
        </ul>
        @endforeach 
    </ul>
    <li>Main 2</li>
    <ul>
        @foreach ($unders2 as $u2)
        <li>{{ $u2->title }}</li>
        <ul>
            <li>{{ $u2->content }}</li>
        </ul>
        @endforeach 
    </ul>
    <li>Main 3</li>
    <ul>
        @foreach ($unders3 as $u3)
        <li>{{ $u3->title }}</li>
        <ul>
            <li>{{ $u3->content }}</li>
        </ul>
        @endforeach 
    </ul>
</ul>