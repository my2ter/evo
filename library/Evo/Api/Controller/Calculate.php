<?php
namespace Evo\Api\Controller;

use Symfony\Component\HttpFoundation\Request;
use Evo\Service;

class Calculate
{
    private $service;

    public function __construct(Service\Calculate $service)
    {
        $this->service = $service;
    }

    public function getAction(Request $request, $number)
    {
        return $this->service->sumNatural($number);
    }
}
