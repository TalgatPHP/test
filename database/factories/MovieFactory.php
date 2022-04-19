<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;


class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(5),
            'category_id'=>Category::get()->random()->id,
            'thumbnail'=>$this->faker->imageUrl(300,252)
        ];
    }
}
