<?php namespace TrendyLabs\Shortener;
class Facade extends \Illuminate\Support\Facades\Facade {
	protected static function getFacadeAccessor() { return 'TrendyLabs\Shortener\Helpers'; }
}
