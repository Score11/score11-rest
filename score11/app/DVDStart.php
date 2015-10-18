<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DVDStart extends Model
{
    protected $primaryKey = 'movieID';
    protected $table = 'dvdstart';
    public $timestamps = false;

    public function titles()
    {
        return $this->hasMany('App\Title', 'movieID');
    }
}
