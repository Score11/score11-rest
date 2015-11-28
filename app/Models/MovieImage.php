<?php
namespace App\Models;

class MovieImage
{
	private $_movieId;

	private $_hasImage;

	private $_movieImagePath;

	public function __construct($movieId, $hasImage = 'y')
	{
		$this->_movieId = $movieId;
		$this->_hasImage = $hasImage;
		$host = config('app.host');
		$path = config('app.movieimgpath');
		$this->_movieImagePath = $host . '/' . $path;
	}

	public function getLink()
	{
		if ($this->_hasImage == 'n') {
			$link = sprintf('%s/%s', config('app.host'), config('app.movie-logo'));
		} else {
			$lastTwo = substr($this->_movieId, -2, 2);
			if (strlen($lastTwo) == 1) {
				$lastTwo = "0" . $lastTwo;
			}
			// %s statt %d fuer den zweiten paraemter verwendet, da sonst aus 05 5 wird und dann stimmt der Bildlink nicht mehr
			$link = sprintf('%s/%s/%s', $this->_movieImagePath, $lastTwo, $this->_movieId);
		}
		return $link;
	}
}