<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder;

use JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder\Data\Services;

class FindParcelShopsRequest
{
    public function __construct(
        public string $country,
        public string $zipCode,
        public string $city,
        public int $limit,
        public ?string $street = null,
        public ?string $houseNo = null,
        public ?string $availabilityDate = null,
        public ?bool $hideClosed = null,
        public ?string $searchCountry = null,
        public ?Services $services = null,
        public ?string $type = null
    ) {
    }
}
