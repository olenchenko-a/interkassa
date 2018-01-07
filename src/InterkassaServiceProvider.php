<?php

namespace olenchenkoA\interkassa;

use Illuminate\Support\ServiceProvider;
use Blade;


class InterkassaServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/' => config_path() . '/']);
        $this->publishes([__DIR__ . '/../resources/views/' => resource_path('views/vendor/interkassa/')]);
        // Blade::directive('interkassa', function ($name) {
            // return "<?php echo app('interkassa')->show($name); ?\>"; // remove \ before >
        // });
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'interkassa');
    }



    public function register()
    {
        $this->app->singleton('interkassa', function ($app) {
            return new Interkassa();
        });
        $this->mergeConfigFrom(
            __DIR__ . '/../config/interkassa.php', 'interkassa'
        );
    }
}