<?php

declare(strict_types=1);

namespace Lifepoint\Stat\Core\Exception;

class NotFoundSelectException extends NotFoundException
{
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        $message = "По вашему запросу ничего не найдено!";

        parent::__construct($message, $code, $previous);
    }
}