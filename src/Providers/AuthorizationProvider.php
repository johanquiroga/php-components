<?php

namespace Styde\Providers;

use Styde\AccessHandler;
use JohanQuiroga\Container\Provider;

class AuthorizationProvider extends Provider
{
    public function register()
    {
        $this->container->singleton('access', function ($app) {
            return new AccessHandler($app->make('auth'));
        });
    }
}