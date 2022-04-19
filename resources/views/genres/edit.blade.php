<h1>Add genre</h1>
<form action="{{ route('genres.update',['genre'=>$genre->id]) }}" method="post">
	@csrf
	@method('PUT')
	Title: <input type="text" name="title" value="{{ $genre->title }}">
	<input type="submit" value="add">
</form>