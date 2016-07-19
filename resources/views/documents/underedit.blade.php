<form action="{{ url('doc/under/'.$under->id) }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	<p>標題</p>
    <p><input type="text" name="title" value="{{ $under->title }}"></p>
    <p>內文</p>
    <p><textarea name="content">{{ $under->content }}</textarea></p>
    <p>隸屬於哪個主項目</p>
    <p>
    	<input type="number" name="position_of_main" value="{{ $under->position_of_main }}"
    		   min="1" max="3" step="1" value="1" required>
    </p>
    <p><button type="submit">更新</button></p>
</form>
