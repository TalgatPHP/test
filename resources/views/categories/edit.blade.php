<h1>Edit category</h1>
<form action="{{ route('categories.update',['category'=>$category->id]) }}" method="post">
	@csrf
	@method('PUT')
	Title: <input type="text" name="title" value="{{ $category->title }}">
	<input type="submit" value="add">
</form>