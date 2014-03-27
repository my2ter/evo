<?php
namespace Evo\Api\Controller;

use Symfony\Component\HttpFoundation\Request;
use Evo\Service;

class Replace
{
    public function getAction(Request $request, $string, $search, $replace)
    {
        return str_replace($search, $replace, $string);
    }
}
