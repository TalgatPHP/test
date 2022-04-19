<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Models\Movie;
use App\Http\Resources\MovieResource;

class CategoryApiController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return  CategoryResource::collection($categories);  
    }

    public function movies($id)
    {
        $movies=Movie::where('category_id',$id)->orderBy('id','desc')->paginate();
        return MovieResource::collection($movies);
    }
}
