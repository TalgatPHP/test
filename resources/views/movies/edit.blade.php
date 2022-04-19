<h1>Edit movie</h1>
<form action="{{ route('movies.update',['movie'=>$movie->id]) }}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	Title: <input type="text" name="title" value="{{ $movie->title }}"><br />
	Category: 
	<select name='category_id'>
		@foreach($categories as $k=>$v)
			<option value="{{ $k }}" @if($k==$movie->category_id) selected="selected" @endif>{{ $v }}</option>
		@endforeach
	</select><br />
	Genres:<br/>
	<select multiple name="genres[]">
		@foreach($genres as $k=>$v)
			<option value="{{ $k }}"@if(in_array($k,$movie->genres->pluck('id')->all())) selected="selected" @endif>{{ $v }}</option>
		@endforeach
	</select><br />
	Thumbnail:
	<input type="file" name="thumbnail"><br />
	<img src="{{ $movie->thumbnail }}"><br />
	<input type="submit" value="add">
</form>