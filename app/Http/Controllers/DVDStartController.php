<?php

namespace App\Http\Controllers;

use App\DVDStart;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class DVDStartController extends Controller
{
    public function index()
    {
        $dvdstarts = DVDStart::futureOnly()
            ->with(array('titles' => function ($query) {
                $query->select('movieID', 'title', 'version', 'year');
            }))
            ->get(array('movieID', 'date as releaseDate'));

        $return = array('movies' => $dvdstarts, 'total' => count($dvdstarts));
        return Response::json($return);
    }
}