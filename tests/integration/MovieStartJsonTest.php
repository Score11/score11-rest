<?php

use App\Movie;
use App\MovieStart;
use App\Title;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MovieStartJsonTest extends TestCase
{
    use DatabaseTransactions; // do not store anything to database

    public function testJsonContainsMovie()
    {
        // insert a film with title and moviestart
        $movie = factory(Movie::class)->create();
        $movie->titles()->save(factory(Title::class)->make());
        $movie->moviestart()->save(factory(MovieStart::class)->make());

        // get moviestarts json and check if movie is in it
        $this->get('/api/moviestart')
            ->seeJson([
                'id' => $movie->id,
                'startdate' => $movie->moviestart()->first()->date,
                'title' => $movie->titles()->first()->title
            ]);
    }

    public function testJsonContainsMovieExactMatch()
    {
        // insert a film with title and moviestart
        $movie = factory(Movie::class)->create(['image' => 'n']);
        $movie->titles()->save(factory(Title::class)->make());
        $movie->moviestart()->save(factory(MovieStart::class)->make());

        // get moviestarts json and check if movie is in it
        $this->get('/api/moviestart')
            ->seeJsonEquals([
                'data' => [
                    [
                        'id' => $movie->id,
                        'startdate' => $movie->moviestart()->first()->date,
                        'image' => 'http://www.score11.de/2012/img/logo-movie.png',
                        'titles' => [
                            'data' => [
                                [
                                    'title' => $movie->titles()->first()->title,
                                    'version' => $movie->titles()->first()->version,
                                    'year' => $movie->titles()->first()->year
                                ]
                            ]
                        ]
                    ]
                ],
                'meta' => [
                    'total' => 1
                ]
            ]);
    }
}
