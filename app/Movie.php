<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;
    protected $table = 'movie';

    public function titles()
    {
        return $this->hasMany('App\Title', 'movieID', 'ID');
    }

    public function moviestart()
    {
        return $this->hasOne('App\MovieStart', 'movieID', 'ID');
    }

    public function dvdstart()
    {
        return $this->hasOne('App\DVDStart', 'movieID', 'ID');
    }
}
