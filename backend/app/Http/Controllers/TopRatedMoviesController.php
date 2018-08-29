<?php

namespace App\Http\Controllers;

use App\TopRatedMovie;

class TopRatedMoviesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private const MAX_RESULT = 100;

    public function __construct()
    {
        //
    }

    public function index()
    {
        $result = TopRatedMovie::all();

        if ($result->isEmpty() || $this->updateData($result->first())) {
            self::retrieveTopRatedMovies();
            $result = TopRatedMovie::all();
        }
        return response()->json($result, 200);
    }

    public function retrieveTopRatedMovies ()
    {
        TopRatedMovie::truncate();
        $apiKey = getenv('TMDB_API_KEY');
        $movieCount = 0;
        $ch = curl_init();
        $pageNr = 1;
        while ($movieCount < self::MAX_RESULT) {
            curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/discover/movie?api_key=" . $apiKey . "&language=en-US&sort_by=popularity.desc&page=" . $pageNr);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $movieRespons = (array)json_decode(curl_exec($ch));
            foreach ($movieRespons['results'] as $result) {
                if ($movieCount < self::MAX_RESULT) {
                    $result = (array) $result;
                    $addMovie = new TopRatedMovie();
                    $addMovie->tmdb_id = $result['id'];
                    $addMovie->release_date = $result['release_date'];
                    $addMovie->overview = $result['overview'];
                    $addMovie->original_title = $result['original_title'];
                    $addMovie->title = $result['title'];
                    $addMovie->original_language = $result['original_language'];
                    $addMovie->popularity = $result['popularity'];
                    $addMovie->vote_count = $result['vote_count'];
                    $addMovie->save();
                    $movieCount++;
                } else {
                    break;
                }
            }
            $pageNr++;
        }
    }

    public function updateData (TopRatedMovie $topRatedMovie)
    {
        $time = time() - 5 * 60;
        return $time >= strtotime($topRatedMovie->makeVisible('updated_at')['updated_at']);
    }
}
