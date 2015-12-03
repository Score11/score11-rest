<?php
use App\Title;
use App\Transformers\TitlesTransformer;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;

class TitlesTransformerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_transformation_is_correct()
    {
        // create testdata
        $title = factory(Title::class)->make();

        // create fractal and its output
        $fractal = new Manager();
        $resource = new Item($title, new TitlesTransformer);
        $transformedTitle = $fractal->createData($resource)->toArray();

        // assert output with expected
        $expected = [
            "data" => [
                "title" => $title->title,
                "version" => "de",
                "year" => $title->year
            ]
        ];
        $this->assertArraySubset($expected, $transformedTitle);
    }
}
