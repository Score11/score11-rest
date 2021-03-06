<?php

namespace App\Http\Controllers;

use App\DVDStart;
use App\Http\Requests;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Illuminate\Http\Response;

class DVDStartController extends Controller
{
    public function index()
    {
        $dvdstarts = DVDStart::futureOnly()
            ->with(array('titles' => function ($query) {
                $query->select('movieID', 'title', 'version', 'year');
            }))
            ->orderBy('releaseDate')
            ->take(10)
            ->get(array('movieID', 'date as releaseDate'));

        $fractal = new Manager();
        $resource = new Collection( $dvdstarts, new \App\Transformers\DVDStartTransformer );
        $resource->setMetaValue('total', count($dvdstarts));
		return response()->json($fractal->createData($resource)->toArray());
    }
}

