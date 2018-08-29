<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopRatedMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_rated_movies', function (Blueprint $table) {
            $table->increments('id');
            $table->int('tmdb_id');
            $table->string('release_date');
            $table->string('overview');
            $table->string('original_title');
            $table->string('title');
            $table->string('original_language');
            $table->float('popularity');
            $table->int('vote_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_rated_movies');
    }
}
