<?php

use Styde\Application;
use Styde\Container;

require __DIR__.'/../vendor/autoload.php';

class_alias('Styde\Facades\Access', 'Access');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$container = Container::getInstance();

Access::setContainer($container);

$application = new Application($container);

//$application->register();

$application->registerProviders([
    Styde\Providers\SessionProvider::class,
    Styde\Providers\AuthenticatorProvider::class,
    Styde\Providers\AuthorizationProvider::class
]);