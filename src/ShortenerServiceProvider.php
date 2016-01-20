<?php namespace TrendyLabs\Shortener;

use Illuminate\Support\ServiceProvider;

class ShortenerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/config/shortener.php' => config_path('shortener.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('TrendyLabs\Shortener\Shortener', function($app) {
            return new Shortener($this->getConfig());
        });
    }

    /**
     * Get the configuration
     *
     * @return array
     */
    public function getConfig() {
        $key = 'shortener';
        $config = $this->app->make('config')->get($key);
        return $config;
    }

}