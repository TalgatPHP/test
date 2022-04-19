<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies=Movie::paginate(10);
        return view('movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres=Genre::pluck('id','title')->all();
        $categories=Category::pluck('id','title')->all();
        return view('movies.create',compact('genres','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $data['thumbnail']=Movie::uploadImage($request);
        $movie=Movie::create($data);
        $movie->genres()->sync($request->genres);
        return redirect()->route('movies.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie=Movie::find($id);
        $categories=Category::pluck('title','id')->all();
        $genres=Genre::pluck('title','id')->all();
        return view('movies.edit',compact('movie','categories','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $data = $request->all();
        $data['thumbnail'] =Movie::updateImage($request, $movie->thumbnail);
        $movie->update($data);
        $movie->genres()->sync($request->genres);
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie=Movie::find($id);
        $movie->genres()->sync([]);
        Storage::delete($movie->thumbnail);
        $movie->delete();
        return redirect()->route('movies.index');
    }

    public function updateStatus($id)
    {
        $movie=Movie::find($id);
        $movie->status=Movie::upStatus($movie);
        $movie->save();
        return redirect()->route('movies.index');
    }
}
