<?php

use App\Models\MovieImage;

class MovieImageTest extends TestCase
{
	public function testGetLinkWithoutImage()
	{
		$image = new MovieImage(28786, 'n');
		$expected = "http://www.score11.de/2012/img/logo-movie.png";
		$actual = $image->getLink();
		self::assertSame($expected, $actual);
	}

	public function testGetLinkWithImage()
	{
		$image = new MovieImage(28786);
		$expected = "http://www.score11.de/p/86/28786";
		$actual = $image->getLink();
		self::assertSame($expected, $actual);
	}

	public function testGetLinkWith1DigitFolder()
	{
		$image = new MovieImage(5);
		$expected = "http://www.score11.de/p/05/5";
		$actual = $image->getLink();
		self::assertSame($expected, $actual);
	}
}