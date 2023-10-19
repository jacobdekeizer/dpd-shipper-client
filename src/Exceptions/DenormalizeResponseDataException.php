<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Exceptions;

use Throwable;

class DenormalizeResponseDataException extends DpdShipperException
{
    public function __construct(public mixed $data, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
