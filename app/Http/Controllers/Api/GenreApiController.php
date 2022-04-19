<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Http\Resources\GenreResource;
use App\Models\Movie;
use App\Http\Resources\MovieResource;

class GenreApiController extends Controller
{
    public function index()
    {
        $genres=Genre::all();
        return  GenreResource::collection($genres);  
    }

    public function movies($id)
    {
        $genre=Genre::find($id);
        $movies=$genre->movies()->paginate();
        return MovieResource::collection($movies);
    }
}
