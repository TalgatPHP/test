<h1>Genres</h1>
<a href="{{ route('genres.create') }}">Add genre</a>
<table>
	<tr><th>id</th><th>title</th><th></th><th></th></tr>
	@foreach($genres as $genre)
		<tr>
			<td>{{ $genre->id }}</td>
			<td>{{ $genre->title }}</td>
			<td><a href="{{ route('genres.edit',['genre'=>$genre->id]) }}">edit</a></td>
			<td>
				<form action="{{route('genres.destroy',['genre'=>$genre->id])}}" method="post">
					@csrf
					@method('DELETE')
					<input type='submit' value="delete">
				</form>
			</td>
		</tr>
	@endforeach
</table>