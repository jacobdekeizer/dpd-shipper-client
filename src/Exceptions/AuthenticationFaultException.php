<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Exceptions;

use JacobDeKeizer\DpdShipper\Entities\Error\AuthenticationFaultWrapper;

/**
 * @extends AbstractErrorResponseException<AuthenticationFaultWrapper>
 */
class AuthenticationFaultException extends AbstractErrorResponseException
{
}
