<?php

namespace Onepix\RenovatioSdk\Shared\Exceptions;

use Exception;

class RenovatioApiException extends Exception
{
    public function __construct(string $message = '', int|string $code = 0)
    {
        parent::__construct($message, (int) $code);
    }
}
