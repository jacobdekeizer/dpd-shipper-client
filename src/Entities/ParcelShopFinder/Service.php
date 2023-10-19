<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder\Data;

class Service
{
    /**
     * @param ServiceDetail[]|null $serviceDetail
     */
    public function __construct(
        public string $code,
        public bool $available,
        public ?array $serviceDetail = null
    ) {
    }
}
