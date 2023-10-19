<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class Hazardous
{
    public function __construct(
        public string $identificationUnNo,
        public string $identificationClass,
        public string $packingCode,
        public string $description,
        public float $hazardousWeight,
        public int $factor,
        public ?string $classificationCode = null,
        public ?string $packingGroup = null,
        public ?string $subsidiaryRisk = null,
        public ?string $tunnelRestrictionCode = null,
        public ?float $netWeight = null,
        public ?string $notOtherwiseSpecified = null
    ) {
    }
}
