<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class MovieStart extends Model
{
    protected $primaryKey = 'movieID';
    protected $table = 'moviestart';
    public $timestamps = false;

    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }

    public function scopeFutureOnly($query)
    {
        $today = (new DateTime())->format('Y-m-d');
        return $query->where('date', '>', $today);
    }
}
