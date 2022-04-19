<h1>Category</h1>
<a href="{{ route('categories.create') }}">Add category</a>
<table>
	<tr><th>id</th><th>title</th><th></th><th></th></tr>
	@foreach($categories as $category)
		<tr>
			<td>{{ $category->id }}</td>
			<td>{{ $category->title }}</td>
			<td><a href="{{ route('categories.edit',['category'=>$category->id]) }}">edit</a></td>
			<td>
				<form action="{{route('categories.destroy',['category'=>$category->id])}}" method="post">
					@csrf
					@method('DELETE')
					<input type='submit' value="delete">
				</form>
			</td>
		</tr>
	@endforeach
</table>