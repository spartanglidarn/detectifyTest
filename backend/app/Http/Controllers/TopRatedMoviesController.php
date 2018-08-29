<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $topRatedMovies = TopRatedMovie::all();
        return response()->json(['data' => $topRatedMovies], 200);
    }
}
