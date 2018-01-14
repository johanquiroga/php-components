<?php

namespace Styde\Providers;

use Styde\SessionArrayDriver;
use Styde\SessionManager;

class SessionProvider extends Provider
{
    public function register()
    {
        $this->container->singleton('session', function () {
            $data = [
                'user_data' => [
                    'name' => 'Duilio',
                    'role' => 'teacher'
                ]
            ];

            $driver = new SessionArrayDriver($data);

            return new SessionManager($driver);
        });
    }
}