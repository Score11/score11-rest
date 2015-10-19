<?php

namespace App\Transformers;

use App\DVDStart;
use League\Fractal\TransformerAbstract;

class DVDStartTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'titles'
    ];

    public function transform(DVDStart $dvdstart)
    {
        return [
            'movieID' => $dvdstart->movieID,
            'releaseDate' => $dvdstart->releaseDate,
        ];
    }

    public function includeTitles(DVDStart $dvdstart)
    {
        return $this->collection($dvdstart->titles, new TitlesTransformer());
    }
}