<h1>Add category</h1>
<form action="{{ route('categories.store') }}" method="post">
	@csrf
	Title: <input type="text" name="title">
	<input type="submit" value="add">
</form>