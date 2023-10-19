<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder;

class ServiceDetailType
{
    public function __construct(public string $code, public ?string $description = null)
    {
    }
}
