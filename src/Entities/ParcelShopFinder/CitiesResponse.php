<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder;

class CitiesResponse
{
    /**
     * @param City[] $city
     */
    public function __construct(
        public array $city
    ) {
    }
}
