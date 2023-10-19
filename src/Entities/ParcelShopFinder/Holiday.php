<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder;

class Holiday
{
    public function __construct(public ?string $holidayStart = null, public ?string $holidayEnd = null)
    {
    }
}
