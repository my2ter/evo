<?php
namespace Evo\Container;

use Pimple;
use Evo\Service;

class Container extends \Pimple
{
    public function init()
    {
        $this['service.calculate'] = function ($c) {
            return new Service\Calculate;
        };

    }
}
