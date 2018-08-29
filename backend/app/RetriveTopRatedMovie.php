<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopRatedMovie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'tmdb_id',
        'release_date',
        'overview',
        'original_title',
        'title',
        'original_language',
        'popularity',
        'vote_count',
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
