<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class ShipmentResponse
{
    public function __construct(
        public string $identificationNumber,
        public string $mpsId,
        /** @var ParcelInformation[] */
        public array $parcelInformation,
    ) {
    }
}
