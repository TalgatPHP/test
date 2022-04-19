<h1>Movies</h1>

@foreach($movies as $movie)
<h3>{{ $movie->title }}</h3>
<a href="{{ route('movies.edit',['movie'=>$movie->id]) }}">edit</a><br/>
@if($movie->status==0)
		<a href="http://test/status/{{ $movie->id }}">Опубликовать</a><br/>
@endif
<img src="{{ $movie->thumbnail }}">
<form action="{{ route('movies.show',['movie'=>$movie->id]) }}" method="get">
	<input type="submit" value="show">
</form> 
@endforeach
{{ $movies->links() }}