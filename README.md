# Shortener
API Form Laravel 5 to convert long URLs in Google Shortener format

## Installation

Install the package through [Composer](http://getcomposer.org/). Edit your project's `composer.json` file by adding:

```php
"require": {
	"trendylabs/shortener": "dev-master"
}
```

Next, run the Composer update command from the Terminal:

    composer update

Add the Service Provider. To do this open your `config/app.php` file.

Add a new line to the `service providers` array:

	TrendyLabs\Shortener\ShortenerServiceProvider::class,

And a new line to the `aliases` array:

	'Shortener' => TrendyLabs\Shortener\Facade::class,

Now you need to publish config file:

	php artisan vendor:publish

Then you can edit your Google API Keys

## Usage

Now you're ready to get short URLs via Googl Shortener:

```php
// get short url
\Shortener::short($url);

// get Google response
\Shortener::response($url);
```
