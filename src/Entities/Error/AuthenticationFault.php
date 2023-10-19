<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Error;

class AuthenticationFault
{
    public function __construct(public string $errorCode, public string $errorMessage)
    {
    }
}
