<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Movie;
use Illuminate\Support\Facades\Response;

class MovieStartController extends Controller
{
    public function index()
    {
        $movies = Movie::with(array('movieStart', 'titles'))
            ->has('movieStart')
            ->whereHas('movieStart', function ($query) {
                $query->futureOnly();
            })
            ->get();

        $return = array('movies' => $movies, 'total' => count($movies));
        return Response::json($return);
    }
}
