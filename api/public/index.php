<?php

require_once __DIR__.'../../../vendor/autoload.php';

use Silex\Application;
use Evo\Silex\Provider;

$app = new Application();

$container = new Evo\Container\Container;
$container->init();

require __DIR__ . '/../app/configs/controllers.php';

$app->register(
    new Provider\ApiServiceProvider()
);

$app->get('/calculate/{number}', function ($number) use ($app) {
    return $app['calculate.controller']->getAction($app['request'], $number);
});

$app->run();