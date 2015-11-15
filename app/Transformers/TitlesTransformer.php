<?php

namespace App\Transformers;

use App\Title;
use League\Fractal\TransformerAbstract;

class TitlesTransformer extends TransformerAbstract
{
    public function transform(Title $title)
    {
        return [
            'title' => $title->title,
            'version' => $title->version,
            'year' => $title->year,
        ];
    }
}