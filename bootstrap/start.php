<?php

use JohanQuiroga\Container\Container;
use JohanQuiroga\Container\Application;
use JohanQuiroga\Container\Facade;
use Styde\MyApplication;

require __DIR__.'/../vendor/autoload.php';

class_alias('Styde\Facades\Access', 'Access');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$container = Container::getInstance();

Facade::setContainer($container);

$application = new MyApplication($container);

$application->registerProviders([
    Styde\Providers\SessionProvider::class,
    Styde\Providers\AuthenticatorProvider::class,
    Styde\Providers\AuthorizationProvider::class
]);