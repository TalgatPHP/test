<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Http\Resources\GenreResource;
use App\Models\Movie;
use App\Http\Resources\MovieResource;

class MovieApiController extends Controller
{
    public function index()
    {
        $movies=Movie::all();
        return  GenreResource::collection($movies);  
    }

    public function genres($id)
    {
        $movie=Movie::find($id);
        $genres=$movie->genres()->paginate();
        return GenreResource::collection($genres);
    }
}