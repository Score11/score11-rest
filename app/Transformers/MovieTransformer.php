<?php

namespace App\Transformers;

use App\Movie;
use League\Fractal\TransformerAbstract;

class MovieTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'titles'
    ];

    public function transform(Movie $movie)
    {
        return [
            'id' => $movie->ID
        ];
    }

    public function includeTitles(Movie $movie)
    {
        return $this->collection($movie->titles, new TitlesTransformer());
    }
}