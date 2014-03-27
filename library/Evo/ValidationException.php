<?php
namespace Evo;

class ValidationException extends \Exception
{
    protected $message = 'Invalid data supplied';
}