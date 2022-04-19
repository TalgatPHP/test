<h1>Add movie</h1>
<form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
	@csrf
	Title: <input type="text" name="title"><br />
	Category: 
	<select name='category_id'>
		@foreach($categories as $k=>$v)
			<option value="{{ $v }}">{{ $k }}</option>
		@endforeach
	</select><br />
	Genres:<br/>
	<select multiple name="genres[]">
		@foreach($genres as $k=>$v)
			<option value="{{ $v }}">{{ $k }}</option>
		@endforeach
	</select><br />
	Thumbnail:
	<input type="file" name="thumbnail"><br />
	<input type="submit" value="add">
</form>