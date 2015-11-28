<?php

namespace App\Transformers;

use App\Movie;
use App\Models\MovieImage;
use League\Fractal\TransformerAbstract;

class MovieStartTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'titles'
    ];

    public function transform(Movie $movie)
    {
		$movieImage = new MovieImage($movie->ID, $movie->image);
        return [
            'id' => $movie->ID,
            'startdate' => $movie->moviestart->date,
			'image' => $movieImage->getLink()
        ];
    }

    public function includeTitles(Movie $movie)
    {
        return $this->collection($movie->titles, new TitlesTransformer());
    }
}