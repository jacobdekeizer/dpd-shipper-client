<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder;

class OpeningHours
{
    public function __construct(
        public string $weekday,
        public string $openMorning,
        public string $closeMorning,
        public string $closeAfternoon,
        public string $openAfternoon
    ) {
    }
}
