<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Login;

class LoginRequest
{
    public function __construct(public string $delisId, public string $password, public string $messageLanguage)
    {
    }
}
