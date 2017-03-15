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
        RequestTracer::start($reporter, ['enabled' => true]);
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
