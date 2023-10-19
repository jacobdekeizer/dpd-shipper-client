<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Exceptions;

use Throwable;

/**
 * @template TErrorDetail
 */
abstract class AbstractErrorResponseException extends DpdShipperException
{
    /**
     * @param TErrorDetail $detail
     */
    public function __construct(public mixed $detail, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return TErrorDetail
     */
    public function getDetail(): mixed
    {
        return $this->detail;
    }
}
