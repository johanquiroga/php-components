<?php

namespace Styde;

class Container
{
    protected static $container;

    protected $shared = [];

    public static function getInstance()
    {
        if (static::$container == null) {
            static::$container = new Container;
        }

        return static::$container;
    }

    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }

    public static function clearContainer()
    {
        static::$container = null;
    }

    protected function hasShared($name)
    {
        return isset($this->shared[$name]);
    }

    protected function getShared($name)
    {
        return $this->shared[$name];
    }

    public function session()
    {
        if ($this->hasShared('session')) {
            return $this->getShared('session');
        }

        $data = [
            'user_data' => [
                'name' => 'Duilio',
                'role' => 'teacher'
            ]
        ];

        $driver = new SessionArrayDriver($data);

        return $this->shared['session'] = new SessionManager($driver);
    }

    public function auth()
    {
        if ($this->hasShared('auth')) {
            return $this->getShared('auth');
        }

        return $this->shared['auth'] = new Authenticator($this->session());
    }

    public function access()
    {
        if ($this->hasShared('access')) {
            return $this->getShared('access');
        }

        return $this->shared['access'] = new AccessHandler($this->auth());
    }
}