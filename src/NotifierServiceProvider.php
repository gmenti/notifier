<?php 

namespace Notifier;

use Illuminate\Support\ServiceProvider;

class NotifierServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('flash', function () {
            return $this->app->make(Notifier::class);
        });
    }
}