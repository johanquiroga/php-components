<?php

namespace Styde;

use Closure;
use InvalidArgumentException;
use ReflectionClass;

class Container
{
    protected $bindings = [];

    protected $shared = [];

    public function bind($name, $resolver)
    {
        $this->bindings[$name] = [
            'resolver' => $resolver
        ];
    }

    public function instance($name, $object)
    {
        $this->shared[$name] = $object;
    }

    public function make($name)
    {
        if (isset($this->shared[$name])) {
            return $this->shared[$name];
        }

        $resolver = $this->bindings[$name]['resolver'];

        if ($resolver instanceof Closure) {
            $object = $resolver($this);
        } else {
            $object = $this->build($resolver);
        }

        return $object;
    }

    public function build($name)
    {
        try {
            $reflection = new ReflectionClass($name);
        } catch (\ReflectionException $e) {
            throw new ContainerException("Unable to build [$name]: " . $e->getMessage(), null, $e);
        }

        if (! $reflection->isInstantiable()) {
            throw new InvalidArgumentException("$name is not instantiable");
        }

        $constructor = $reflection->getConstructor(); // ReflectionMethod

        if (is_null($constructor)) {
            return new $name;
        }

        $constructorParameters = $constructor->getParameters(); // [ReflectionParameter]

        $arguments = [];

        foreach ($constructorParameters as $constructorParameter) {
            try {
                $parameterClassName = $constructorParameter->getClass()->getName();
            } catch (\ReflectionException $e) {
                throw new ContainerException("Unable to build [$name]: " . $e->getMessage(), null, $e);
            }

            $arguments[] = $this->build($parameterClassName);
        }

        return $reflection->newInstanceArgs($arguments);
    }
}