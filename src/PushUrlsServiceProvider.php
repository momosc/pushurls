<?php
/*
 * This file is part of the momosc/laravel-pushUrls
 *
 * (c) momosc
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Momosc\LaravelPushUrls;

use Illuminate\Support\ServiceProvider;

class PushUrlsServiceProvider extends ServiceProvider
{
    /**
     * Application bootstrap event.
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__ . '/../config/pushurls.php') => config_path('pushurls.php'),
        ], 'config');
        $this->publishes([
            realpath(__DIR__ . '/../database/migrations') => database_path('migrations'),
        ], 'migrations');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(realpath(__DIR__ . '/../config/pushurls.php'), 'pushurls');
    }
}