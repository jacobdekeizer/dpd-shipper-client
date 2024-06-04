<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder;

class FindParcelShopsByGeoDataRequest
{
    public function __construct(
        public float $latitude,
        public float $longitude,
        public int $limit,
        public ?string $availabilityDate = null,
        public ?bool $hideClosed = null,
        public ?string $searchCountry = null,
    ) {
    }
}
