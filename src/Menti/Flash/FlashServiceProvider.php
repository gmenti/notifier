<?php 

namespace Menti\Flash;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Menti\Flash\SessionStore',
            'Menti\Flash\LaravelSessionStore'
        );
        
        $this->app->singleton('flash', function () {
            return $this->app->make('Menti\Flash\FlashNotifier');
        });
    }
}