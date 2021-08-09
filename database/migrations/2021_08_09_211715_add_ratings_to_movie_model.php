<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Movie;

class AddRatingsToMovieModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->decimal('rating', 2, 2, true)->nullable(false)->default(0);
            $table->integer('rating_count', false, true)->nullable(false)->default(0);
        });
        foreach(Movie::cursor() as $movie) {
            $movie->rating = $movie->ratings->avg('rating');
            $movie->rating_count = $movie->ratings->count();
            $movie->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn(['rating', 'rating_count']);
        });
    }
}
