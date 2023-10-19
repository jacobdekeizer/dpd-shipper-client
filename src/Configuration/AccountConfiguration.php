<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Configuration;

class AccountConfiguration
{
    public function __construct(public string $username, public string $depotNumber, public string $password)
    {
    }
}
