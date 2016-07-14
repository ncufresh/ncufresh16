<h1>研究所</h1>
<ul>
    <li>Main 1</li>
    <ul>
        @foreach ($graduates1 as $g1)
        <li>{{ $g1->title }}</li>
        <ul>
            <li>{{ $g1->content }}</li>
        </ul>
        @endforeach 
    </ul>
    <li>Main 2</li>
    <ul>
        @foreach ($graduates2 as $g2)
        <li>{{ $g2->title }}</li>
        <ul>
            <li>{{ $g2->content }}</li>
        </ul>
        @endforeach 
    </ul>
    <li>Main 3</li>
    <ul>
        @foreach ($graduates3 as $g3)
        <li>{{ $g3->title }}</li>
        <ul>
            <li>{{ $g3->content }}</li>
        </ul>
        @endforeach 
    </ul>
</ul>