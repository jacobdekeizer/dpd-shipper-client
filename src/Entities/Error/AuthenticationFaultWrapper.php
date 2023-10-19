<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Error;

class AuthenticationFaultWrapper
{
    public function __construct(public AuthenticationFault $authenticationFault)
    {
    }
}
