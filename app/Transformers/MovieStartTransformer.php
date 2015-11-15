<?php

namespace App\Transformers;

use App\Movie;
use League\Fractal\TransformerAbstract;

class MovieStartTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'titles'
    ];

    public function transform(Movie $movie)
    {
        return [
            'id' => $movie->ID,
            'startdate' => $movie->moviestart->date,
        ];
    }

    public function includeTitles(Movie $movie)
    {
        return $this->collection($movie->titles, new TitlesTransformer());
    }
}