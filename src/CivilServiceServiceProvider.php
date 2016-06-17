<?php namespace Mathiasd88\ChileanCivilService;

use Illuminate\Support\ServiceProvider;

class CivilServiceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/civilservice.php';

        $this->publishes([
            $configPath => config_path('civilservice.php'),
        ]);

        $this->mergeConfigFrom($configPath, 'civilservice');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['civilservice'] = $this->app->share(function($app) {
            return new CivilService;
        });
    }
}
