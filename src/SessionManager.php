<?php

namespace Styde;

class SessionManager
{
    /**
     * @var \Styde\SessionDriverInterface
     */
    protected $driver;
    protected $data = [];

    /**
     * @param \Styde\SessionDriverInterface $driver
     */
    public function __construct(SessionDriverInterface $driver)
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