<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder;

class ServiceType
{
    /**
     * @param ServiceDetailType[]|null $serviceDetail
     */
    public function __construct(
        public string $code,
        public bool $available,
        public ?string $description = null,
        public ?array $serviceDetail = null
    ) {
    }
}
