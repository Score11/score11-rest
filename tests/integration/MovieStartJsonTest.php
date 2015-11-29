<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Movie;

class MovieStartJsonTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $movie = factory(\App\Movie::class)->create();
        $movie->titles()->save(factory(\App\Title::class)->make());
        $movie->moviestart()->save(factory(\App\MovieStart::class)->make());

        $this->get('/api/moviestart')
            ->seeJson([
                'id' => $movie->id,
                'startdate' => $movie->moviestart()->first()->date,
                'title' => $movie->titles()->first()->title
            ]);
    }
}
