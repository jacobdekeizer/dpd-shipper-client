<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder;

class Services
{
    /**
     * @param Service[] $service
     */
    public function __construct(public ?array $service = null)
    {
    }
}
