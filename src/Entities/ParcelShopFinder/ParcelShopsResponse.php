<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder;

class ParcelShopsResponse
{
    /**
     * @param ParcelShop[]|null $parcelShop
     */
    public function __construct(
        public ?array $parcelShop = null
    ) {
    }
}
