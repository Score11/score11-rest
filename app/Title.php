<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table = 'title_m';
    public $timestamps = false;

    public function movie() {
		return $this->belongsTo('App\Movie', 'movieID');
    }

    public function dvdstart()
    {
        return $this->belongsTo('App\DVDStart');
    }
}
