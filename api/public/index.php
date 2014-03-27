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

$app->get('/replace/{string}/{search}/{replace}', function ($string, $search, $replace) use ($app) {
    return $app['replace.controller']->getAction($app['request'], $string, $search, $replace);
});

$app->post('/log', function () use ($app) {
    $tmpPath = __DIR__ . '/../tmp/';

    return $app['logger.controller']->postAction($app['request'], $app['request']->request->all(), $tmpPath);
});

$app->get('/calculate/{number}', function ($number) use ($app) {
    return $app['calculate.controller']->getAction($app['request'], $number);
});

$app->run();