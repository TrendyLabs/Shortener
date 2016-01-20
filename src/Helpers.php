<?php namespace TrendyLabs\Shortener;

class Helpers {

	/**
	 * @var TrendyLabs\Shortener\Shortener
	 */
	private $shortener;

	/**
	 * Dependency injection
	 *
	 * @param TrendyLabs\Shortener\Shortener $shortener
	 */
	public function __construct(Shortener $shortener) {
		$this->shortener = $shortener;
	}

	/**
	 * Get Response of Google Shortener
	 *
	 * @param string $url URL to get response
	 * @return object
	 */
	public function response($url)
	{
		return $this->shortener->getResponse($url);
	}

	public function short($url)
	{
		$response = $this->shortener->getResponse($url);
		return $response->id;
	}

	public function long($url)
	{
		$response = $this->shortener->getResponse($url);
		return $response->longUrl;
	}
}