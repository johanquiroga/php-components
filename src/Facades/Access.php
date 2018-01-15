<?php

namespace Styde\Facades;

use JohanQuiroga\Container\Facade;

class Access extends Facade
{
    public static function getAccessor()
    {
        return 'access';
    }
}