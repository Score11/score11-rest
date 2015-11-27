<?php

namespace App\Transformers;

use App\DVDStart;
use App\Models\MovieImage;
use App\Movie;
use League\Fractal\TransformerAbstract;

class DVDStartTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'titles'
    ];

    public function transform(DVDStart $dvdstart)
    {
		$movie = $dvdstart->movie;
		$movieImage = new MovieImage($movie->ID, $movie->image);
        return [
            'id' => $dvdstart->movieID,
            'releaseDate' => $dvdstart->releaseDate,
			'image' => $movieImage->getLink()
        ];
    }

    public function includeTitles(DVDStart $dvdstart)
    {
        return $this->collection($dvdstart->titles, new TitlesTransformer());
    }
}