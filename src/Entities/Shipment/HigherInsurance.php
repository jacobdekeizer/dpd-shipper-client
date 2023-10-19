<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class HigherInsurance
{
    public function __construct(public int $amount, public string $currency)
    {
    }
}
