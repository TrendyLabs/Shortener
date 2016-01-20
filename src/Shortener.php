<?php namespace TrendyLabs\Shortener;

class Shortener {

	private $config;
	private  $targetUrl = "https://www.googleapis.com/urlshortener/v1/url?";

	public function __construct($config = []) {
		$this->config = $config;
	}

	/**
	 * Get Object response of Googl Shortener.
	 *
	 * @param string $url long URL to get short
	 * @param integer $keySource Google API_KEY: can be server or browser
	 * @return object Response
	 */
	public function getResponse($url, $keySource = 'server')
	{
		$key = $keySource == 'server' ? $this->config['API_KEY_SERVER'] : $this->config['API_KEY_BROWSER'];
		$ch = curl_init($this->targetUrl . 'key=' . $key . '&');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_REFERER, $url);

		$data = array( 'longUrl' => $url );
		$data_string = '{ "longUrl": "'.$url.'" }';

		curl_setopt($ch, CURLOPT_POST, count($data));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-Type: application/json'));

		$result = json_decode(curl_exec($ch));

		return $result;
	}

}