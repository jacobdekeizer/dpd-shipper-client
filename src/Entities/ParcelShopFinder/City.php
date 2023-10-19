<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder;

class City
{
    public function __construct(
        public ?string $country = null,
        public ?int $countryNum = null,
        public ?string $zipCode = null,
        public ?string $name = null,
        public ?string $town = null
    ) {
    }
}
