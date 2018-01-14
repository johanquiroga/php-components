<?php

namespace Styde;

class Application
{
    /**
     * @var \Styde\Container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            $provider = new $provider($this->container);
            $provider->register();
        }
    }

    public function register()
    {
        $this->registerSessionManager();
        $this->registerAuthenticator();
        $this->registerAccessHandler();
    }

    protected function registerSessionManager()
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

    protected function registerAuthenticator()
    {
        $this->container->singleton('auth', function ($app) {
            return new Authenticator($app->make('session'));
        });
    }

    protected function registerAccessHandler()
    {
        $this->container->singleton('access', function ($app) {
            return new AccessHandler($app->make('auth'));
        });
    }
}
