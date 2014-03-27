<?php

$app['replace.controller'] = $app->share(function() use ($container) {
    return new Evo\Api\Controller\Replace;
});

$app['logger.controller'] = $app->share(function() use ($container) {
    return new Evo\Api\Controller\Logger($container['service.logger']);
});

$app['calculate.controller'] = $app->share(function() use ($container) {
    return new Evo\Api\Controller\Calculate($container['service.calculate']);
});
