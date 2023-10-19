<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class Order
{
    public function __construct(
        public GeneralShipmentData $generalShipmentData,
        public ProductAndServiceData $productAndServiceData,
        /**
         * @var Parcel[]|null
         */
        public ?array $parcels = null
    ) {
    }
}
