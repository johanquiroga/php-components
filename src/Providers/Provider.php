<?php

namespace Styde\Providers;

use Styde\Container;

abstract class Provider
{
    /**
     * @var \Styde\Container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    abstract public function register();
}