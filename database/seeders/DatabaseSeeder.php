<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Genre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::factory(10)->create();
        $movies=Movie::factory(20)->create();
        $genres=Genre::factory(15)->create();

        foreach($movies as $movie){
            $genreIds=$genres->random(5)->pluck('id');
            $movie->genres()->attach($genreIds);
        }
    }
}
