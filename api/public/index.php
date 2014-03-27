<?php

require_once __DIR__.'../../../vendor/autoload.php';

use Silex\Application;
use Evo\Silex\Provider;

$app = new Application();

$container = new Evo\Container\Container;
$container->init();

$app->register(
    new Provider\ApiServiceProvider()
);


$app->run();