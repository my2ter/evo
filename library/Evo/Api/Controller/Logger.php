<?php
namespace Evo\Api\Controller;

use Symfony\Component\HttpFoundation\Request;
use Evo\Service;

class Logger
{
    private $service;

    public function __construct(Service\Logger $service)
    {
        $this->service = $service;
    }

    public function postAction(Request $request, $params, $tmpPath)
    {
        return $this->service->log($request->getClientIp(), $params, $tmpPath);
    }
}
