<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Movie;
use App\Transformers\MovieStartTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class MovieStartController extends Controller
{
    public function index()
    {
        $movies = Movie::
            with(array('moviestart', 'titles'))
            ->has('moviestart')
            ->whereHas('moviestart', function ($query) {
                $query->futureOnly();
            })
            ->take(10)
            ->get();

        $movies = $movies->sortBy('moviestart.date');

        $fractal = new Manager();
        $resource = new Collection($movies, new MovieStartTransformer);
        $resource->setMetaValue('total', count($movies));
        return $fractal->createData($resource)->toJson();
    }
}
