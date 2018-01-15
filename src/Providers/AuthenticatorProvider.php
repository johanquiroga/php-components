<?php

namespace Styde\Providers;

use Styde\Authenticator;
use JohanQuiroga\Container\Provider;

class AuthenticatorProvider extends Provider
{
    public function register()
    {
        $this->container->singleton('auth', function ($app) {
            return new Authenticator($app->make('session'));
        });
    }
}