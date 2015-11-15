<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Movie;
use App\Transformers\MovieTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;

class MovieController extends Controller
{
    public function show($id)
    {
        $movie = Movie::with(array('titles'))->find($id);

        $fractal = new Manager();
        $resource = new Item($movie, new MovieTransformer);
        return $fractal->createData($resource)->toJson();
    }
}
