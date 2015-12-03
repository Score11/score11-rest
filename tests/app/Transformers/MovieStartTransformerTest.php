<?php
use App\Movie;
use App\MovieStart;
use App\Title;
use App\Transformers\MovieStartTransformer;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;

class MovieStartTransformerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_transformation_is_correct()
    {
        // create a film with title and moviestart
        $movie = factory(Movie::class)->create(['image' => 'n']);
        $title = factory(Title::class)->make();
        $movie->titles()->save($title);
        $movieStart = factory(MovieStart::class)->make();
        $movie->moviestart()->save($movieStart);

        // create fractal and its output
        $fractal = new Manager();
        $resource = new Item($movie, new MovieStartTransformer);
        $transformedMovieTitle = $fractal->createData($resource)->toArray();

        // assert output with expected
        $expected = [
            "data" => [
                "id" => $movie->ID,
                "startdate" => $movieStart->date->format("Y-m-d H:i:s"),
                "image" => sprintf('%s/%s', config('app.host'), config('app.movie-logo')),
                "titles" => [
                    "data" => [
                        [
                            "title" => $title->title,
                            "version" => "de",
                            "year" => $title->year
                        ]
                    ]
                ]
            ]
        ];
        $this->assertArraySubset($expected, $transformedMovieTitle);
    }
}
