<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    const MOVIES_COUNT = 20000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chunkSize = 1000;

        foreach (range(1, static::MOVIES_COUNT / $chunkSize) as $_) {
            Movie::factory($chunkSize)->create();
        }
    }
}
