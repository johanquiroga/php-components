<?php

namespace Styde;

class SessionManager
{
    /**
     * @var \Styde\SessionFileDriver
     */
    protected $driver;
    protected $data = [];

    /**
     * @param \Styde\SessionFileDriver $driver
     */
    public function __construct(SessionFileDriver $driver)
    {
        $this->driver = $driver;

        $this->load();
    }

    protected function load()
    {
        $this->data = $this->driver->load();
    }

    public function get($key)
    {
        return $this->data[$key] ?? null;
    }
}