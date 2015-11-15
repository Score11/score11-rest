<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class DVDStart extends Model
{
    protected $primaryKey = 'movieID';
    protected $table = 'dvdstart';
    public $timestamps = false;

    public function movie() {
        return $this->belongsTo('App\Movie');
    }

    public function titles()
    {
        return $this->hasMany('App\Title', 'movieID');
    }

    public function scopeFutureOnly($query)
    {
        $today = (new DateTime())->format('Y-m-d');
        return $query->where('date', '>', $today);
    }
}
