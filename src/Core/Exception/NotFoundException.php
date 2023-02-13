<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Core\Exception;

class NotFoundException extends \Exception
{
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}