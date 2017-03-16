<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Google\Cloud\ServiceBuilder;
use Google\Cloud\Trace\RequestTracer;
use Google\Cloud\Trace\Reporter\TraceReporter;

class GoogleCloudProvider extends ServiceProvider
{
    private $builder;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(ServiceBuilder $builder)
    {
        $trace = $builder->trace();
        $reporter = new TraceReporter($trace);

        // don't trace if we're running in the console (i.e. a php artisan command)
        if (php_sapi_name() != 'cli') {
            RequestTracer::start($reporter, ['enabled' => true, 'startTime' => LARAVEL_START]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ServiceBuilder::class, function($app) {
            return new ServiceBuilder($app['config']['services']['google']);
        });
    }
}
