<?php

$app['calculate.controller'] = $app->share(function() use ($container) {
    return new Evo\Api\Controller\Calculate($container['service.calculate']);
});
