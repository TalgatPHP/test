<h1>Add genre</h1>
<form action="{{ route('genres.store') }}" method="post">
	@csrf
	Title: <input type="text" name="title">
	<input type="submit" value="add">
</form>