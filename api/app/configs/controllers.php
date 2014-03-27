<?php

$app['replace.controller'] = $app->share(function() use ($container) {
    return new Evo\Api\Controller\Replace;
});

$app['calculate.controller'] = $app->share(function() use ($container) {
    return new Evo\Api\Controller\Calculate($container['service.calculate']);
});
