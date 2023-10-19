<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class StoreOrderResult
{
    public function __construct(
        public string $parcellabelsPDF,
        public ShipmentResponse $shipmentResponses
    ) {
    }
}
