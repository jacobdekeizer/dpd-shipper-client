<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Login;

class LoginResponse
{
    public function __construct(public ?AuthData $return = null)
    {
    }
}
