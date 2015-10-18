<?php

namespace App\Http\Controllers;

use App\DVDStart;
use App\Http\Requests;
use DateTime;
use Illuminate\Support\Facades\Response;

class DVDStartController extends Controller
{
    public function index()
    {
        $today = (new DateTime())->format('Y-m-d');

        $collection = DVDStart::
        with(array('titles' => function ($query) {
            $query->select('movieID', 'title', 'version', 'year');
        }))
            ->where('date', '>', $today)
            ->get(array('movieID', 'date as releaseDate'));

        return Response::json($collection);
    }
}