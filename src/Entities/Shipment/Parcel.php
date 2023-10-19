<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class Parcel
{
    public function __construct(
        public ?string $customerReferenceNumber1 = null,
        public ?string $customerReferenceNumber2 = null,
        public ?string $customerReferenceNumber3 = null,
        public ?string $customerReferenceNumber4 = null,
        public ?int $volume = null,
        public ?int $weight = null,
        public ?bool $hazardousLimitedQuantities = null,
        public ?HigherInsurance $higherInsurance = null,
        public ?International $international = null,
        /** @var Hazardous[]|null $hazardous */
        public ?array $hazardous = null,
        public ?bool $printInfo1OnParcelLabel = null,
        public ?string $info1 = null,
        public ?string $info2 = null,
        public ?bool $returns = null,
        public ?int $customsTransportCost = null,
        public ?string $customsTransportCostCurrency = null
    ) {
    }
}
