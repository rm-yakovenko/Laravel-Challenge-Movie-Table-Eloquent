<?php

namespace Database\Factories;

use App\Models\Rating;
use Database\Seeders\MovieSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'movie_id' => rand(1, MovieSeeder::MOVIES_COUNT),
            'rating' => rand(1, 10)
        ];
    }
}
