<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Http\Request;

class Movie extends Model
{
    use HasFactory;

    protected $fillable=['title','category_id','thumbnail'];

    public function category()
    {
        return $this->belongsTo(Category::class);   
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    static function updateImage(Request $request, $image=null)
    {
        if($request->hasFile('thumbnail')){
            if($image){
                Storage::delete($image);
            }
            return $request->file('thumbnail')->store("images/");
        }
        return asset("no-image.png");
    }
    static function uploadImage(Request $request)
    {
        if($request->hasFile('thumbnail')){
            return $request->file('thumbnail')->store("images/");
        }else  return $data['thumbnail']=asset("no-image.png");
    }
    
    static function upStatus($movie)
    {
        if($movie->status==0)
            return 1;
        return 1;
    }
}
